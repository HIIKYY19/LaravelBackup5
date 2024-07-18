@extends('admin.layout.appadmin')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                        <a href="{{url('admin/pembayaran/pembayaranPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                        <!-- <a href="{{ url('admin/pembayaran/export') }}" class="btn btn-success"><i class="fa-regular fa-file-excel" style="color: #ffffff;"></i></a> -->

                </div>
                <div class="card-body">
            <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>transaksi_id</th>
                        <th>tanggal</th>
                        <th>bayar</th>
                        <th>kembalian</th>
                        <th>Status Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>transaksi_id</th>
                        <th>tanggal</th>
                        <th>bayar</th>
                        <th>kembalian</th>
                        <th>Status Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pembayaran as $row)
                    <tr>
                        <td>{{ $row->id_pembayaran }}</td>
                        <td>{{ $row->transaksi_id}}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->bayar }}</td>
                        <td>{{ $row->kembalian }}</td>
                        <td>{{ $row->status_pembayaran }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{ $row->id_pembayaran }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $row->id_pembayaran }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data {{ $row->id_pembayaran }} ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{ url('admin/rute/delete/' . $row->id_pembayaran) }}"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
