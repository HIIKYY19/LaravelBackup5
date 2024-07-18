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

<div class="card-body">
    <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Total Tiket</th>
                <th>Total Harga</th>
                <th>Tiket ID</th>
                <th>Tanggal</th>
                <th>Riwayat Pesanan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Total Tiket</th>
                <th>Total Harga</th>
                <th>Tiket ID</th>
                <th>Tanggal</th>
                <th>Riwayat Pesanan</th>
            </tr>
        </tfoot>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($transaksi as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->total_tiket }}</td>
                    <td>{{ $row->totalharga }}</td>
                    <td>{{ $row->tiket_id }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>
                        <a href="{{ url('riwayat/lihat/'.$row->id_transaksi) }}" class="btn btn-sm btn-info">
                            LIHAT
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<br><br>
@endsection
