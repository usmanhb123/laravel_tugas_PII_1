@extends('layouts.app')

@section('title', 'Coba')

@section('content')
<div class="card">
    <div class= "card-body">
        <div class="row">
            <div class="col-lg-4">
                <img src="https://robohash.org/{{ $friend['nama'] }}?gravatar=hashed" alt="" width="100%">
            </div>
            <div class="col-lg-8">
                <table>
                    <tr>
                        <td><h3>Nama</h3></td>
                        <td><h3>:</h3></td>
                        <td><h3>{{ $friend['nama'] }}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>No Telp</h3></td>
                        <td><h3> :</h3></td>
                        <td><h3>{{$friend['no_telp']}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Address</h3></td>
                        <td><h3>:</h3></td>
                        <td><h3>{{$friend['alamat']}}</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Groups</h3></td>
                        <td><h3>:</h3></td>
                        <td> 
                            @php
                            $no = 0;
                        @endphp
                        @foreach ($friend->member_groups as $item)
                        @if ($item->status == 1)
                        @php
                            $no = $no+1;
                        @endphp
                        @if($no != 1)
                        </td>
                    </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                @endif
                                  
                            <h3>{{$item->groups->name}}</h3>
                            @endif
                            @endforeach
                      
                        </td>
                        
                    </tr>
                    <tr>
                        <td><h3>History Groups</h3></td>
                        <td><h3>:</h3></td>
                        <td>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($friend->member_groups as $item)
                            @if ($item->status == 2)
                            @php
                                $no = $no+1;
                            @endphp
                            @if($no != 1)
                        </td>
                    </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                @endif
                                  
                            <h3>{{$item->groups->name}}</h3>
                            @endif
                            @endforeach
                      
                        </td>
                        
                    </tr>
                </table>
                <div class="text-center">

           
                    <form action="/friends/{{$friend['id']}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="/friends/{{$friend['id']}}/edit" class="btn btn-warning btn-lg text-white"><i class="fas fa-pen"></i></a>
                      <button class="btn btn-danger btn-lg"><i class="fas fa-trash"></i></a>
                      </form>
        
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection



