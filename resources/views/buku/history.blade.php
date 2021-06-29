@extends('layouts.layout')
@section('content')

    <center>
        <h3> BUKU YANG TERSEDIA </h3>
        <br>
        <a href="{{route('buku.index')}}" class="btn btn-success"> KEMBALI </a> 
        <br><br>
        <table class="table table-info col-8 text-center">
            <thead>
                <tr>
                    <th> JUDUL </th>
                    <th> STATUS </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $buku)
                <tr>
                    <td>{{$buku->judul}}</td>
                    @if($buku->status == 1)
                        <td>Tersedia</td>
                    @else
                        <td>Tidak Tersedia</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </center>

@endsection