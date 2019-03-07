@include ('dashboard.partials.header')
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

@include ('dashboard.partials.sidebar')

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Illuminate\Support\Facades\Session::get('email') }}</span>
                            <img class="img-profile rounded-circle" src="http://pluspng.com/img-png/user-png-icon-male-user-icon-512.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">All Videos</h1>
                </div>

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


                <div class="row">
                    @if (count($videos) > 0)

                        <script>
                            document.addEventListener('contextmenu', event => event.preventDefault());
                        </script>

                        @foreach ($videos as $video)
                            <div class="card" style="width:400px; border-radius: 1px; border-color: black; margin: 5px">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video width="100%" id="video" controls controlsList="nodownload">
                                        <source src="{{ url('storage/' . $video->file) }}" type="video/mp4">
                                        Your browser does not support HTML5 video.
                                    </video>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title" style="color: black;">Title: {{ $video->title }}</h4>
                                    <h4 class="card-text" style="color: black;">Description: {{ $video->description }}</h4>
                                    <h4 class="card-text" style="color: black;">By: {{ $video->email }}</h4>
                                    <hr class="sidebar-divider" />
                                    <a href="{{ route('dashboard.videos.delete', ['id' => $video->videoID]) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card" style="width:400px; border-radius: 1px; border-color: black; margin: 2px">
                            {{--<img class="card-img-top" src="img_avatar1.png" alt="Card image">--}}
                            <div class="card-body">
                                <h4 class="card-title">No content</h4>
                                <p class="card-text">No content</p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; RTGNetwork 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('dashboard.logout') }}">Logout</a>
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

<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('theme/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('theme/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
