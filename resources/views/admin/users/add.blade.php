@extends('admin.layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <h6 class="mb-0 text-uppercase">Add User</h6>
            @can('user_view')
            <a href="{{ route('users') }}" class="btn btn-primary float-end" style="margin-top: -28px;">Back to Listing</a>
            @endcan
            <hr>
            <form class="row g-3" action="{{ route('postuser') }}" method="POST" >
                @csrf
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-6">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control">
                </div>
                <!-- <div class="col-6">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                </div> -->
                <div class="col-6">
                <label class="form-label" for="basicSelect">Select Role</label>
                         <select class="form-select" id="basicSelect" name="role">
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach    
                          </select>
                </div>
                <div class="col-2 mx-auto">
                    <!-- <div class="form-control">
                    </div> -->
                    @can('user_add')
                    <button type="submit" class="btn btn-success col-12">Add</button>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endsection