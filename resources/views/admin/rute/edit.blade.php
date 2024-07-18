
@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@foreach ($rute as $r)

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{url('admin/rute/update/'.$r->idrute)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" type="text" class="form-control" value="{{ $r->kode }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Kota Asal</label> 
    <div class="col-8">
      <input id="text3" name="kota_asal" type="text" class="form-control" value="{{ $r->kota_asal }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Kota Tujuan</label> 
    <div class="col-8">
      <input id="text2" name="kota_tujuan" type="text" class="form-control" value="{{ $r->kota_tujuan }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Jarak</label> 
    <div class="col-8">
      <input id="text6" name="jarak" type="number" class="form-control" value="{{ $r->jarak }}">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

@endforeach
@endsection