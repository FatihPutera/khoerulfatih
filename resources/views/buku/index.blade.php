@extends('layouts.layout')
@section('content')

    <center>
        <h3> TABLE BUKU </h3>
        <br>
        <a href="{{route('buku.create')}}" class="btn btn-success"> Tambah Data </a> &emsp; <a href="/tampilBuku" class="btn btn-success"> Data Buku </a>
        <br><br>
        <table class="table table-info col-8 text-center">
            <thead>
                <tr>
                    <th> ID </th>
                    <th> JUDUL </th>
                    <th> ISBN </th>
                    <th> PENGARANG </th>
                    <th> ACTION </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $buku)
                <tr>
                    <td>{{$buku->id}}</td>
                    <td>{{$buku->judul}}</td>
                    <td>{{$buku->isbn}}</td>
                    <td>{{$buku->pengarang}}</td>
                    <td>
                        <form action="{{route('buku.edit',$buku->id)}}" class="form-group">
                        @csrf
                            <input type="submit" value="EDIT" class="form-control btn btn-warning">
                        </form>
                        <form action="{{route('buku.destroy',$buku->id)}}" method="post" class="form-group">
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