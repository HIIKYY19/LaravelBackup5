@extends('admin.layout.appadmin')
@section('content')

@if(Auth::user()->role == 'admin')
<!-- Modal Import-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('admin/transaksi/import')}}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          {{csrf_field()}}
          <input type="file" name="file" >

        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- batas modal -->

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                        <a href="{{url('admin/transaksi/transaksiPDF')}}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{ url('admin/transaksi/export') }}" class="btn btn-success"><i class="fa-regular fa-file-excel" style="color: #ffffff;"></i></a>

                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Total Tiket</th>
                                <th>Total harga</th>
                                <th>member_id</th>
                                <th>tiket_id</th>
                                <th>tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>no</th>
                                <th>Total Tiket</th>
                                <th>Total harga</th>
                                <th>member_id</th>
                                <th>tiket_id</th>
                                <th>tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($transaksi as $row)
                                <tr>
                                    <td>{{ $row->id_transaksi }}</td>
                                    <td>{{ $row->total_tiket }}</td>
                                    <td>{{ $row->totalharga }}</td>
                                    <td>{{ $row->member_id }}</td>
                                    <td>{{ $row->tiket_id }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>
                                        <a href="{{ url('admin/transaksi/show/'.$row->id_transaksi) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('admin/transaksi/edit/'.$row->id_transaksi) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $row->id_transaksi }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $row->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data dengan ID Transaksi: {{ $row->id_transaksi }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ url('admin/transaksi/destroy/'.$row->id_transaksi) }}" class="btn btn-primary">Delete</a>
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
    </main>
@else 

@endif

@endsection
