@extends('utama.layout.apputama')
@section('content')

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Riwayat Pemesanan</h1>
                <nav class="d-flex align-items-center">
                    <a href="{{ url('/') }}">Riwayat</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<br><br>
@foreach ($transaksi as $row)
<center><a href="{{ url('riwayat/download/'.$row->id_transaksi) }}" class="btn btn-sm btn-dark">Download PDF</a></center>
<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
            <h3 class="title_confirmation">Terima Kasih Telah Memesan </h3>
            <div class="row order_d_inner ">
                <div class="col-lg-4 ">
                    <div class="details_item">
                        <h4>Pelanggan</h4>
                        <ul class="list">
                            <li><a href="#"><span>Nama</span> : {{ $row->nama_penumpang }}</a></li>
                            <li><a href="#"><span>Email</span> : {{ $row->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="details_item ">
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

                <div class="col-lg-4 ">
                    <div class="details_item ">
                        <h4>Tanggal Pembelian Informasi Tiket</h4>
                        <ul class="list">
                            <li><a href="#"><span>Kode Transaksi</span> : {{ $row->id_transaksi }}</a></li>
                            <li><a href="#"><span>Kode Pembayaran</span> : {{ $row->id_pembayaran }}</a></li>
                            <li><a href="#"><span>Tanggal</span> : {{ $row->tanggal }}</a></li>
                            <li>
                                <a href="#" style="color: {{ $row->status_pembayaran == 'LUNAS' ? 'green' : 'red' }}">
                                    <span >
                                        Status Pembayaran
                                    </span>
                                    : {{ $row->status_pembayaran }}
                                </a>
                            </li>
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
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>Rp. {{ $row->totalharga }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Total Pembayaran</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>Rp. {{ $row->bayar }}</p>
                                </td>
                            </tr>
                            @if ($row->kembalian > 0)
                            <tr>
                                <td>
                                    <h4>Kembalian</h4>
                                </td>
                                <td>
                                    <h5></h5>
                                </td>
                                <td>
                                    <p>Rp. {{ $row->kembalian }}</p>
                                </td>
                            </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!--================End Order Details Area =================-->
<br><br>
@endsection
