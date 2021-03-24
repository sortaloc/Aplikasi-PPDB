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
@if (Session::has('soal'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Quota soal sudah penuh!'
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
        <h4>Tabel Data Soal Ujian</h4>
    </div>
    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('adminsoal.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <th>No.</th>
                    <th>Nama Mapel</th>
                    <th>Soal</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Pilihan E</th>
                    <th>Jawaban</th>
                    <th>Aksi</th>
                </thead>

                @if ($soal->count() > 0)
                <?php $no = 0; ?>
                @foreach($soal as $s)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $s->nama_mapel }}
                    </td>
                    <td>
                        <?php
                        $hitungsoal = strlen($s->soal);
                        if ($hitungsoal > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->soal; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->soal;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $hitungA = strlen($s->A);
                        if ($hitungA > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->A; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->A;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $hitungB = strlen($s->B);
                        if ($hitungB > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->B; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->B;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $hitungC = strlen($s->C);
                        if ($hitungC > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->C; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->C;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $hitungD = strlen($s->D);
                        if ($hitungD > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->D; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->D;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $hitungE = strlen($s->E);
                        if ($hitungE > 50) {
                        ?>
                            <div class="overflo">
                                <?php echo $s->E; ?>
                            </div>
                        <?php
                        } else {
                            echo $s->E;
                        }
                        ?>
                    </td>
                    <td>
                        {{ $s->jawaban }}
                    </td>
                    <td>
                        <a href="{{ route('adminsoal.edit', $s->id)}}" class="btn btn-icon btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-icon btn-danger" onclick="hapusData( <?php echo $s->id; ?> )"><i class="fas fa-trash"></i></button>
                        <form id="data-{{ $s->id }}" action="{{ route('adminsoal.destroy', $s->id)}}" method="post">
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