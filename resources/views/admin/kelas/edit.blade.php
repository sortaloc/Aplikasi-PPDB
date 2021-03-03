@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Sunting Data Kelas</h4>
    </div>
    <div class="card-body">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach

        <form action="{{ route('adminkelas.update', $kelas->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kelas</label>
                <div class="col-sm-12 col-md-3">
                    <select name="angka" class="form-control selectric" required>
                        <?php

                        $array_angka = array(7, 8, 9);

                        foreach ($array_angka as $key => $val) {
                            $selected = $angka == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="col-sm-12 col-md-3">
                    <select name="huruf" class="form-control selectric" required>
                        <?php

                        $array_huruf = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

                        foreach ($array_huruf as $key => $val) {
                            $selected = $huruf == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Wali Kelas</label>
                <div class="col-sm-12 col-md-6">
                    <select name="id_guru" class="form-control select2" required>
                        <?php

                        foreach ($array as $key => $val) {
                            $selected = $kelas['id_guru'] == $key ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $key . ' " ' . $selected . ' > ' . $val . ' </option>';
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