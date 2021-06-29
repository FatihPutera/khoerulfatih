@extends('layouts.layout')
@section('content')

    <center>
        <h3> TABLE SISWA </h3>
        <br>
        <a href="{{route('siswa.create')}}" class="btn btn-success"> Tambah Data </a> &emsp; <a href="/tampilSiswa" class="btn btn-success"> Data Siswa </a>
        <br><br>
        <table class="table table-info col-8 text-center">
            <thead>
                <tr>
                    <th> NIS </th>
                    <th> NAMA </th>
                    <th> TGL LAHIR </th>
                    <th> KELAMIN </th>
                    <th> ACTION </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $siswa)
                <tr>
                    <td>{{$siswa->nis}}</td>
                    <td>{{$siswa->nama}}</td>
                    <td>{{date('d-M-Y', strtotime($siswa->tgl_lahir))}}</td>
                    @if($siswa->kelamin == 'L')
                        <td>LAKI-LAKI</td>
                    @else
                        <td>PEREMPUAN</td>
                    @endif
                    <td>
                        <form action="{{route('siswa.edit',$siswa->nis)}}" class="form-group">
                        @csrf
                            <input type="submit" value="EDIT" class="form-control btn btn-warning">
                        </form>
                        <form action="{{route('siswa.destroy',$siswa->nis)}}" method="post" class="form-group">
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