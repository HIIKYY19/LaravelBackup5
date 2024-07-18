@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="GET" action="{{ url('admin/pembayaran/detail') }}" enctype="multipart/form-data">

@csrf

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br><br>
<div class="form-group row">
        <label for="transaksi_id" class="col-4 col-form-label">Masukan Transaksi id</label>
        <div class="col-8">
            <input id="transaksi_id" name="transaksi_id" placeholder="Masukkan transaksi_id" type="text" class="form-control @error('transaksi_id') is-invalid @enderror">
            @error('transaksi_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


@endsection