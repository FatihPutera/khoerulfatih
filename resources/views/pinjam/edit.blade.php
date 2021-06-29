@extends('layouts.layout')
@section('content')
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form action="{{route('pinjam.update',$data->id)}}" method="post" class="form-group">
    @csrf
    @method('PUT')
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL PINJAM</label>
            <input type="date" class="form-control" name="tgl_pinjam" value="{{$data->tgl_pinjam}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL BATAS</label>
            <input type="date" name="tgl_batas" class="form-control" value="{{$data->tgl_batas}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL KEMBALI</label>
            <input type="date" class="form-control" name="tgl_kembali" value="{{$data->tgl_kembali}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">STATUS</label>
            <select name="status" class="form-control">
                <option value="0" @if($data->status == 0 ) selected="" @endif>TERPINJAM</option>
                <option value="1" @if($data->status == 1 ) selected="" @endif>KEMBALI</option>
            </select>
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NIS</label>
            <select name="nis" class="form-control">
            @foreach($dataSiswa as $siswa)
                <option value="{{$siswa->nis}}" @if($data->nis == $siswa->nis ) selected="" @endif>{{$siswa->nis}} - {{$siswa->nama}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID BUKU</label>
            <select name="id_buku" class="form-control">
            @foreach($dataBuku as $buku)
                <option value="{{$buku->id}}" @if($data->id_buku == $buku->id ) selected="" @endif>{{$buku->id}} - {{$buku->judul}}</option>
            @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Edit" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection