@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Sunting Data Soal</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminsoal.update', $soal->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Mapel</label>
                <div class="col-sm-12 col-md-7">
                    <select name="id_mapel" class="form-control select2" required>
                        <?php

                        foreach ($array_mapel_ujian as $key => $val) {
                            $selected = $soal['id_mapel'] == $key ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $key . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Soal</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="soal" class="form-control" id="">{{ $soal->soal }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan A</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="A" class="form-control" id="">{{ $soal->A }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan B</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="B" class="form-control" id="">{{ $soal->B }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan C</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="C" class="form-control" id="">{{ $soal->C }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan D</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="D" class="form-control" id="">{{ $soal->D }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan E</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="E" class="form-control" id="">{{ $soal->E }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Jawaban</label>
                <div class="col-sm-12 col-md-7">
                    <select name="jawaban" class="form-control selectric" required>
                        <?php

                        $array_jawaban = array('A', 'B', 'C', 'D', 'E');

                        foreach ($array_jawaban as $key => $val) {
                            $selected = $soal['jawaban'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection