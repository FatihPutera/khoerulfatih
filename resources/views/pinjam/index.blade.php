@extends('layouts.layout')
@section('content')

    <center>
        <h3> TABLE PEMINJAMAN </h3>
        <br>
        <a href="{{route('pinjam.create')}}" class="btn btn-success"> Tambah Data </a> &emsp; <a href="/tampilPinjaman" class="btn btn-success"> Laporan Pinjaman </a>
        <br><br>
        <table class="table table-info col-10 text-center">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> PINJAM </th>
                    <th> BATAS </th>
                    <th> KEMBALI </th>
                    <th> STATUS </th>
                    <th> SISWA </th>
                    <th> BUKU </th>
                    <th> ACTION </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $pinjam)
                <tr>
                    <td>{{$pinjam->id}}</td>
                    <td>{{date('d-M-Y', strtotime($pinjam->tgl_pinjam))}}</td>
                    <td>{{date('d-M-Y', strtotime($pinjam->tgl_batas))}}</td>
                    @if($pinjam->tgl_kembali != 0)
                        <td>{{date('d-M-Y', strtotime($pinjam->tgl_kembali))}}</td>
                    @else
                        <td></td>
                    @endif
                    @if($pinjam->status == 0)
                        <td>TERPINJAM</td>
                    @else
                        <td>KEMBALI</td>
                    @endif
                    <td>{{$pinjam->nama}}</td>
                    <td>{{$pinjam->judul}}</td>
                    <td>
                        <form action="{{route('pinjam.edit',$pinjam->id)}}" class="form-group">
                        @csrf
                            <input type="submit" value="EDIT" class="form-control btn btn-warning">
                        </form>
                        <form action="{{route('pinjam.destroy',$pinjam->id)}}" method="post" class="form-group">
                        @csrf
                        @method('DELETE')
                            <input type="submit" value="DELETE" class="form-control btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </center>

@endsection