@extends('layouts.layout')
@section('content')
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form action="{{route('pinjam.store')}}" method="post" class="form-group">
    @csrf
    @if($newId == NULL || $newId = NULL)
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID</label>
            <input type="text" class="form-control" name="id" disabled="" value="P0001" placeholder="P0001">
        </div>
    @else
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID</label>
            <input type="text" class="form-control" name="id" disabled="" value="{{$newId}}" placeholder="{{$newId}}">
        </div>
    @endif
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL PINJAM</label>
            <input type="date" class="form-control" name="tgl_pinjam">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL BATAS</label>
            <input type="date" name="tgl_batas" class="form-control">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL KEMBALI</label>
            <input type="date" class="form-control" name="tgl_kembali">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">STATUS</label>
            <select name="status" class="form-control">
                <option value="0">TERPINJAM</option>
                <option value="1">KEMBALI</option>
            </select>
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NIS</label>
            <select name="nis" class="form-control">
            @foreach($dataSiswa as $siswa)
                <option value="{{$siswa->nis}}">{{$siswa->nis}} - {{$siswa->nama}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID BUKU</label>
            <select name="id_buku" class="form-control">
            @foreach($dataBuku as $buku)
                @foreach($data as $pinjam)
                    @if($pinjam->id_buku == $buku->id && $pinjam->status == 1)
                        <option value="{{$buku->id}}">{{$buku->id}} - {{$buku->judul}}</option>
                    @endif
                @endforeach
            @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Tambah" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection