@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<a href="#" class="btn btn-primary mb-2 btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Group</a>
<div class="row">
    
  
@foreach ($groups as $group)
<div class="col-lg-3">
  
<div class="card" style="width: 17rem;">
  <div class="card-body">
    <h3>

      <a href="/groups/{{ $group['id']}}"class="card-title">{{ $group['name'] }}</a>
    </h3>
    <p class="card-text">{{ $group['description'] }}</p>
    <div class="text-right mb-2">
      
      <a href="{{url('groups/createmember/'. $group['id'])}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Member</a>
      
    </div>
    <p>Anggota :</p>
  {{-- <table class="table table-borderless"> --}}
@foreach ($group->member_groups as $friend)
  @if ($friend->status == 1)
  <a href="{{url('/friends/'. $friend->friends->id)}}" data-toggle="tooltip" data-placement="top" title="{{ $friend->friends->nama }}">

    <img src="https://robohash.org/{{ $friend->friends->nama }}?gravatar=hashed"  alt="" width="30%">
  </a>
  
          
    {{-- <tr>
      <td> {{$friend->friends->nama}} </td>
      <td class="text-right"> 

        <a href="{{url('groups/deletemember/'. $friend->id)}}" class="btn btn-secondary btn-sm text-white">Leave</
      </div>
        </td>
      
    </tr> --}}
    @endif
  @endforeach
{{-- </table> --}}
@php
    $jumlah = $group->member_groups->where('status', 1)->count();
    $jumlah_keluar = $group->member_groups->where('status', 2)->count();
@endphp <br>
<p>Anggota Aktif : {{$jumlah}} anggota
  <br>
  Anggota Keluar : {{$jumlah_keluar}} anggota</p>

<div class="text-right">

  <form action="/groups/{{$group['id']}}" method="POST">
    @csrf
    @method('DELETE')
      <a href="/groups/{{$group['id']}}/edit" class="btn btn-sm btn-warning text-white"><i class="fas fa-pen"></i></a>
    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
    </form>
  </div>
  </div>
</div>
</div>
@endforeach
</div>

<div class="mt-3">
  {{ $groups->links('paginationcustom') }}

</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action ="/groups" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('nama') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description </label>
            <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{ old('alamat') }}">
            @error('description')
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



