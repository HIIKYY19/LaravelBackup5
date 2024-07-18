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

@foreach ($armada as $arm)
<form method="POST" action="{{url('/admin/armada/update/'.$arm->idarmada)}}" enctype="multipart/form-data">
    @csrf
    <h1 align="center">Form Tambah Armada</h1><br>
    <!-- jnis armada start -->
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Jenis Armada</label> 
      <div class="col-8">
        <input id="text" name="jenis_armada" type="text" class="form-control" value="{{$arm->jenis_armada}}">
      </div>
    </div>

    <!-- nama armada start -->
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Nama Armada</label> 
      <div class="col-8">
        <input id="text" name="nama_armada" type="text" class="form-control" value="{{$arm->nama_armada}}">
      </div>
    </div>

    <!-- kapasitas armada start -->
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Kapasitas Bagasi</label> 
      <div class="col-8">
        <input id="text" name="kapasitas" type="text" class="form-control" value="{{$arm->kapasitas}}">
      </div>
    </div>

    <!-- nama supir start -->
<div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Supir</label> 
    <div class="col-8">
        <select id="select" name="member_id" class="custom-select">
            @foreach ($member as $p)
                @if ($p->role == 'supir')
                    @php $sel = ($p->id == $arm->member_id) ? 'selected' : ''; @endphp
                    <option value="{{$p->id}}" {{$sel}}>{{$p->name}} - {{$p->role}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Ubah</button>
    </div>
  </div>
</form>
@endforeach
@endsection