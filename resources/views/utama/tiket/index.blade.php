@extends('utama.layout.apputama')
@section('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Pesan Tiket bis</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{url('/tiket')}}">tiket</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-8 col-md-7 text-center">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                </div>
                
                <div class="pagination">
                    <a href="{{ $tiket->previousPageUrl() ?? '#' }}" class="prev-arrow">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>

                    @foreach ($tiket->getUrlRange(1, $tiket->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="{{ $page == $tiket->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                    @endforeach

                    <a href="{{ $tiket->nextPageUrl() ?? '#' }}" class="next-arrow">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <!-- End Filter Bar -->

            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <!-- single product -->
                    @foreach ($tiket as $row)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                            <img class="img-fluid" 
                                @if($row->foto)
                                    src="{{ url('admin/img') }}/{{ $row->foto }}" alt="Product Image"
                                @else
                                    src="{{ asset('utama/img/product/p1.jpg') }}" alt="Default Image"
                                @endif
                            >

                                <div class="product-details">
                                    <h5>{{ $row->kota_asal }} - {{ $row->kota_tujuan }}</h5>
                                    <h6>{{ $row->nama_armada }}</h6>
                                    <div class="price">
                                        <h6>Rp. {{ $row->harga }}</h6>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="{{ url('tiket/pesantiket/'.$row->id_tiket) }}" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Pesan</p>
                                        </a>
                                        <!-- <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a> -->
                                        <a href="{{ url('tiket/detailtiket/'.$row->id_tiket) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Detail</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- End Best Seller -->

            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="pagination">
                    <a href="{{ $tiket->previousPageUrl() ?? '#' }}" class="prev-arrow">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>

                    @foreach ($tiket->getUrlRange(1, $tiket->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="{{ $page == $tiket->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                    @endforeach

                    <a href="{{ $tiket->nextPageUrl() ?? '#' }}" class="next-arrow">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>
<br><br>
@endsection
