@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Halaman Tagihan</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-2">
                <thead>
                    <th>No.</th>
                    <th>Nama Tagihan</th>
                    <th>Jumlah Tagihan</th>
                    <th>Batas Pembayaran</th>

                </thead>

                @if ($tagihan->count() > 0)
                <?php $no = 0; ?>
                @foreach($tagihan as $t)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $t->nama_tagihan }}
                    </td>
                    <td>
                        Rp. {{ $t->jumlah_tagihan }}
                    </td>
                    <td>
                        <?php
                        $batas = $t->batas;
                        $hari = substr($batas, 8, 2);
                        $bulan = substr($batas, 5, 2);
                        $tahun = substr($batas, 0, 4);
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

                        $batas = $hari . " " . $bulan . " " . $tahun;
                        echo $batas;
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