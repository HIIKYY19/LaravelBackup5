@extends('utama.layout.apputama')
@section('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Detail Tiket bis</h1>
                <nav class="d-flex align-items-center">
                    <a href="#">detail tiket </a>
                </nav>
            </div>
        </div>
    </div>
</section>
<br>
<!--================Single Product Area =================-->
@foreach ($tiket as $row)
<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div >
						<div class="single-prd-item">
						<img class="img-fluid" width="400px" 
                                @if($row->foto)
                                    src="{{ url('admin/img') }}/{{ $row->foto }}" alt="Product Image"
                                @else
                                    src="{{ asset('utama/img/product/p1.jpg') }}" alt="Default Image"
                                @endif
                            >
						</div>
					</div>
				</div>
				
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $row->kota_asal }} - {{ $row->kota_tujuan }}</h3>
						<h2>Rp. {{ $row->harga }}</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Armada</span> : {{ $row->nama_armada }}</a></li>
							<li><a href="#"><span>Waktu </span> : {{ $row->berangkat }} - {{ $row->sampai }}</a></li>
						</ul>
						<p>{{ $row->detail }}</p>
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="{{ url('tiket/pesantiket/'.$row->id_tiket) }}">pesan</a>
							<a class="icon_btn" href="{{ url()->previous() }}"><i class="lnr lnr-chevron-left"></i></a>

							<!-- <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>@endforeach
	<br><br>
	<!--================End Single Product Area =================-->

@endsection