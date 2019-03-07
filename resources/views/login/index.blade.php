@include ('login.partials.header');

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

              @if ($message = Session::get('message'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  <strong>{{$message}}</strong>
                </div>
              @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
              </div>
            @endif

              @if(count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('login.submit') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
              </div>
            </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
