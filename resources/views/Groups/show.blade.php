@extends('layouts.app')

@section('title', 'Coba')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{asset('1.gif')}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h3>Detail Group</h3>
                        <table>
                            <tr>
                                <td>Nama Group</td>
                                <td>:</td>
                                <td>{{$group->name}}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi Group</td>
                                <td>:</td>
                                <td>{{$group->description}}</td>
                            </tr>
                            <tr>
                                <td>Member Group</td>
                                <td>:</td>
                                <td>
                                    
                                </td>
                            </tr>
                        </table>
                        <table class="table table-borderless">
                            @foreach ($group->member_groups as $friend)
                            @if ($friend->status == 1)
                                   
                              <tr>
                                <td> {{$friend->friends->nama}} </td>
                                <td class="text-right"> 
                            
                                  <a href="{{url('groups/deletemember/'. $friend->id)}}" class="btn btn-secondary btn-sm text-white">Leave</
                                </div>
                                  </td>
                                
                              </tr>
                              @endif
                            @endforeach
                            </table>
                            
@php
$jumlah = $group->member_groups->where('status', 1)->count();
$jumlah_keluar = $group->member_groups->where('status', 2)->count();
@endphp <br>
<table>
    <tr>
        <td>Anggota Aktif</td>
        <td>:</td>
        <td>{{$jumlah}} Anggota</td>
    </tr>
    <tr>
        <td>Anggota Keluar</td>
        <td>:</td>
        <td>{{$jumlah_keluar}} Anggota</td>
    </tr>
</table>

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
        </div>
    </div>
@endsection



