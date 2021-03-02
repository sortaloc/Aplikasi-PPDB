@extends('admin.layouts.app')
@section('content')
@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Tanggal telah ditambah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Tanggal telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('errorwaktu'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Tanggal pendaftaran salah!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Waktu Pelaksanaan Ujian</h4>
        <div class="card-header-action">
            
            <a href="{{ route('adminwaktu.edit', $waktu->id) }}" class="btn btn-outline-info">
                Update
            </a>
            
        </div>
        
    </div>
    <div class="card-body row">
        
        <div class="col-md-12">
            <h4>Tahun Akademik {{ $waktu->tahun_akademik }}</h4>
        </div>


        <div class="col-md-3"><span>Tanggal Waktu Mulai Ujian</span></div>
        <div class="col-md-9"><span>:
                <?php
                $tanggal_buka = $waktu['buka'];
                $hari = substr($tanggal_buka, 8, 2);
                $bulan = substr($tanggal_buka, 5, 2);
                $tahun = substr($tanggal_buka, 0, 4);
                if ($bulan == '01') {
                    $bulan = 'Januari';
                } elseif ($bulan == '02') {
                    $bulan = 'Februari';
                } elseif ($bulan == '03') {
                    $bulan = 'Maret';
                } elseif ($bulan == '04') {
                    $bulan = 'April';
                } elseif ($bulan == '05') {
                    $bulan = 'Mei';
                } elseif ($bulan == '06') {
                    $bulan = 'Juni';
                } elseif ($bulan == '07') {
                    $bulan = 'Juli';
                } elseif ($bulan == '08') {
                    $bulan = 'Agustus';
                } elseif ($bulan == '09') {
                    $bulan = 'September';
                } elseif ($bulan == '10') {
                    $bulan = 'Oktober';
                } elseif ($bulan == '11') {
                    $bulan = 'November';
                } elseif ($bulan == '12') {
                    $bulan = 'Desember';
                }

                $tampil_tanggal_buka = $hari . " " . $bulan . " " . $tahun;
                echo $tampil_tanggal_buka;
                ?>
            </span></div>

        <div class="col-md-3"><span>Tanggal Tutup Waktu Ujian</span></div>
        <div class="col-md-9"><span>:
                <?php
                $tanggal_tutup = $waktu['tutup'];
                $hari = substr($tanggal_tutup, 8, 2);
                $bulan = substr($tanggal_tutup, 5, 2);
                $tahun = substr($tanggal_tutup, 0, 4);
                if ($bulan == '01') {
                    $bulan = 'Januari';
                } elseif ($bulan == '02') {
                    $bulan = 'Februari';
                } elseif ($bulan == '03') {
                    $bulan = 'Maret';
                } elseif ($bulan == '04') {
                    $bulan = 'April';
                } elseif ($bulan == '05') {
                    $bulan = 'Mei';
                } elseif ($bulan == '06') {
                    $bulan = 'Juni';
                } elseif ($bulan == '07') {
                    $bulan = 'Juli';
                } elseif ($bulan == '08') {
                    $bulan = 'Agustus';
                } elseif ($bulan == '09') {
                    $bulan = 'September';
                } elseif ($bulan == '10') {
                    $bulan = 'Oktober';
                } elseif ($bulan == '11') {
                    $bulan = 'November';
                } elseif ($bulan == '12') {
                    $bulan = 'Desember';
                }

                $tampil_tanggal_tutup = $hari . " " . $bulan . " " . $tahun;
                echo $tampil_tanggal_tutup;
                ?>
            </span></div>

  
    </div>
</div>
@endsection