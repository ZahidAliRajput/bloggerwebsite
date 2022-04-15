@extends('admin.layout.auth')

@section('content')
  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>Join us today</h4>
                  @if (Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
                @endif
                  <p>Enter your email and password to register</p>

                </div>
                <form class="form-body row g-3" method="POST" action="{{ route('postsignup') }}">
                    @csrf
                  <div class="col-12">
                    <label for="inputName" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control">
                  </div>
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        I agree the Terms and Conditions
                      </label>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-warning">Sign Up</button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="position-relative border-bottom my-3">
                      <div class="position-absolute seperator translate-middle-y">or continue with</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="{{asset('admin/assets/images/icons/facebook.png')}}" alt=""></a>
                      <a href="javascript:;" class=""><img src="{{asset('admin/assets/images/icons/apple-black-logo.png')}}" alt=""></a>
                      <a href="javascript:;" class=""><img src="{{asset('admin/assets/images/icons/google.png')}}" alt=""></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 text-center">
                    <p class="mb-0">Already have an account? <a href="{{route('signin')}}">Sign in</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-absolute top-0 h-100 d-xl-block d-none register-cover-img">
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
