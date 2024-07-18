@extends('admin.layout.appadmin')
@section('content')

@foreach ($tiket as $p)
<section class="py-5">
    <input type="hidden" value="{{$p->id_tiket}}">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    @empty($p->foto)
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img/nophoto.jpg')}}" alt="..." /></div>
                    @else
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img')}}/{{$p->foto}}" alt="..." /></div>
                    @endempty
                    <div class="col-md-6">
                        <h1>Detail Tiket</h1>
                        <p class="lead">Kode Tiket : {{$p->id_tiket}}</p>
                        <p class="lead">Harga = Rp. {{$p->harga}}</p>
                        <p class="lead">Armada =  {{$p->armada_id}}</p>
                        <p class="lead">Rute =  {{$p->rute_id}}</p>
                        <p class="lead">Jadwal = {{$p->jadwal_id}}</p>
                    </div>
                </div>
            </div>
        </section>
@endforeach

@endsection