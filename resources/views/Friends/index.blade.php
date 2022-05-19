@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<div class="container">
  
  <a href="#" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Teman</a>
<div class="row">
  <div class="col-lg-12">

    <div class="row">
      
  @foreach ($friends as $friend)
  <div class="col-lg-3">
    <div class="card mt-1" style="width: 17rem;">
      <div class="card-body">
        <h3>
          <img src="https://robohash.org/{{ $friend['nama'] }}?gravatar=hashed" alt="" width="100%">
          <br>
          <a href="/friends/{{ $friend['id']}}"class="card-title">{{ $friend['nama'] }}</a>
        </h3>
        <h6 class="card-subtitle mb-2 text-muted">No Telp : {{ $friend['no_telp'] }}</h6>
        <p class="card-text">Address : {{ $friend['alamat'] }}</p>
        <div class="row">
          <div class="col-lg-12">
            <div class="text-right">

           
            <form action="/friends/{{$friend['id']}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="/friends/{{$friend['id']}}/edit" class="btn btn-warning btn-sm text-white"><i class="fas fa-pen"></i></a>
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
              </form>

          </div>
          </div>
        </div>
  </div>
</div>

</div>
@endforeach
</div>
</div>
{{-- <div class="col-lg-4">
  <img src="{{asset('1.gif')}}" alt="" width="100%">
</div> --}}
</div>
<div class="mt-3">
  {{ $friends->links('paginationcustom') }}
  
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Friends</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form action ="/friends" method="POST">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">No Telp </label>
    <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1" value="{{ old('no_telp') }}">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Alamat </label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection



