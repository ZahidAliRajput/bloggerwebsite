@extends('admin.layout.app')
@section('content')
            <div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>
            @if (Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Users
                        @can('user_add')    
                        <a href="{{ route('adduser') }}" type="button" class="btn btn-primary float-end">Add User</a>
                        @endcan
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Actions</th>
                      </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @can('user_edit')
                            <a href="{{ route('edituser', $user->id) }}" class="btn btn-primary">Edit</a>
                            @endcan
                            @can('user_delete')
                            <a href="{{ route('deleteuser', $user->id) }}" class="btn btn-warning">Delete</a>
                            @endcan
                            @can('user_has_permission')
                            <a href="{{ route('userpermissions', $user->id) }}" class="btn btn-success">Permissions</a>
                            @endcan
                        </td>
                        </tr>
                        @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection



