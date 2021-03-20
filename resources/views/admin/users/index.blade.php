@extends('admin.layouts.app')
@section('content')

@if (Session::has('verifikasi'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'NISN telah terverifikasi!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Tabel Data Users</h4>
        <div class="card-header-form">
            <form action="{{ url('adminusers/cari') }}" method="post">
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


    <div class="card-body">
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Nama Ibu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>

                @if ($users->count() > 0)
                <?php $no = 0; ?>
                @foreach($users as $u)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $u->name }}
                    </td>
                    <td>
                        {{ $u->email }}
                    </td>
                    <td>
                        {{ $u->tempat_lahir }}
                    </td>
                    <td>
                        {{ $u->tanggal_lahir }}
                    </td>
                    <td>
                        {{ $u->nama_ibu }}
                    </td>
                    <td>
                        @if ($u->validasi == 0)
                        <div class="badge badge-danger">Tidak Valid</div>
                        @else
                        <div class="badge badge-success">Valid</div>
                        @endif
                    </td>
                    <td>
                        @if ($u->email_verified_at == null)
                        <button class="btn btn-icon btn-primary" onclick="Valid( <?php echo $u->id; ?> )"><i class="fas fa-check"></i></button>
                        <button class="btn btn-icon btn-danger" onclick="NoValid( <?php echo $u->id; ?> )"><i class="fas fa-times"></i>&nbsp;</button>

                        <form id="valid-{{ $u->id }}" action="{{ route('adminusers.update', $u->id)}}" method="post">
                            @csrf
                            @method('PUT')
                        </form>
                        
                        <form id="novalid-{{ $u->id }}" action="{{ route('adminusers.destroy', $u->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                        @else
                        -
                        @endif
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
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $users->links() }}
            </ul>
        </nav>
    </div>
</div>

<script>
    function Valid(id) {
        Swal.fire({
            title: 'NISN Valid?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fc544b',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#valid-' + id).submit();
            }
        })

    }
    function NoValid(id) {
        Swal.fire({
            title: 'NISN Tidak Valid?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fc544b',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#novalid-' + id).submit();
            }
        })

    }
</script>

@endsection