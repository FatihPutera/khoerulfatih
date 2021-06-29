@extends('layouts.layout')
@section('content')
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

<center>
    <form action="{{route('siswa.store')}}" method="post" class="form-group">
    @csrf
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NIS</label>
            <input type="number" class="form-control" name="nis" min="1">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">NAMA</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">TGL LAHIR</label>
            <input type="date" name="tgl_lahir" class="form-control">
        </div>
        <div class="form-group col-8">
            <label for="exampleFormControlInput1">KELAMIN</label>
            <select name="kelamin" class="form-control">
                <option value="L"> LAKI- LAKI </option>
                <option value="P"> PEREMPUAN </option>
            </select>
        </div>
        <div>
            <input type="submit" value="Tambah" class="form-control btn btn-success col-8">
        </div>
    </form>
</center>

@endsection