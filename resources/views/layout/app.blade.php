<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/images/dark-logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/custome-css/backend.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/custome-css/all.min.css') }}" />

    <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery + Select2 JS -->
<script src="{{ asset('asset/js/jquery-min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>



<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar  navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('asset/images/dark-logo.png') }}" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ url('/dashboard') }}"
                        class="nav-item nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"><i
                            class="fa fa-server me-2"></i>Dashboard</a>
                    <a href="{{url('/practitioner')}}" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Practitioner</a>
                    <a href="{{url('/users')}}" class="nav-item nav-link"><i class="fa fa-user-o me-2"></i>Users</a>
                    <a href="{{url('/Appointments')}}" class="nav-item nav-link"><i class="fa fa-vcard-o me-2"></i>Appointments</a>
                    <a href="{{url('/modalities')}}" class="nav-item nav-link"><i class="fa fa-vcard-o me-2"></i>Modalities</a>
                    @php
                        $UserContact =
                            request()->is('UserContact')

                    @endphp
                    <div class="nav-item dropdown {{ $UserContact ? 'show' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle {{ $UserContact ? 'active' : '' }}"
                            data-bs-toggle="dropdown" aria-expanded="{{ $UserContact ? 'true' : 'false' }}">
                            <i class="fa fa-window-maximize me-2"></i>Pages
                        </a>

                        <div class="dropdown-menu bg-transparent border-0 ps-2 {{ $UserContact ? 'show' : '' }}">

                            <a href="{{ url('/UserContact') }}"
                                class="dropdown-item m-1 {{ request()->is('heropages') ? 'active' : '' }}">
                                Contact</a>

                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link"><i class="fa fa-bar-chart me-2"></i>Charts</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  navbar-light sticky-top px-4 py-0" style="background-color: #F3F6F9">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="{{url('/admin/contact-us')}}" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle" src="{{ asset('assets/img/user.png') }}"
                                            alt="User" style="width: 40px; height: 40px;">
                                        <div class="ms-2">
                                            <h6 class="fw-normal mb-0"> sent a message</h6>
                                            <small></small>
                                        </div>
                                    </div>
                                </a>

                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all
                                message</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('asset/images/superadmin.jpg') }}"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 text-center">
                            {{-- <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a> --}}
                            <form method="POST" action="{{ route('logout') }}" style="text-center">
                                @csrf
                                <button type="submit" class="ps-2"
                                    style="background: none; border: none; color: rgb(8, 8, 8); cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Widgets End -->
            <div >
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                    <div id="liveToast" class="toast align-items-center text-white bg-success border-0"
                        role="alert">
                        <div class="d-flex">
                            <div class="toast-body" id="toastMessage">
                                <!-- message here -->
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>

            </div>
            @yield('content')
            <!-- Footer Start -->

            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="">&#8593;</i></a>
    </div>

    <!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/lib/chart/chart.min.js') }}"></script>
    <script src=" {{ asset('asset/lib/easing/easing.min.js') }}"></script>
    <script src=" {{ asset('asset/lib/waypoints/waypoints.min.js') }}"></script>
    <script src=" {{ asset('asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('asset/lib/tempusdominus/js/moment.min.js') }}"></script>
    {{-- <script src=" {{asset('asset/lib/tempusdominus/js/moment-timezone.min.js')}}"></script> --}}

    <script src=" {{ asset('asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <!-- Template Javascript -->

    <script>
        function showToast(message, type = 'success') {
            let toastEl = document.getElementById('liveToast');
            let toastBody = document.getElementById('toastMessage');

            // Change background based on type
            toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning');
            toastEl.classList.add(`bg-${type}`);

            toastBody.textContent = message;

            let toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    </script>


</body>

</html>
