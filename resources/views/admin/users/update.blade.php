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
            <h6 class="mb-0 text-uppercase">Update User</h6>
            @can('user_view')
            <a href="{{ route('users') }}" class="btn btn-primary float-end" style="margin-top: -28px;">Back to Listing</a>
            @endcan
            <hr>
            <form class="row g-3" action="{{ route('updateuser') }}" method="POST" >
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="id">
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-6">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                </div>
                <!-- <div class="col-6">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                </div> -->
                <!-- <div class="col-6"></div> -->
                <div class="col-2 mx-auto">
                    <!-- <div class="form-control">
                    </div> -->
                    @can('user_edit')
                    <button type="submit" class="btn btn-success col-12">Update</button>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endsection