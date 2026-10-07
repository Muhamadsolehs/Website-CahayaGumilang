<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('template')}}/assets/images/favicon.png" />
  </head>
  <body>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                @if(session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('login.action') }}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="usename">Username *</label>
                    <input type="username" class="form-control p_input" name="username" value="{{ old('username') }}" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" class="form-control p_input" name="password" placeholder="Password">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="register" class="forgot-pass">Back</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="/register"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('template')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('template')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('template')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('template')}}/assets/js/misc.js"></script>
    <script src="{{asset('template')}}/assets/js/todolist.js"></script>
    <script src="{{asset('template')}}/assets/js/settings.js"></script>
    <!-- endinject -->
  </body>
</html>
