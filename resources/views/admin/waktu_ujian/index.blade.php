@extends('admin.layouts.app')
@section('content')

@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah ditambah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('hapus'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah dihapus!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('errortambahwaktu'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Waktu ujian telah tersedia!'
    })
</script>
@endif
@if (Session::has('errorwaktu'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Waktu ujian salah!'
    })
</script>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tabel Jadwal Pelaksanaan Ujian</h4>
    </div>
    <div class="card-body">
        @if ($waktu == null)
        <div class="float-left">
            <a href="{{ route('adminwaktuujian.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        @endif
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Tanggal Buka</th>
                    <th>Tanggal Tutup</th>
                    <th>Aksi</th>
                </thead>

                @if ($waktu != null)
                
                <tr>
                    
                    <td>
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
                    </td>
                    <td>
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
                    </td>
                    <td>
                        <a href="{{ route('adminwaktuujian.edit', $waktu->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $waktu->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $waktu->id }}" action="{{ route('adminwaktuujian.destroy', $waktu->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
             
                @else
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td></td>
                </tr>
                @endif
            </table>

        </div>

    </div>
    
</div>
<script>
    function hapusData(id) {
        Swal.fire({
            title: 'Hapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fc544b',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#data-' + id).submit();
            }
        })

    }
</script>
@endsection