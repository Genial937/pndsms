<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/feather/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/flatpickr/dist/flatpickr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/quill/dist/quill.core.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/highlightjs/styles/vs2015.css') }}" />

    <!-- Map -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" />

    <!-- Theme CSS -->

    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">

    <!-- Title -->
    <title>SMS PORTAL</title>

  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 align-self-center px-lg-6 my-5">

          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
            Sign in
          </h1>

          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
            Sign in to access to our dashboard.
          </p>
          @if (session('message'))
              <div class="alert alert-danger">
                  <a href="" data-dismiss="alert" class="close">&times;</a>
                  <p>{{ session('message') }}</p>
              </div>
          @endif
          <!-- Form -->
          <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>Email Address</label>

              <!-- Input -->
              <input type="email" class="form-control" name="email" placeholder="name@address.com">
              @error('email')
                  <p class="text-danger">{{ $message }}</p>
              @enderror

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">

                  <!-- Label -->
                  <label>Password</label>

                </div>
                <div class="col-auto">

                  <!-- Help text -->
                  <a href="#" class="form-text small text-muted">
                    Forgot password?
                  </a>

                </div>
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input type="password" name="password" class="form-control form-control-appended" placeholder="Enter your password">


                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>

              </div>
              @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
              Sign in
            </button>

            <!-- Link -->
            <p class="text-center">
              {{-- <small class="text-muted text-center">
                Don't have an account yet? <a href="sign-up-cover.html">Sign up</a>.
              </small> --}}
            </p>

          </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

          <!-- Image -->
          <div class="bg-cover h-100 min-vh-100 mt-n1 mr-n3" style="background-image: url({{ asset('img/covers/auth-side-cover.jpg') }});"></div>

        </div>
      </div> <!-- / .row -->
    </div>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js') }}"></script>
    <script src="{{ asset('libs/autosize/dist/autosize.min.js') }}"></script>
    <script src="{{ asset('libs/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('libs/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('libs/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('libs/list.js/dist/list.min.js') }}"></script>
    <script src="{{ asset('libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libs/chart.js/Chart.extension.js') }}"></script>

    <!-- Map -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('js/dashkit.min.js') }}"></script>


  </body>
</html>
