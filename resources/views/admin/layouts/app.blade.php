<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>PPDB</title>
    <link rel="icon" href="{{ asset('logo/favicon.png') }}" type="image/gif" sizes="16x16">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/select2.min.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/assets/css/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/datatables/select.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.css') }}">
</head>

<body>

    @auth("admin")
    @include('sweet::alert')
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <?php

                    $notifikasi = App\Models\Notifikasi::where('status', 0)->get();
                    ?>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?php if ($notifikasi->count() > 0) {
                                                                                                                                                        echo 'beep';
                                                                                                                                                    } ?>"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Pendaftar Baru
                            </div>

                            <div class="dropdown-list-content dropdown-list-icons">
                                @if ($notifikasi->count() > 0)
                                @foreach ($notifikasi as $n)
                                <a href="{{ route('adminusers.show', $n->nisn) }}" class="dropdown-item dropdown-item-unread">

                                    <div class="dropdown-item-desc">
                                        ({{ $n->nisn }}) {{ $n->nama }}
                                    </div>
                                </a>
                                @endforeach
                                @else
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-desc">
                                        Belum ada pendaftar baru!
                                    </div>
                                </a>
                                @endif
                            </div>

                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <div class="d-sm-none d-lg-inline-block">Heyy, {{ auth()->guard('admin')->user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('admin.edit', auth()->guard('admin')->user()->id ) }}" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Pengaturan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a class="text-primary" href="{{ url('admin') }}">PPDB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a class="text-primary" href="{{ url('admin') }}">PPDB</a>
                    </div>
                    <!-- sidebar -->
                    @include('admin.layouts.sidebar')
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- content -->
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('template/assets/js/summernote-bs4.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('template/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/datatables/modules-datatables.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    @endauth
</body>

</html>