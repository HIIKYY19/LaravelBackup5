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

<form method="POST" action="{{url('admin/armada/store')}}" enctype="multipart/form-data">
    @csrf
    <h1 align="center">Form Tambah Armada</h1><br>

  <!-- jenis armada start -->
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Jenis Armada</label> 
    <div class="col-8">
      <input id="text" name="jenis_armada" type="text" class="form-control @error('jenis_armada') is-invalid @enderror">
      @error('jenis_armada')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>

  <!-- nama armada start -->
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Armada</label> 
    <div class="col-8">
      <input id="text" name="nama_armada" type="text" class="form-control @error('nama_armada') is-invalid @enderror">
      @error('nama_armada')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>

  <!-- kapasitas start -->
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kapasitas Bagasi</label> 
    <div class="col-8">
      <input id="text" name="kapasitas" type="text" class="form-control @error('kapasitas') is-invalid @enderror">
      @error('kapasitas')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div>

  <!-- nama supir start -->
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Supir</label> 
    <div class="col-8">
        <select id="select" name="member_id" class="custom-select @error('member_id') is-invalid @enderror">
            @foreach ($member as $m)
                @if ($m->role == 'supir')
                    <option value="{{$m->id}}">{{$m->name}} - {{$m->role}}</option>
                @endif
            @endforeach
        </select>
        @error('member_id')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>

  <!-- <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Supir</label> 
    <div class="col-8">
      <input id="text" name="supir" type="text" class="form-control @error('supir') is-invalid @enderror">
      @error('supir')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
  </div> -->

  <!-- tombol submit start -->
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection