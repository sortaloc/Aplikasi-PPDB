@extends('admin.layouts.app')
@section('content')

@if (Session::has('hapus'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Semua data telah dihapus!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tabel Data Kritik dan Saran</h4>
    </div>
    <div class="card-body">
        <div class="float-left">
            <button href="{{ route('adminkritiksaran.create') }}" onclick="hapusData()" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus semua data</button>
        </div>

        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                </thead>

                @if ($ks->count() > 0)
                <?php $no = 0; ?>
                @foreach($ks as $k)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $k->nama }}
                    </td>
                    <td>
                        {{ $k->email }}
                    </td>
                    <td>
                        {{ $k->pesan }}
                    </td>
                    <form id="data-hapus" action="{{ route('adminkritiksaran.destroy', 'hapus')}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
                @endforeach
                @else
                <tr>
                    <td></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                @endif
            </table>

        </div>

    </div>

</div>
<script>
    function hapusData() {
        Swal.fire({
            title: 'Hapus semua data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fc544b',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#data-hapus').submit();
            }
        })

    }
</script>
@endsection