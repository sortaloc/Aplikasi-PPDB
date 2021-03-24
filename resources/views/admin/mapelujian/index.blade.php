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

<div class="card">
    <div class="card-header">
        <h4>Tabel Data Mapel Ujian</h4>
    </div>
    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminmapelujian.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <th>No.</th>
                    <th>Nama Mapel</th>
                    <th>KKM</th>
                    <th>Jumlah Soal</th>
                    <th>Waktu Ujian</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </thead>

                @if ($mapelujian->count() > 0)
                <?php $no = 0; ?>
                @foreach($mapelujian as $mu)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $mu->nama_mapel }}
                    </td>
                    <td>
                        {{ $mu->kkm }}
                    </td>
                    <td>
                        {{ $mu->jumlah }}
                    </td>
                    <td>
                        {{ $mu->waktu }}
                    </td>
                    <td>
                        <img alt="image" src="{{ asset('image_mp/'. $mu->foto) }}" class="img-thumbnail" width="100" data-toggle="tooltip">
                    </td>
                    <td>
                        <a href="{{ route('adminmapelujian.edit', $mu->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusDataMapelUjian( <?php echo $mu->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $mu->id }}" action="{{ route('adminmapelujian.destroy', $mu->id)}}" method="post">
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
                    <td></td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
<script>
    function hapusDataMapelUjian(id) {
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