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
<style>
    .overflo {
        width: 150px;
        height: 100px;
        overflow: auto;
        padding: 10px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4>Tabel Data Siswa</h4>
    </div>


    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminsiswa.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <th>No.</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </thead>

                @if ($siswa->count() > 0)
                <?php $no = 0; ?>
                @foreach($siswa as $s)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $s->nisn }}
                    </td>
                    <td>
                        {{ $s->nis }}
                    </td>
                    <td>
                        {{ $s->nama }}
                    </td>
                    <td>
                        {{ $s->kelas }}
                    </td>
                    <td>
                        <?php
                        $tanggal = $s->tanggal_lahir;
                        $hari = substr($tanggal, 8, 2);
                        $bulan = substr($tanggal, 5, 2);
                        $tahun = substr($tanggal, 0, 4);
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

                        $tanggal_lahir = $hari . " " . $bulan . " " . $tahun;
                        echo $s->tempat_lahir . ', ' . $tanggal_lahir;
                        ?>

                    </td>
                    <td>
                        {{ $s->jk }}
                    </td>
                    <td>
                        <?php
                        $hitung_alamat = strlen($s->alamat);
                        if ($hitung_alamat > 50) {
                        ?>
                            <div class="overflo">
                                {{ $s->alamat }}
                            </div>
                        <?php
                        } else {
                        ?>
                            {{ $s->alamat }}
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('adminsiswa.edit', $s->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $s->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $s->id }}" action="{{ route('adminsiswa.destroy', $s->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
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