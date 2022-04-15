@extends('admin.layout.auth')
@section('content')
  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body p-4">
                <div class="text-center">
                  <h4>Reset password</h4>
                </div>

                @if (Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
                @endif
                <form class="form-body row g-3" method="post" action="{{route('postresetpassword')}}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                
                  <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>


                  <div class="col-12">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control">
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-absolute top-0 h-100 d-xl-block d-none login-cover-img au-reset-password-cover">
            <div class="text-white p-5 w-100">

            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->
@endsection
