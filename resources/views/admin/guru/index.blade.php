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
        <h4>Tabel Data Guru</h4>

        <div class="card-header-form">
            <form action="{{ url('adminguru/cari') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="Cari.." value="{{ old('cari') }}">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6" style="padding: 10px; margin-left: 15px;">
        <a href="{{ route('adminguru.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="card-body p-0">

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
                <tr>
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
                    <td style="overflow-y: scroll; display:block; height:80px;">
                        {{ $g->pendidikan }}
                    </td>
                    <td>
                        {{ $g->tempat_lahir }}, {{ $g->tanggal_lahir }}
                    </td>
                    <td>
                        {{ $g->jk }}
                    </td>
                    <td>
                        {{ $g->agama }}
                    </td>
                    <td style="overflow-y: scroll; display:block; height:80px;">
                        {{ $g->alamat }}
                    </td>
                    <td>
                        {{ $g->no_hp }}
                    </td>
                    <td>
                        {{ $g->email }}
                    </td>
                    <td>
                        <img alt="image" src="{{ asset('imagesguru/'. $g->foto) }}" class="img-fluid" data-toggle="tooltip">
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