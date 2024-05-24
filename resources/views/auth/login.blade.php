@extends('auth.layout.main')

@section('content')
@include('modals.info')
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="{{ route('login_confirm') }}" method="POST">
            @csrf
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" required />
              <label class="form-label" for="form1Example13">Email address</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Password</label>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="#!">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Sign in</button>
        </form>
            <a type="submit" href="{{ route('register') }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg btn-block mt-2">Sign up</a>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
            </div>

            <button id="guestLoginBtn" class="btn btn-light btn-lg btn-block" style="background-color: #b5abaa">
                Login as Guest
            </button>
        </div>
      </div>
    </div>
  </section>

<script>
    function fillGuestCredentials() {
      document.getElementById('inputEmail').value = 'guest@guest.com';
      document.getElementById('inputPassword').value = 'guest123';
    }

    function makeInputsReadonly() {
      document.getElementById('inputEmail').readOnly = true;
      document.getElementById('inputPassword').readOnly = true;
    }

    document.getElementById('guestLoginBtn').addEventListener('click', function() {
      fillGuestCredentials();
      makeInputsReadonly();
    });
  </script>
@endsection
