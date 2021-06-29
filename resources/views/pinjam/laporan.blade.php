@extends('layouts.layout')
@section('content')

    <center>
        <h3> TABLE LAPORAN PEMINJAMAN </h3>
        <br>
        <a href="{{route('pinjam.index')}}" class="btn btn-success"> Kembali </a>
        <br><br>
        <table class="table table-info col-8 text-center">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> BATAS </th>
                    <th> KEMBALI </th>
                    <th> SISWA </th>
                    <th> BUKU </th>
                    <th> DENDA </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $pinjam)
                <tr>
                @if($pinjam->status == 0)
                    <td>{{$pinjam->id}}</td>
                    <td>{{date('d-M-Y', strtotime($pinjam->tgl_batas))}}</td>
                    @if($pinjam->tgl_kembali != NULL)
                        <td>{{date('d-M-Y', strtotime($pinjam->tgl_kembali))}}</td>
                    @else
                        <td> - </td>
                    @endif
                    <td>{{$pinjam->nama}}</td>
                    <td>{{$pinjam->judul}}</td>
                    <td> Belum Mengembalikan </td>
                @else
                    <?php
                        $diff = date_diff(date_create($pinjam->tgl_batas) , date_create($pinjam->tgl_kembali));
                        $hari = $diff->days;
                        if($pinjam->tgl_batas < $pinjam->tgl_kembali){
                            $hari *= 5000;
                            $denda = $hari;  
                        }else if($pinjam->tgl_kembali < $pinjam->tgl_pinjam){
                            $denda = 'INVALID';
                        }else{
                            $denda = 'TIDAK KENA DENDA';
                        }
                    ?>
                    @if($denda != NULL && $pinjam->status == 1)
                        <td>{{$pinjam->id}}</td>
                        <td>{{date('d-M-Y', strtotime($pinjam->tgl_batas))}}</td>
                        <td>{{date('d-M-Y', strtotime($pinjam->tgl_kembali))}}</td>
                        <td>{{$pinjam->nama}}</td>
                        <td>{{$pinjam->judul}}</td>
                        <td>{{$denda}}</td>
                    @endif
                @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </center>

@endsection