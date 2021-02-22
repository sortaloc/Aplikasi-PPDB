@extends('admin.layouts.app')
@section('content')
@if (Session::has('terima'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Siswa telah diterima!',
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
        <h4>Tabel Siswa Pendaftar</h4>
        <div class="card-header-form">
            <form action="{{ url('adminpendaftaran/cari') }}" method="post">
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
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Tahun Pendaftaran</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tr>
                    @if ($pendaftaran->count() > 0)
                    <?php $no = 0; ?>
                    @foreach($pendaftaran as $p)
                    <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $p->tahun_pendaftaran }}
                    </td>
                    <td>
                        {{ $p->nisn }}
                    </td>
                    <td>
                        {{ $p->nama }}
                    </td>
                    <td>
                        {{ $p->jk }}
                    </td>
                    <td>
                        {{ $p->asal_sekolah }}
                    </td>
                    <td>
                        <img alt="image" src="{{ asset('images/'. $p->foto) }}" class="img-fluid" data-toggle="tooltip">
                    </td>
                    <td>
                        <?php
                        if ($p->status == 'Proses') {
                        ?>
                            <div class="badge badge-warning">{{ $p->status }}</div>
                        <?php
                        } elseif ($p->status == 'Diterima') {
                        ?>
                            <div class="badge badge-success">{{ $p->status }}</div>
                        <?php
                        }
                        ?>

                    </td>
                    <td>
                        <form id="terima-{{ $p->id_user }}" action="{{ route('adminpendaftaran.update', $p->id_user)}}" method="post">
                            @csrf
                            @method('PUT')
                        </form>
                        <form id="data-{{ $p->id_user }}" action="{{ route('adminpendaftaran.destroy', $p->id_user)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item btn-sm has-icon" onclick="detailData( <?php echo $p->nisn; ?>, 
                            <?php echo $p->tahun_pendaftaran; ?>, 
                            '{{ $p->nama }}',
                             '{{ $p->tempat_lahir }}',
                             '{{ $p->tanggal_lahir }}',
                             '{{ $p->jk }}',
                             '{{ $p->agama }}',
                             '{{ $p->alamat }}',
                             '{{ $p->nama_ayah }}',
                             '{{ $p->nama_ibu }}',
                             '{{ $p->pekerjaan_ayah }}',
                             '{{ $p->pekerjaan_ibu }}',
                             '{{ $p->tempat_tinggal }}',
                             '{{ $p->asal_sekolah }}',
                             '{{ $p->transportasi }}',
                             '{{ $p->foto }}',
                             '{{ $p->akta }}',
                             '{{ $p->skhun }}',
                             '{{ $p->ijazah }}',
                             '{{ $p->kk }}',
                             '{{ $p->ktp }}',
                             '{{ $p->pkh }}',
                             '{{ $p->kip }}',
                             '{{ $p->kps }}',
                             )">Detail</button>
                            <?php
                            if ($p->status == 'Proses') {
                            ?>
                                <button class="dropdown-item has-icon btn-sm" onclick="terimaSiswa( <?php echo $p->id_user; ?> )">Diterima</button>
                            <?php
                            }
                            ?>
                            <button class="dropdown-item has-icon btn-sm" onclick="hapusData( <?php echo $p->id_user; ?> )">Hapus</button>
                        </div>
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
                    <td></td>
                </tr>
                @endif
            </table>

        </div>

    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $pendaftaran->links() }}
            </ul>
        </nav>
    </div>
</div>

<div class="card" id="card_detail" style="display: none;">
    <div class="card-header">
        <h4>Detail Data</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">
                    <i class="fas fa-id-card"></i> Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-home"></i> Berkas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">
                    <i class="fas fa-mail-bulk"></i> Hasil Ujian</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade show active" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
                <div class="col-md-12 row">
                    <div class="col-md-3">
                        <img id="foto" alt="image" src="" style="width: 210px; height: 280px" class="img-thumbnail mx-auto">
                        <br>
                    </div>
                    <div class="col-md-9">
                        <div class="author-box-name">
                            <h5 id="nama" class="text-primary"></h5>
                        </div>

                        <div class="author-box-description">
                            <div class="row">
                                <div class="col-md-3">
                                    <span>NISN</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="nisn"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <span>Tahun Pendaftaran</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="tahun_pendaftaran"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Tempat, Tanggal Lahir</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="tempat_lahir"></span>, <span id="tanggal_lahir"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Jenis Kelamin</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="jk"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Agama</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="agama"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Alamat</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="alamat"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Nama Ayah</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="nama_ayah"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Nama Ibu</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="nama_ibu"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Pekerjaan Ayah</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="pekerjaan_ayah"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Pekerjaan Ibu</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="pekerjaan_ibu"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Tempat Tinggal</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="tempat_tinggal"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Asal Sekolah</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="asal_sekolah"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <span>Transportasi</span>
                                </div>
                                <div class="col-md-9">
                                    : <span id="transportasi"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="home5" role="tabpanel" aria-labelledby="home-tab5">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <span>Akta Kelahiran</span>
                        <br>
                        <br>
                        <img id="akta" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <span>Surat Keterangan Hasil Ujian Nasional (SKHUN)</span>
                        <br>
                        <img id="skhun" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <span>Ijazah</span>
                        <br>
                        <br>
                        <img id="ijazah" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <span>Kartu Keluarga</span>
                        <br>
                        <br>
                        <img id="kk" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <span>Kartu Tanda Penduduk (KTP) salah satu keluarga</span>
                        <br>
                        <img id="ktp" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="">
                    </div>
                    <div class="col-md-3 text-center">
                        <span style="display: none;" id="span_pkh">Program Keluarga Harapan (PKH)</span>
                        <br>
                        <img id="pkh" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="" style="display: none;">
                    </div>
                    <div class="col-md-3 text-center">
                        <span style="display: none;" id="span_kip">Kartu Indonesia Pintar (KIP)</span>
                        <br>
                        <img id="kip" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="" style="display: none;">
                    </div>
                    <div class="col-md-3 text-center">
                        <span style="display: none;" id="span_kps">Kartu Pelayanan Sosial (KPS)</span>
                        <br>
                        <img id="kps" style="width: 230px; height: 300px;" class="img-thumbnail mx-auto" src="" alt="" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
                Hasil Ujian
            </div>
        </div>
    </div>
</div>

<script>
    function detailData(nisn, tahun_pendaftaran, nama, tempat_lahir, tanggal_lahir, jk, agama, alamat, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, tempat_tinggal, asal_sekolah, transportasi, foto, akta, skhun, ijazah, kk, ktp, pkh, kip, kps) {

        document.getElementById("card_detail").style.display = "block";
        document.getElementById("nisn").innerHTML = nisn;
        document.getElementById("tahun_pendaftaran").innerHTML = tahun_pendaftaran;
        document.getElementById("nama").innerHTML = nama;
        document.getElementById("tempat_lahir").innerHTML = tempat_lahir;
        document.getElementById("tanggal_lahir").innerHTML = tanggal_lahir;
        document.getElementById("jk").innerHTML = jk;
        document.getElementById("agama").innerHTML = agama;
        document.getElementById("alamat").innerHTML = alamat;
        document.getElementById("nama_ayah").innerHTML = nama_ayah;
        document.getElementById("nama_ibu").innerHTML = nama_ibu;
        document.getElementById("pekerjaan_ayah").innerHTML = pekerjaan_ayah;
        document.getElementById("pekerjaan_ibu").innerHTML = pekerjaan_ibu;
        document.getElementById("tempat_tinggal").innerHTML = tempat_tinggal;
        document.getElementById("asal_sekolah").innerHTML = asal_sekolah;
        document.getElementById("transportasi").innerHTML = transportasi;
        document.getElementById("foto").src = "http://localhost/ppdb/public/images/" + foto;
        document.getElementById("akta").src = "http://localhost/ppdb/public/files/" + akta;
        document.getElementById("skhun").src = "http://localhost/ppdb/public/files/" + skhun;
        document.getElementById("ijazah").src = "http://localhost/ppdb/public/files/" + ijazah;
        document.getElementById("kk").src = "http://localhost/ppdb/public/files/" + kk;
        document.getElementById("ktp").src = "http://localhost/ppdb/public/files/" + ktp;
        if (pkh == '-') {
            document.getElementById("pkh").style.display = "none";
            document.getElementById("span_pkh").style.display = "none";
        } else {
            document.getElementById("pkh").src = "http://localhost/ppdb/public/files/" + pkh;
            document.getElementById("pkh").style.display = "block";
            document.getElementById("span_pkh").style.display = "block";
        }

        if (kip == '-') {
            document.getElementById("kip").style.display = "none";
            document.getElementById("span_kip").style.display = "none";
        } else {
            document.getElementById("kip").src = "http://localhost/ppdb/public/files/" + kip;
            document.getElementById("kip").style.display = "block";
            document.getElementById("span_kip").style.display = "block";
        }

        if (kps == '-') {
            document.getElementById("kps").style.display = "none";
            document.getElementById("span_kps").style.display = "none";
        } else {
            document.getElementById("kps").src = "http://localhost/ppdb/public/files/" + kps;
            document.getElementById("kps").style.display = "block";
            document.getElementById("span_kps").style.display = "block";
        }

    }

    function hapusData(id_user) {
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
                $('#data-' + id_user).submit();
            }
        })

    }

    function terimaSiswa(id_user) {
        Swal.fire({
            title: 'Terima siswa sebagai Peserta Didik Baru?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6777ef',
            cancelButtonColor: '#fc544b',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $('#terima-' + id_user).submit();
            }
        })

    }
</script>

@endsection