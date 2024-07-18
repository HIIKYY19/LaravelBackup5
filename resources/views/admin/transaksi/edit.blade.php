@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@foreach ($transaksi as $row)
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form method="POST" action="{{url('admin/transaksi/update/'.$row->id_transaksi)}}" enctype="multipart/form-data">
    <h2 align="center">Transaksi</h2>
    @csrf

  <div class="form-group row">
    <label for="total_tiket" class="col-4 col-form-label">total tiket</label> 
    <div class="col-8">
      <input id="total_tiket" name="total_tiket" placeholder="Masukan total_tiket Produk" type="text" class="form-control" value="{{$row->total_tiket}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="totalharga" class="col-4 col-form-label">total harga</label> 
    <div class="col-8">
      <input id="totalharga" name="totalharga" placeholder="Masukan totalharga Produk" type="text" class="form-control" value="{{$row->totalharga}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="penumpang_id" class="col-4 col-form-label">penumpang id</label> 
    <div class="col-8">
      <input id="penumpang_id" name="penumpang_id" placeholder="Masukan Penumpang id" type="text" class="form-control" value="{{$row->penumpang_id}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="tiket_id" class="col-4 col-form-label">Tiket id</label> 
    <div class="col-8">
      <input id="tiket_id" name="tiket_id" placeholder="Masukan Tiket id" type="text" class="form-control" value="{{$row->tiket_id}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="tanggal" class="col-4 col-form-label">tanggal</label> 
    <div class="col-8">
      <input id="tanggal" name="tanggal" type="date" class="form-control" value="{{$row->tanggal}}">
    </div>
  </div>
  
  <div class="form-group row">
        <div class="offset-4 col-8">
                <button name="submit" value="submit" type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </div>
</form>
@endforeach
@endsection