@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<form method="POST" action="{{url('admin/member/store')}}" enctype="multipart/form-data">
    <h2 align="center">INPUT MEMBER</h2>
    @csrf

  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Id</label> 
    <div class="col-8">
      <input id="text1" name="id"  type="number" class="form-control" >
    </div>
  </div>

  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="text2" name="nama" placeholder="Masukan nama" type="text" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text3" name="email" placeholder="Masukan Email" type="email" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text4" name="password" placeholder="Masukan Password" type="password" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="role" class="col-4 col-form-label">Role</label>
    <div class="col-8">
        <select id="role" name="role" class="form-control">
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
        </select>
    </div>
</div>


  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text6" name="foto" type="file" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
        <div class="offset-4 col-8">
                <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection