@extends('utama.layout.apputama')
@section('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Pesan Tiket bis</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">tiket<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?hal=tiket">pesan tiket</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<br><br>
@foreach ($tiket as $row)
<div class="col-lg-4 mx-auto">
    <div class="order_box">
        <h2>Pesanan Anda</h2>

        <form method="post" action="{{ url('tiket/store') }}" enctype="multipart/form-data">
            @csrf
            <ul class="list">
                <li><a href="#">Kode Tiket <span>Harga</span></a></li>
                <li><a href="#">{{ $row->id_tiket}} <span class="middle"></span> 
				<span class="last" id="harga">{{ $row->harga }}</span></a></li>
            </ul>
            <ul class="list list_2">
                <li>
                    <label for="total_tiket">Total Tiket</label>
                    <input type="number" id="total_tiket" name="total_tiket"  class="form-control" min="1" value="1" oninput="bayar()" />
                </li>
                <li>
                    <a href="#">
                        <label for="total_harga">Total Harga</label>
                        <span id="total_harga">Rp.{{ number_format($row->harga * old('total_tiket', 0), 2) }}</span>
						<input type="hidden" id="total_harga_hidden" name="totalharga" value="{{ number_format($row->harga * old('total_tiket', 0), 2) }}">
                    </a>
                </li>
            </ul>

            <div class="payment_item active">
                <div class="radion_btn">
                    <input type="radio" id="f-option6" name="payment_selector" required>
                    <label for="f-option6">OFFLINE </label>
                    <img src="{{asset('utama/img/product/card.jpg')}}" alt="">
                    <div class="check"></div>
                </div>
                <p>Membayar Di Tempat Mitra</p>
            </div>

            <div class="payment_item">
            <div class="radion_btn">
                <input type="radio" id="f-option6" name="payment_selector" disabled>
                <label for="f-option6">Qris (Comming SOON) </label>
                <img src="{{asset('utama/img/product/card.jpg')}}" alt="">
                <div class="check"></div>
            </div>
            <p>Membayar Menggunakan Qris Gopay, Shopeepay, OVO, Linkaja </p>
        </div>



            <div class="creat_account">
                <input type="checkbox" id="f-option4" name="terms_and_conditions" required>
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
            </div>
            
            <button type="submit" class="primary-btn">BAYAR</button>
            <input type="hidden" name="member_id" value="{{ Auth::user()->id }}">
			<input type="hidden" name="tiket_id" value="{{ $row->id_tiket}}"> 
        </form>
    </div>
</div>
@endforeach
<br><br>
<script>
    function bayar() {
        var totalTiket = parseInt(document.getElementById('total_tiket').value) || 0;
        var harga = parseInt(document.getElementById('harga').innerText) || 0;
        var totalHarga = totalTiket * harga;
        
        document.getElementById('total_harga').innerText = "Rp." + totalHarga.toLocaleString('id-ID');
		document.getElementById('total_harga_hidden').value = totalHarga;
    }

    // Pemanggilan bayar() saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        bayar();
    });
</script>

@endsection
