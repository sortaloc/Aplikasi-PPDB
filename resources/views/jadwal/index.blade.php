@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Halaman Jadwal</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Jadwal</th>
                    <th>Tanggal Buka</th>
                    <th>Tanggal Tutup</th>
                </thead>

                @if ($waktu->count() > 0)
                <?php $no = 0; ?>
                @foreach($waktu as $w)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        @if ($w->jenis == 'pendaftaran')
                            Pendaftaran
                        @else
                            Ujian
                        @endif
                    </td>
                   
                    <td>
                        <?php
                        $buka = $w->buka;
                        $hari = substr($buka, 8, 2);
                        $bulan = substr($buka, 5, 2);
                        $tahun = substr($buka, 0, 4);
                        if ($bulan == '01') {
                            $bulan = 'Januari';
                        } elseif ($bulan == '02') {
                            $bulan = 'Februari';
                        } elseif ($bulan == '03') {
                            $bulan = 'Maret';
                        } elseif ($bulan == '04') {
                            $bulan = 'April';
                        } elseif ($bulan == '05') {
                            $bulan = 'Mei';
                        } elseif ($bulan == '06') {
                            $bulan = 'Juni';
                        } elseif ($bulan == '07') {
                            $bulan = 'Juli';
                        } elseif ($bulan == '08') {
                            $bulan = 'Agustus';
                        } elseif ($bulan == '09') {
                            $bulan = 'September';
                        } elseif ($bulan == '10') {
                            $bulan = 'Oktober';
                        } elseif ($bulan == '11') {
                            $bulan = 'November';
                        } elseif ($bulan == '12') {
                            $bulan = 'Desember';
                        }

                        $buka = $hari . " " . $bulan . " " . $tahun;
                        echo $buka;
                        ?>
                    </td>
                    <td>
                        <?php
                        $tutup = $w->tutup;
                        $hari = substr($tutup, 8, 2);
                        $bulan = substr($tutup, 5, 2);
                        $tahun = substr($tutup, 0, 4);
                        if ($bulan == '01') {
                            $bulan = 'Januari';
                        } elseif ($bulan == '02') {
                            $bulan = 'Februari';
                        } elseif ($bulan == '03') {
                            $bulan = 'Maret';
                        } elseif ($bulan == '04') {
                            $bulan = 'April';
                        } elseif ($bulan == '05') {
                            $bulan = 'Mei';
                        } elseif ($bulan == '06') {
                            $bulan = 'Juni';
                        } elseif ($bulan == '07') {
                            $bulan = 'Juli';
                        } elseif ($bulan == '08') {
                            $bulan = 'Agustus';
                        } elseif ($bulan == '09') {
                            $bulan = 'September';
                        } elseif ($bulan == '10') {
                            $bulan = 'Oktober';
                        } elseif ($bulan == '11') {
                            $bulan = 'November';
                        } elseif ($bulan == '12') {
                            $bulan = 'Desember';
                        }

                        $tutup = $hari . " " . $bulan . " " . $tahun;
                        echo $tutup;
                        ?>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection