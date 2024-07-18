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

@foreach ($jadwal as $jwl)
<form method="POST" action="{{url('/admin/jadwal/update/'.$jwl->idjadwal)}}" enctype="multipart/form-data">
    @csrf
    <h1 align="center">Form Edit Jadwal Armada</h1><br>

    <!-- jam berangkat start -->
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Jam Berangkat</label> 
    <div class="col-8">
      <input id="text" name="jam_berangkat" type="time" class="form-control" value="{{$jwl->jam_berangkat}}">
    </div>
  </div>

  <!-- jam sampai start -->
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Jam Sampai</label> 
    <div class="col-8">
      <input id="text" name="jam_sampai" type="time" class="form-control" value="{{$jwl->jam_sampai}}">
    </div>
  </div>

  <!-- tombol ubah start   -->
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Ubah</button>
    </div>
  </div>
</form>
@endforeach
@endsection