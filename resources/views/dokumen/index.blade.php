@extends('layouts.app')
@section('content')
@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berkas telah ditambahkan!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berkas telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('hapus'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berkas telah dihapus!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="card" id="tampil_berkas">
    <div class="card-header">
        <h4>Tampilan Berkas</h4>
        <div class="card-header-action">
            <a href="{{ route('dokumen.edit', $dokumen->id)}}" class="btn btn-icon icon-left btn-info">
            <i class="fas fa-edit"></i> 
                Sunting
            </a>
            @if ($dokumen->pkh != "-" && $dokumen->pkh != "-" && $dokumen->pkh != "-")
            <button class="btn btn-icon icon-left btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-trash"></i> 
                Hapus
            </button>
            @endif
            <div class="dropdown-menu">
                <?php
                if ($dokumen->pkh != '-') {
                ?>
                    <a onclick="hapusPKH( <?php echo $dokumen->id; ?> )" class="dropdown-item">PKH</a>
                    <form id="pkh-{{ $dokumen->id }}" action="{{ route('dokumen.destroy', $dokumen->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input name="pkh" type="text" style="display: none;" value="{{ $dokumen->pkh }}">
                    </form>
                <?php
                }

                if ($dokumen['kip'] != '-') {
                ?>
                    <a onclick="hapusKIP( <?php echo $dokumen->id; ?> )" class="dropdown-item">KIP</a>
                    <form id="kip-{{ $dokumen->id }}" action="{{ route('dokumen.destroy', $dokumen->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input name="kip" type="text" style="display: none;" value="{{ $dokumen->kip }}">
                    </form>
                <?php
                }

                if ($dokumen['kps'] != '-') {
                ?>
                    <a onclick="hapusKPS( <?php echo $dokumen->id; ?> )" class="dropdown-item">KPS</a>
                    <form id="kps-{{ $dokumen->id }}" action="{{ route('dokumen.destroy', $dokumen->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input name="kps" type="text" style="display: none;" value="{{ $dokumen->kps }}">
                    </form>
                <?php
                }
                ?>
            </div>
            
            <script>
                function hapusPKH(id) {
                    Swal.fire({
                        title: 'Hapus berkas PKH?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.value) {
                            $('#pkh-' + id).submit();
                        }
                    })

                }

                function hapusKIP(id) {
                    Swal.fire({
                        title: 'Hapus berkas KIP?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.value) {
                            $('#kip-' + id).submit();
                        }
                    })

                }

                function hapusKPS(id) {
                    Swal.fire({
                        title: 'Hapus berkas KPS?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.value) {
                            $('#kps-' + id).submit();
                        }
                    })

                }
            </script>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <span id="span_akta">Akta Kelahiran</span>
                <br>
                <br>
                <img id="gambar_akta" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->akta) }}" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_skhun">Surat Keterangan Hasil Ujian Nasional (SKHUN)</span>
                <br>
                <img id="gambar_skhun" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->skhun) }}" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_ijazah">Ijazah</span>
                <br>
                <br>
                <img id="gambar_ijazah" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->ijazah) }}" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_kk">Kartu Keluarga</span>
                <br>
                <br>
                <img id="gambar_kk" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->kk) }}" alt="">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 text-center">
                <span id="span_ktp">Kartu Tanda Penduduk (KTP) salah satu keluarga</span>
                <br>
                <img id="gambar_ktp" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->ktp) }}" alt="">
            </div>
            <div class="col-md-3 text-center">
                <?php
                if ($dokumen['pkh'] == '-') {
                ?>
                <?php
                } else {
                ?>
                    <span id="span_pkh">Program Keluarga Harapan (PKH)</span>
                    <br>
                    <br>
                    <img id="gambar_pkh" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->pkh) }}" alt="">
                <?php
                }

                ?>
            </div>
            <div class="col-md-3 text-center">
                <?php
                if ($dokumen['kip'] == '-') {
                ?>
                <?php
                } else {
                ?>
                    <span id="span_kip">Kartu Indonesia Pintar (KIP)</span>
                    <br>
                    <br>
                    <img id="gambar_kip" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->kip) }}" alt="">
                <?php
                }

                ?>
            </div>
            <div class="col-md-3 text-center">
                <?php
                if ($dokumen['kps'] == '-') {
                ?>
                <?php
                } else {
                ?>
                    <span id="span_kps">Kartu Perlindungan Sosial (KPS)</span>
                    <br>
                    <br>
                    <img id="gambar_kps" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="{{ asset('files/'.$dokumen->kps) }}" alt="">
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>
@endsection