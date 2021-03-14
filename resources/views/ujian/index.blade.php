@extends('layouts.app')
@section('content')
@if (Session::has('selesai'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Jawaban anda telah dikirim!'
    })
</script>
@endif
@if (Session::has('soalkosong'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Soal masih kosong!'
    })
</script>
@endif
@if (Session::has('errorshow'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Anda sudah mengerjakan soal mata pelajaran tersebut!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Halaman Ujian</h4>
    </div>
    <div class="card-body">
        <h4>Peraturan Ujian Online</h4>
        <ol>
            <li>
                Ujian hanya bisa di kerjakan pada tanggal yang telah ditetapkan, lihat di menu jadwal !
            </li>
            <li>
                Keterangan mata pelajaran, jumlah soal, waktu mengerjakan dan jenis soal sudah tertera pada tampilan kartu di bawah ini !
            </li>
            <li>
                Untuk memulai ujian Anda bisa mengklik tombol mulai sesuai dengan soal yang ingin di kerjakan terlebih dahulu.
            </li>
            <li>
                Ketika Anda sudah mengklik tombol mulai maka waktu pengerjaan akan berjalan dan Anda di wajibkan untuk menjawab soal yang telah disediakan !
            </li>
            <li>
                Jika waktu telah habis maka jawaban Anda akan terkirim ke sistem secara otomatis.
            </li>
            <li>
                Jika sudah mengerjakan ujian maka Anda tidak dapat mengerjakan ujian pada soal ujian yang sama untuk yang ke dua kali.
            </li>
            <li>
                Anda bisa melihat hasil ujian Anda di menu pengumuman ketika anda telah mengerjakan soal yang telah disediakan dan mengirim jawaban Anda.
            </li>
            <li>
                Selamat mengerjakan !
            </li>
        </ol>
        <p></p>
    </div>
</div>
<div class="row">
    @foreach ($mapelujian as $mu)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
            <div class="article-header">
                <div class="article-image" data-background="{{ asset('image_mp/'. $mu->foto) }}">
                </div>
                <div class="article-title">

                </div>
            </div>
            <div class="article-details">
                <div class="row">

                    <div class="col-md-12">
                        <h6>{{ $mu->nama_mapel }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <span>Jumlah Soal</span>
                    </div>
                    <div class="col-md-6">
                        <span>: {{ $mu->jumlah }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <span>Waktu Ujian</span>
                    </div>
                    <div class="col-md-6">
                        <span>: {{ $mu->waktu }} Menit</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <span>Jenis Soal</span>
                    </div>
                    <div class="col-md-6">
                        <span>: Pilgan</span>
                    </div>
                </div>

                <div class="clearfix mb-3"></div>
                <div class="article-cta">
                    <a href="{{ route('ujian.show', $mu->id_mapel) }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-play"></i> Mulai</a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection