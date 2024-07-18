@extends('admin.layout.appadmin')
@section('content')

<!DOCTYPE html>
<html lang="id">
<head>

    <style>

body {
    font-family: Arial, sans-serif;
}

.section_gap {
    padding: 75px 0;
    background-color: #f9f9ff;
}

.container {
    width: 80%;
    margin: auto;
}

.title_confirmation {
    color: #2d2d2d;
    font-size: 24px;
    margin-bottom: 50px;
}

.order_d_inner {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.details_item {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.1);
}

.details_item h4 {
    color: #2d2d2d;
    font-size: 18px;
    margin-bottom: 20px;
}

.list {
    list-style: none;
}

.list li {
    margin-bottom: 10px;
}

.list li a {
    color: #2d2d2d;
    text-decoration: none;
}

.order_details_table {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.1);
}

.order_details_table h2 {
    color: #2d2d2d;
    font-size: 24px;
    margin-bottom: 30px;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

    
</style>
</head>
<body>

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
        @foreach ($pembayaran as $row)
            <center><h3 class="title_confirmation">Detail Pemesanan {{ $row->id_transaksi }} </h3></center>
            <div class="row order_d_inner">
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Pelanggan</h4>
                        <ul class="list">
                            <li><a href="#"><span>Nama</span> : {{ $row->nama_penumpang }}</a></li>
                            <li><a href="#"><span>Email</span> : {{ $row->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Informasi Tiket</h4>
                        <ul class="list">
                            <li><a href="#"><span>Kode Tiket</span> : {{ $row->tiket_id }}</a></li>
                            <li><a href="#"><span>Nama Armada</span> : {{ $row->nama_armada }}</a></li>
                            <li><a href="#"><span>Kota Asal</span> : {{ $row->kota_asal }}</a></li>
                            <li><a href="#"><span>Kota Tujuan</span> : {{ $row->kota_tujuan }}</a></li>
                            <li><a href="#"><span>Jam Berangkat</span> : {{ $row->jam_berangkat }}</a></li>
                            <li><a href="#"><span>Jam Sampai</span> : {{ $row->jam_sampai }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="details_item">
                        <h4>Tanggal Pembelian Tiket</h4>
                        <ul class="list">
                            <li><a href="#"><span>Kode Transaksi</span> : {{ $row->id_transaksi }}</a></li>
                            <li><a href="#"><span>tanggal</span> : {{ $row->tanggal }}</a></li>
                            <li><a href="#"><span>status</span> : {{ $row->status_pembayaran }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="order_details_table">
                <h2>Detail Pemesanan</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kode Tiket</th>
                                <th scope="col">Jumlah Tiket</th>
                                <th scope="col">Harga Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p>{{ $row->tiket_id}}</p>
                                </td>
                                <td>
                                    <h5>x {{ $row->total_tiket }}</h5>
                                </td>
                                <td>
                                    <p>Rp. {{ $row->harga }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <!-- Remove the empty h5 element here if not needed -->
                                </td>
                                <td>
                                    <p>Rp. {{ $row->totalharga }}</p>
                                </td>
                            </tr>
                            <tr>
                                <form method="POST" action="{{ url('admin/pembayaran/bayar') }}" enctype="multipart/form-data">
                                @csrf
                                 <td>
                                    <h4>Bayar</h4>
                                </td>
                                <td>
                                <input id="bayar" name="bayar" value="{{$row->bayar}}" placeholder="Masukkan Total Pembayaran" type="text" class="form-control @error('bayar') is-invalid @enderror">
                                @error('bayar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                                                    </td>
                                <td>
                                <div class="offset-4 col-8">
                                    <button name="submit" value="submit" type="submit" class="btn btn-primary">Bayar</button>
                                    <input type="hidden" name="status_pembayaran" value="LUNAS" >
                                    <input type="hidden" name="id_pembayaran" value="{{ $row->id_pembayaran }}" >
                                    <input type="hidden" name="total_harga" value="{{ $row->totalharga }}" >
                                </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        @endforeach
    </div>
</section>
<!--================End Order Details Area =================-->

</body>
</html>




@endsection