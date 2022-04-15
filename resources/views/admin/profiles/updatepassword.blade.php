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
            <h6 class="mb-0 text-uppercase">Password Setting</h6>
            <hr>
            <form class="row g-3" action="{{ route('updatepassword') }}" method="POST" >
                @csrf
                <div class="col-6">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="col-6">
                    <label class="form-label">New Password</label>
                    <input name="new_password" type="password" class="form-control">
                </div>
                <div class="col-6">
                    <label class="form-label">Confirm New Password</label>
                    <input name="confirm_new_password" type="password" class="form-control">
                </div>
                <!-- <div class="col-6">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                </div> -->
                <div class="col-2 mx-auto">
                    <!-- <div class="form-control">
                    </div> -->
                    <button type="submit" class="btn btn-success col-12">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection