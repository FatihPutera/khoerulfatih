@extends('layouts.layout')
@section('content')
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form action="{{route('buku.store')}}" method="post" class="form-group">
    @csrf
    @if($newId == NULL || $newId = NULL)
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID</label>
            <input type="text" class="form-control" name="id" disabled="" value="B0001" placeholder="B0001">
        </div>
    @else
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ID</label>
            <input type="text" class="form-control" name="id" disabled="" value="{{$newId}}" placeholder="{{$newId}}">
        </div>
    @endif
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">JUDUL</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ISBN</label>
            <input type="number" name="isbn" class="form-control">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">PENGARANG</label>
            <input type="text" class="form-control" name="pengarang">
        </div>
        <div>
            <input type="submit" value="Tambah" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection