@extends('layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-6">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient ">Welcome</h3>
              </div>
              <div style="margin-left: 50px;" class="col-xl-4 col-lg-5 col-md-6">
                <svg width="300" height="100" viewBox="40 0 300 120" xmlns="http://www.w3.org/2000/svg">
                  <text x="20" y="80" font-family="Arial, sans-serif" font-size="64" font-weight="bold" fill="#0dcaf0">
                    Digital
                  </text>
                  <text x="220" y="80" font-family="Arial, sans-serif" font-size="64" font-weight="bold" fill="#d63384">
                    Food
                  </text>
                  <text x="20" y="110" font-family="Arial, sans-serif" font-size="24" fill="#555">
                    Optimize, control and grow
                  </text>
                  <circle cx="200" cy="60" r="10" fill="#596cff" />
                  <rect x="204" y="50" width="12" height="20" fill="#596cff" />
                  <circle cx="320" cy="60" r="30" fill="none" stroke="#00cc66" stroke-width="6" />
                  <line x1="304" y1="44" x2="336" y2="76" stroke="#00cc66" stroke-width="6" />
                  <line x1="336" y1="44" x2="304" y2="76" stroke="#00cc66" stroke-width="6" />
                </svg>
              </div>

              <div class="card-body">
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Forgot you password? Reset you password
                  <a href="/login/forgot-password" class="text-info text-gradient font-weight-bold">here</a>
                </small>
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="register" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection