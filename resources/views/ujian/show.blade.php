@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Soal Ujian</h4>
    </div>
    <form action="{{ route('ujian.store') }}" method="post">
        <div class="card-body">
            @csrf
            <input type="hidden" name="id_mapel" value="{{ $id_mapel }}">
            @if ($soal->count() > 0)
            <p>Pilihlah jawaban dengan cara mengklik jawaban yang dianggap benar!</p>
            <?php $no = 0; ?>
            @foreach($soal as $s)
            <?php $no++; ?>

            <ol>
                <span>{{ $no }}. {{ $s->soal }}</span>
            
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="A{{ $s->id }}" id="exampleRadios{{ $no }}">
                        <label class="form-check-label" for="exampleRadios{{ $no }}">
                            {{ $s->A }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="B{{ $s->id }}" id="exampleRadios{{ $no }}">
                        <label class="form-check-label" for="exampleRadios{{ $no }}">
                            {{ $s->B }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="C{{ $s->id }}" id="exampleRadios{{ $no }}">
                        <label class="form-check-label" for="exampleRadios{{ $no }}">
                            {{ $s->C }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="D{{ $s->id }}" id="exampleRadios{{ $no }}">
                        <label class="form-check-label" for="exampleRadios{{ $no }}">
                            {{ $s->D }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban{{ $no }}" value="E{{ $s->id }}" id="exampleRadios{{ $no }}">
                        <label class="form-check-label" for="exampleRadios{{ $no }}">
                            {{ $s->E }}
                        </label>
                    </div>
                </div>
            </div>
            </ol>
            @endforeach
            @endif
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-paper-plane"></i> Kirim Jawaban</button>
        </div>
    </form>
</div>
@endsection