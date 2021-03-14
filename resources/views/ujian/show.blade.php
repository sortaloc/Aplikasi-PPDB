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
    <link rel="stylesheet" href="{{ asset('template/assets/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/select2.min.css') }}">

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
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                            <div class="d-sm-none d-lg-inline-block">Heyy, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('home.edit', Auth::user()->id) }}" class="dropdown-item has-icon">
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
                        <a class="text-primary" href="{{ url('home') }}">PPDB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a class="text-primary" href="{{ url('home') }}">PPDB</a>
                    </div>
                    <!-- sidebar -->
                    @include('layouts.sidebar')
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- content -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Soal Ujian</h4>
                                <div class="card-header-form">
                                    <?php
                                    session_start();
                                    $session_ujian = $id_user . $nama_mapel;
                                    if (isset($_SESSION[$session_ujian])) {
                                        $lewat = time() - $_SESSION[$session_ujian];
                                    } else {
                                        $_SESSION[$session_ujian] = time();
                                        $lewat = 0;
                                    }

                                    ?>
                                    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                                    <script src="{{ asset('countdown/js/jquery.plugin.min.js') }}"></script>
                                    <script src="{{ asset('countdown/js/jquery.countdown.js') }}"></script>

                                    <span id="timer">00 : 00 : 00</span>

                                    <script type="text/javascript">
                                        function waktuHabis() {
                                            // alert('Waktu Anda telah habis, Terima kasih sudah berkunjung.');
                                            // var frmSoal = document.getElementById("frmSoal");
                                            // frmSoal.submit();
                                            Swal.fire({
                                                title: 'Waktu Habis!',
                                                icon: 'success',
                                                text: 'Terima kasih telah mengikuti test. Silahkan kirim jawaban anda dengan meng klik tombol kirim dibawah!',
                                                confirmButtonColor: '#6777ef',
                                                confirmButtonText: 'Kirim'
                                            }).then((result) => {
                                                if (result.value) {
                                                    $('#formsoal').submit();
                                                }
                                            })
                                        }

                                        function hampirHabis(periods) {
                                            if ($.countdown.periodsToSeconds(periods) == 60) {
                                                $(this).css({
                                                    color: "red"
                                                });
                                            }
                                        }
                                        $(function() {
                                            var waktu = <?php echo $waktu ?>;
                                            var sisa_waktu = waktu - <?php echo $lewat ?>;
                                            var longWayOff = sisa_waktu;
                                            $("#timer").countdown({
                                                until: longWayOff,
                                                compact: true,
                                                onExpiry: waktuHabis,
                                                onTick: hampirHabis
                                            });
                                        })
                                    </script>
                                    <style>
                                        #timer {
                                            padding: 7px;
                                            font-size: 2em;
                                            font-weight: bolder;
                                        }
                                    </style>
                                </div>
                            </div>
                            <form id="formsoal" action="{{ route('ujian.store') }}" method="post">
                                <div class="card-body">
                                    @csrf
                                    <input type="hidden" name="id_mapel" value="{{ $id_mapel }}">
                                    @if ($soal->count() > 0)
                                    <p>Pilihlah jawaban dengan cara mengklik jawaban yang dianggap benar!</p>
                                    <?php $no = 0; ?>
                                    @foreach($soal as $s)
                                    <?php $no++; ?>

                                    <ol>
                                        <span>{{ $no }}. {{ $s->soal }}</span>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="A{{ $s->id }}" id="exampleRadios{{ $no }}">
                                                    <label class="form-check-label" for="exampleRadios{{ $no }}">
                                                        {{ $s->A }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="B{{ $s->id }}" id="exampleRadios{{ $no }}">
                                                    <label class="form-check-label" for="exampleRadios{{ $no }}">
                                                        {{ $s->B }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="C{{ $s->id }}" id="exampleRadios{{ $no }}">
                                                    <label class="form-check-label" for="exampleRadios{{ $no }}">
                                                        {{ $s->C }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="D{{ $s->id }}" id="exampleRadios{{ $no }}">
                                                    <label class="form-check-label" for="exampleRadios{{ $no }}">
                                                        {{ $s->D }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="E{{ $s->id }}" id="exampleRadios{{ $no }}">
                                                    <label class="form-check-label" for="exampleRadios{{ $no }}">
                                                        {{ $s->E }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </ol>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-paper-plane"></i> Kirim Jawaban</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('template/assets/js/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/select2.full.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->

</body>

</html>