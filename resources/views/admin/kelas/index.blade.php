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
@if (Session::has('errorkelas'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Kelas sudah tersedia!'
    })
</script>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tabel Data Kelas</h4>
    </div>


    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminkelas.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="float-right">
            <form action="{{ url('adminkelas/cari') }}" method="post">
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
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </thead>

                @if ($kelas->count() > 0)
                <?php $no = 0; ?>
                @foreach($kelas as $k)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $k->nama_kelas }}
                    </td>
                    <td>
                        {{ $k->wali_kelas }}
                    </td>
                    <td>
                        <a href="{{ route('adminkelas.edit', $k->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $k->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $k->id }}" action="{{ route('adminkelas.destroy', $k->id)}}" method="post">
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
                    <td></td>
                </tr>
                @endif
            </table>

        </div>

    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $kelas->links() }}
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