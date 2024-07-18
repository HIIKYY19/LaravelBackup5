@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<h1 class="text-center">Pengisian Data tiket</h1><br>

@foreach ($tiket as $row)
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('admin/tiket/update/'.$row->id_tiket) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="harga" class="col-4 col-form-label">Harga Tiket</label> 
            <div class="col-8">
                <input id="harga" name="harga" type="text" class="form-control" value="{{ $row->harga }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="jadwal_id" class="col-4 col-form-label">Jadwal</label> 
            <div class="col-8">
                <select id="jadwal_id" name="jadwal_id" class="custom-select">
                    @foreach ($jadwal as $j)
                        <option value="{{ $j->idrute }}" {{ $j->idjadwal == $row->jadwal_id ? 'selected' : '' }}>
                            {{ $j->jam_berangkat }} -> {{ $j->jam_sampai }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="rute_id" class="col-4 col-form-label">Rute</label> 
            <div class="col-8">
                <select id="rute_id" name="rute_id" class="custom-select">
                    @foreach ($rute as $r)
                        <option value="{{ $r->idrute }}" {{ $r->idrute == $row->rute_id ? 'selected' : '' }}>
                            {{ $r->kota_asal }} -> {{ $r->kota_tujuan }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="armada_id" class="col-4 col-form-label">Armada</label> 
            <div class="col-8">
                <select id="armada_id" name="armada_id" class="custom-select">
                    @foreach ($armada as $p)
                        <option value="{{ $p->idarmada }}" {{ $p->idarmada == $row->armada_id ? 'selected' : '' }}>
                            {{ $p->nama_armada }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
      @if(!empty($row->foto))
    <img src="{{url('admin/img')}}/{{$row->foto}}" width="250px" alt="">
  
    @endif
    </div>
    </div>

    <div class="form-group row">
    <label for="detail" class="col-4 col-form-label">Detail</label>
    <div class="col-8">
        <textarea id="detail" name="detail" class="form-control @error('detail') is-invalid @enderror">{{ $row->detail }}</textarea>
        @error('detail')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
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
