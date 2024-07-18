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

@foreach($member as $row)
<form method="POST" action="{{url('admin/member/update/'.$row->id)}}" enctype="multipart/form-data">
  <h2 align="center">Update Member</h2>
  @csrf

  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text"></div>
        </div> 
        <input id="text1" name="name"  type="text" class="form-control"value="{{$row->name}}">
      </div>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"></div>
            </div> 
            <input id="text2" name="email" type="email" class="form-control" value="{{$row->email}}">
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="text2" class="col-4 col-form-label">password</label> 
    <div class="col-8">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"></div>
            </div> 
            <input id="text2" name="password" type="email" class="form-control" value="{{$row->password}}">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Role</label> 
    <div class="col-8">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"></div>
            </div> 
            <select id="text4" name="role" class="form-control">
                <option value="admin" @if($row->role == 'admin') selected @endif>Admin</option>
                <option value="manager" @if($row->role == 'manager') selected @endif>Manager</option>
                <option value="staff" @if($row->role == 'staff') selected @endif>Staff</option>
                <option value="supir" @if($row->role == 'supir') selected @endif>Supir</option>
            </select>
        </div>
    </div>
</div>

  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text5" name="foto" type="file" class="form-control">
      @if(!empty($row->foto))
    <img src="{{url('admin/img')}}/{{$row->foto}}" alt="">
  
    @endif
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" value="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
@endforeach
@endsection