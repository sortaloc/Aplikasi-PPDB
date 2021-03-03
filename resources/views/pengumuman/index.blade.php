@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Halaman Pengumuman</h4>
    </div>
    <div class="card-body text-center">
        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Status hasil ujian anda </p>
        @if ($status == 'Proses')
        <h3><span class="badge badge-warning">Sedang dalam proses</span></h3>
        @endif
        @if ($status == 'Diterima')
        <h3><span class="badge badge-success">Selamat anda diterima!</span></h3>
        @endif
        @if ($status == 'Ditolak')
        <h3><span class="badge badge-danger">Sayang sekali anda tidak diterima!</span></h3>
        @endif
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Halaman Nilai</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Mapel</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                    <th>Status</th>
                </thead>

                @if ($nilai->count() > 0)
                <?php $no = 0; ?>
                @foreach($nilai as $n)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $n->nama_mapel }}
                    </td>
                    <td>
                        {{ $n->kkm }}
                    </td>
                    <td>
                        {{ $n->nilai }}
                    </td>
                    <td>
                        @if ( $n->kkm > $n->nilai)
                        <span class="badge badge-danger">Tidak tuntas</span>
                        @endif
                        @if ( $n->kkm <= $n->nilai)
                            <span class="badge badge-success">Tuntas</span>
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
                </tr>
                @endif
            </table>

        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination">
                {{ $nilai->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection