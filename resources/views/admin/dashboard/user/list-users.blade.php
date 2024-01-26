@extends('layouts.admin-layout')
@section('header')
    <x-page-header title="Users" />
@endsection

@section('content')

@if(session()->has('created-success'))
    <p class="alert alert-success">{{session()->get('created-success')}}</p>
@endif

@if(session()->has('updated-success'))
    <p class="alert alert-info">{{session()->get('updated-success')}}</p>
@endif

@if(session()->has('deleted-success'))
    <p class="alert alert-danger">{{session()->get('deleted-success')}}</p>
@endif

    <div class="card">
        <div class="card-header" style="text-align: end">
            <a href="{{route('admin.users.create')}}" class="btn btn-success btn-sm">Add new user</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Phone</th>
                                   <th>Role</th>
                                   <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->count() == 0)
                                    <tr style="text-align: center">
                                        <td colspan="6">No items found</td>
                                    </tr>
                                @endif
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <img src="{{asset($user->image)}}" style="width: 75px; border-radius: 10px" alt="user image">
                                    </td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->role }}</td>
                                    <td>
                                        <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{route('admin.users.delete', $user->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                         
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
