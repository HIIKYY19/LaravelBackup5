@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="{{ url('admin/transaksi/store') }}" enctype="multipart/form-data">

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

    <h2 class="text-center">Transaksi</h2>

    <div class="form-group row">
        <label for="total_tiket" class="col-4 col-form-label">Total Tiket</label>
        <div class="col-8">
            <input id="total_tiket" name="total_tiket" placeholder="Masukkan Total Tiket" type="text" class="form-control @error('total_tiket') is-invalid @enderror">
            @error('total_tiket')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="totalharga" class="col-4 col-form-label">Total Harga</label>
        <div class="col-8">
            <input id="totalharga" name="totalharga" placeholder="Masukkan Total Harga" type="text" class="form-control @error('totalharga') is-invalid @enderror">
            @error('totalharga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="penumpang_id" class="col-4 col-form-label">Penumpang ID</label>
        <div class="col-8">
            <input id="penumpang_id" name="penumpang_id" placeholder="Masukkan Penumpang ID" type="text" class="form-control @error('penumpang_id') is-invalid @enderror">
            @error('penumpang_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="tiket_id" class="col-4 col-form-label">Tiket ID</label>
        <div class="col-8">
            <input id="tiket_id" name="tiket_id" placeholder="Masukkan Tiket ID" type="text" class="form-control @error('tiket_id') is-invalid @enderror">
            @error('tiket_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
    </div>

    <div class="form-group row">
        <label for="tanggal" class="col-4 col-form-label">Tanggal</label>
        <div class="col-8">
            <input id="tanggal" name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror">
            @error('tanggal')
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
