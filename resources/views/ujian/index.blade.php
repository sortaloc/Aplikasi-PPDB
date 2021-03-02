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
@if (Session::has('errorshow'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Anda sudah mengikuti ujian ini!'
    })
</script>
@endif
<div class="row">
    @foreach ($mapelujian as $mu)
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
        <article class="article">
            <div class="article-header">
                <div class="article-image" data-background="{{ asset('image_mp/'. $mu->foto) }}">
                </div>
                <div class="article-title">
                    <h2><a href="#">{{ $mu->nama_mapel }}</a></h2>
                </div>
            </div>
            <div class="article-details">
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
                    <a href="{{ route('ujian.show', $mu->id_mapel) }}" class="btn btn-primary">Mulai Ujian</a>
                </div>
            </div>
        </article>
    </div>
    @endforeach
</div>
@endsection