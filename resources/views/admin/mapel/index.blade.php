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
        <h4>Tabel Data Mapel</h4>
    </div>


    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminmapel.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="float-right">
            <form action="{{ url('adminmapel/cari') }}" method="post">
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
                    <th>Nama Mapel</th>
                    <th>KKM</th>
                    <th>Guru Mapel</th>
                    <th>Aksi</th>
                </thead>

                @if ($mapel->count() > 0)
                <?php $no = 0; ?>
                @foreach($mapel as $m)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $m->nama_mapel }}
                    </td>
                    <td>
                        {{ $m->kkm }}
                    </td>
                    <td>
                        {{ $m->guru_mapel }}
                    </td>
                    <td>
                        <a href="{{ route('adminmapel.edit', $m->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $m->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $m->id }}" action="{{ route('adminmapel.destroy', $m->id)}}" method="post">
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
                    <td></td>
                </tr>
                @endif
            </table>

        </div>

    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $mapel->links() }}
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