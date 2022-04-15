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
            <h6 class="mb-0 text-uppercase">User Profile</h6>
            <hr>
            <form class="row g-3" action="{{ route('updateprofile') }}" method="POST" >
                @csrf
                <input type="hidden" name="id" value="{{ $userprofile->id }}">
                <div class="col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $userprofile->name }}">
                </div>
                <div class="col-6">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $userprofile->email }}">
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