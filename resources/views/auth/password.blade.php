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
    <title>Peak And Dale</title>

  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-12 col-md-5 col-xl-4 my-5">
            <div class="alert alert-success">
                <a href="#" data-dismiss="alert" class="close">&times;</a>
                <p>Welcome {{ $user->name }}.Your account has been verified. Set your password.</p>
             </div>
          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
            Set Password
          </h1>



          <!-- Subheading -->
          {{-- <p class="text-muted text-center mb-5">
            Enter your email to get a password reset link.
          </p> --}}

          <!-- Form -->
          <form method="POST" action="{{ route('set.password') }}">
              @csrf
            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>Password <span class="text-danger">*</span></label>

              <!-- Input -->
              <input type="password" class="form-control" name="password" required>
              <input type="hidden" value="{{ $user->id }}" name="userid">

            </div>

            <!-- Email address -->
            <div class="form-group">

                <!-- Label -->
                <label>Confirm Password <span class="text-danger">*</span></label>

                <!-- Input -->
                <input type="password" class="form-control" name="password_confirmation" required>

              </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
              Submit
            </button>

            <!-- Link -->
            {{-- <div class="text-center">
              <small class="text-muted text-center">
                <a href="sign-in.html">S</a>.
              </small>
            </div> --}}

          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->

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
