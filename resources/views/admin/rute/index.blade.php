@extends('admin.layout.appadmin')
@section('content')

<!-- <h1>Tes Index Kartu</h1> -->

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Rute</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{url('admin/rute/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Kota Asal</th>
                                            <th>Kota Tujuan</th>
                                            <th>Jarak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Kota Asal</th>
                                            <th>Kota Tujuan</th>
                                            <th>Jarak</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <!-- @php $no=1 @endphp -->
                                        @foreach ($rute as $r)
                                        <tr>
                                            
                                            <!-- Tanpa menggunakan @php $no=1 @endphp -->
                                            <!-- <td>{{ $loop->iteration }}</td> -->
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $r->kode }}</td>
                                            <td>{{ $r->kota_asal }}</td>
                                            <td>{{ $r->kota_tujuan }}</td>
                                            <td>{{ $r->jarak }}</td>
                                            <td>
                                                <a href="{{url('admin/rute/show/'.$r->idrute)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{url('admin/rute/edit/'.$r->idrute)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                @if (Auth::user()->role == 'admin')                         
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $r->idrute }}">
<i class="fas fa-trash"></i>
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $r->idrute }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data {{ $r->kota_asal }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{url('admin/rute/delete/'.$r->idrute)}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <!-- </div> -->
                <!-- /.container-fluid -->

            <!-- </div> -->
            <!-- End of Main Content -->
            
@endsection