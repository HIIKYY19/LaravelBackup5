@extends('admin.layout.appadmin')
@section('content')
@foreach ($member as $row)

<section class="py-5">
    <input type="hidden" value="{{$row->id}}">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    @empty($row->foto)
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img/1.jpg')}}" alt="..." /></div>
                    @else
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img/')}}/{{$row->foto}}" alt="..." /></div>
                    @endempty
                    <div class="col-md-6">
                        {{-- <div class="small mb-1">  {{$row->kode}}</div> --}}
                        <h1 class="display-5 fw-bolder">{{$row->name}}</h1>
                        <div class="fs-5 mb-5">
                            <!-- <span class="text-decoration-line-through">$45.00</span> -->
                            <span>Email : {{$row->email}}</span><br>
                            <span>Role : {{$row->role}}</span><br>
                            <span>Password : {{$row->password}}</span><br>
                            <!-- <span>Deskripsi : {{$row->deskripsi}}</span><br> -->
                        </div>
                        <!-- <p class="lead">{{$row->deskripsi}}</p> -->
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endforeach
@endsection