@extends('layouts.layout')
@section('content')

    <center>
        <h3> TABLE CATATAN SISWA </h3>
        <br>
        <a href="{{route('siswa.index')}}" class="btn btn-success"> Kembali </a> 
        <br><br>
        <table class="table table-info col-8 text-center">
            <thead>
                <tr>
                    <th> NIS </th>
                    <th> NAMA </th>
                    <th> JUMLAH BUKU </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $siswa)
                <tr>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>{{$siswa->total}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </center>

@endsection