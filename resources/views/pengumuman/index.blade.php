@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Halaman Pengumuman</h4>
    </div>
    <div class="card-body text-center">
        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Status hasil ujian tertulis anda </p><span class="badge badge-warning">Sedang dalam penilaian</span> 
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Halaman Nilai</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('image_mp/mtk.jpg') }}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">Matematika</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>Ujian tertulis mata pelajaran Matematika dengan 20 soal pilgan dan 5 soal essay. </p>
                        <div class="article-cta">
                            <a href="#" class="btn btn-primary">Lihat Nilai</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('image_mp/ipa.png') }}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">Ilmu Pengetahuan Alam</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>Ujian tertulis mata pelajaran Ilmu Pengetahuan Alam dengan 20 soal pilgan dan 5 soal essay. </p>
                        <div class="article-cta">
                            <a href="#" class="btn btn-primary">Lihat Nilai</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('image_mp/bi.jpg') }}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">Bahasa Indonesia</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>Ujian tertulis mata pelajaran Bahasa Indonesia dengan 20 soal pilgan dan 10 soal essay. </p>
                        <div class="article-cta">
                            <a href="#" class="btn btn-primary">Lihat Nilai</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('image_mp/bing.jpg') }}">
                        </div>
                        <div class="article-title">
                            <h2><a href="#">Bahasa Inggris</a></h2>
                        </div>
                    </div>
                    <div class="article-details">
                        <p>Ujian tertulis mata pelajaran Bahasa Indonesia dengan 25 soal pilgan dan 5 soal essay. </p>
                        <div class="article-cta">
                            <a href="#" class="btn btn-primary">Lihat Nilai</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
@endsection