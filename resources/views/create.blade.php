@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<form action = "/friends" method="POST">
  @csrf
  @method('POST')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
@endsection



