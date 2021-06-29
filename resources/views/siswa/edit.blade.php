@extends('layouts.layout')
@section('content')
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form method="post" action="{{route('siswa.update',$data->nis)}}" class="form-group">
    @csrf
    @method('PUT')
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NIS</label>
            <input type="number" class="form-control" name="nis" value="{{$data->nis}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NAMA</label>
            <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL LAHIR</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{$data->tgl_lahir}}">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">KELAMIN</label>
            <select name="kelamin" class="form-control">
                <option value="L" @if($data->nis == 'L') selected="" @endif> LAKI- LAKI </option>
                <option value="P" @if($data->nis == 'P') selected="" @endif> PEREMPUAN </option>
            </select>
        </div>
        <div>
            <input type="submit" value="Edit" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection