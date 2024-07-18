
@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{url('admin/rute/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" type="text"  class="form-control @error('kode') is-invalid @enderror">
      @error('kode')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Kota Asal</label> 
    <div class="col-8">
      <input id="text3" name="kota_asal" type="text" class="form-control @error('kota_asal') is-invalid @enderror">
      @error('kota_asal')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Kota Tujuan</label> 
    <div class="col-8">
      <input id="text2" name="kota_tujuan" type="text" class="form-control @error('kota_tujuan') is-invalid @enderror">
      @error('kota_tujuan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Jarak</label> 
    <div class="col-8">
      <input id="text6" name="jarak" type="text" class="form-control @error('jarak') is-invalid @enderror">
      @error('jarak')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

@endsection