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
        width: 200px;
        height: 100px;
        overflow: auto;
        padding: 10px;
    }
</style>
<div class="card">
    <div class="card-header">
        <h4>Tabel Data Guru</h4>
    </div>
    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminguru.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="float-right">
            <form action="{{ url('adminguru/cari') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="cari..">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>NUPTK</th>
                    <th>Tahun Masuk</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </thead>

                @if ($guru->count() > 0)
                <?php $no = 0; ?>
                @foreach($guru as $g)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $g->nama }}
                    </td>
                    <td>
                        {{ $g->nip }}
                    </td>
                    <td>
                        {{ $g->nuptk }}
                    </td>
                    <td>
                        {{ $g->tahun_masuk }}
                    </td>
                    <td>
                        <?php
                        $hitungpendidikan = strlen($g->pendidikan);
                        if ($hitungpendidikan > 50) {
                        ?>
                            <div class="overflo">

                                {{ $g->pendidikan }}

                            </div>
                        <?php
                        } else {
                        ?>
                            {{ $g->pendidikan }}
                        <?php
                        }
                        ?>

                    </td>
                    <td>
                        <?php
                        $tanggal = $g->tanggal_lahir;
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
                        echo $g->tempat_lahir . ', ' . $tanggal_lahir;
                        ?>
                    </td>
                    <td>
                        {{ $g->jk }}
                    </td>
                    <td>
                        {{ $g->agama }}
                    </td>
                    <td>
                        <?php
                        $hitungalamat = strlen($g->alamat);
                        if ($hitungalamat > 50) {
                        ?>
                            <div class="overflo">
                                {{ $g->alamat }}
                            </div>
                        <?php
                        } else {
                        ?>
                            {{ $g->alamat }}
                        <?php
                        }
                        ?>

                    </td>
                    <td>
                        {{ $g->no_hp }}
                    </td>
                    <td>
                        {{ $g->email }}
                    </td>
                    <td>
                        <img alt="image" src="{{ asset('imagesguru/'. $g->foto) }}" class="img-fluid" width="100" data-toggle="tooltip">
                    </td>
                    <td>
                        <a href="{{ route('adminguru.edit', $g->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $g->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $g->id }}" action="{{ route('adminguru.destroy', $g->id)}}" method="post">
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
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $guru->links() }}
            </ul>
        </nav>
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