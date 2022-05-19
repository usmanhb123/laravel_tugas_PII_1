@extends('layouts.app')

@section('title', 'Groups')

    @section('content')
    <div class="row">
          <div class="col-lg-4">
            <img src="{{asset('1.gif')}}" alt="" width="100%">
          </div>
          <div class="col-lg-8">
            <h3>Edit Group</h3>
            <form action="/groups/{{ $group['id'] }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="name" class="form-label">Nama Group</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $group['name'] }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ? old('description') : $group['description'] }}">
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
             
              <button type="submit" class="btn btn-info">Submit</button>
            </form>

          </div>
        </div>
        
@endsection 