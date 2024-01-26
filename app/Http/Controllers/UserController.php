<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function index(){
        $users = User::all();
        return view('admin.dashboard.user.list-users',[
            'users' => $users
        ]);
    }

    public function create(){
        return view('admin.dashboard.user.create-user');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password'=> 'required|confirmed',
            'image'=> 'required|image',
            'birthdate'=> 'required',
            'role'=> 'required|in:admin,user',
        ]);

        if(isset($data['image']) && $data['image']){
            $path = $data['image']->store('public/users');
            $path = str_replace('public', 'storage', $path);
            $data['image'] = $path;
        }
        $user = User::create($data);
        return redirect(route('admin.users.index'))->with('created-success','User create successfully');
    }

    public function edit(User $user) {
        return view('admin.dashboard.user.edit-user',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user) {
        $rule = $request->has('image') ? 'image' : 'nullable';
        
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
            'password'=> 'required|confirmed',
            'image'=> $rule,
            'birthdate'=> 'required',
            'role'=> 'required|in:admin,user',
        ]);

        if(isset($data['image']) && $data['image'] && $data['image'] != $user->image){
            $path = $data['image']->store('public/users');
            $path = str_replace('public', 'storage', $path);
            $data['image'] = $path;
            Storage::disk('public')->delete($user->image);
        }
     
        
        $user->update($data);
        return redirect(route('admin.users.index'))->with('updated-success', 'User updated successfully');
    }

    public function delete(User $user) {
        if($user){
            $user->delete();
            return redirect(route('admin.users.index'))->with('deleted-success', 'User deleted successfully');
        }
        return redirect(route('admin.users.index'))->with('error', 'Not found');
    }
}
