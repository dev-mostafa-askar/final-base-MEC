@extends('layouts.admin-layout')
@section('header')
    <x-page-header title="Create new user" />
@endsection

@section('content')
    <div class="card card-primary">
        <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name">
                    @error('name')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" id="email" placeholder="Enter email">
                    @error('email')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" name="phone"  value="{{old('phone')}}" class="form-control" id="phone" placeholder="Enter phone">
                    @error('phone')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birthdate">birthdate</label>
                    <input type="date" name="birthdate"  value="{{old('birthdate')}}" class="form-control" id="birthdate" placeholder="Enter birthdate">
                    @error('birthdate')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" value="{{old('image')}}" class="form-control" id="image" placeholder="Enter image">
                    @error('image')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">role</label>
                    <select value="{{old('role')}}" class="form-control" name="role">
                        <option value="" disabled selected>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    @error('role')
                        <p class="error" style="color: red">{{$message}}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input value="{{old('password')}}" type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                            <p class="error" style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password confirmation</label>
                        <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control" placeholder="Password confirmation">
                        @error('password_confirmation')
                            <p class="error" style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
