@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@if($errors->any())
<div class="alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

@foreach($penumpang as $row)
<form method="POST" action="{{url('admin/penumpang/update/'.$row->id)}}" enctype="multipart/form-data">
  @csrf
  <h2 align="center">Update Penumpang</h2>
  
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="text" name="nama" placeholder="Masukan nama anda" type="text" class="form-control"value="{{$row->nama}}">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="select1" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <select id="select1" name="gender" class="custom-select">
        <option value="laki-laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
      </select>

  </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">No Telepon</label> 
    <div class="col-8">
      <input id="text1" name="no_telepon" placeholder="Masukan no.telepon anda" type="text" class="form-control"value="{{$row->no_telepon}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Berat bawaan</label> 
    <div class="col-8">
      <input id="text2" name="berat_bawaan" placeholder="Berat bawaan anda" type="text" class="form-control"value="{{$row->berat_bawaan}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="password" name="password" placeholder="Masukan Password anda" type="text" class="form-control"value="{{$row->password}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
      @if(!empty($row->foto))
    <img src="{{url('admin/img')}}/{{$row->foto}}" alt="">
  
    @endif
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endforeach
@endsection