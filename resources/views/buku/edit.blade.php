@extends('layouts.layout')
@section('content')
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form action="{{route('buku.update',$data->id)}}" method="post" class="form-group">
    @csrf
    @method('PUT')
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">JUDUL</label>
            <input type="text" class="form-control" name="judul" value="{{$data->judul}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">ISBN</label>
            <input type="number" name="isbn" class="form-control" value="{{$data->isbn}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">PENGARANG</label>
            <input type="text" class="form-control" name="pengarang" value="{{$data->pengarang}}">
        </div>
        <div>
            <input type="submit" value="Edit" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection