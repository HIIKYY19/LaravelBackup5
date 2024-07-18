@extends('admin.layout.appadmin')
@section('content')

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
      <form action="{{url('admin/tiket/import')}}" method="post" enctype="multipart/form-data">
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
        <h1 class="mt-4">Tables Tiket</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ url('/admin/tiket/create') }}" class="btn btn-sm btn-primary">Tambah</a>
                <a href="{{ url('admin/tiket/tiketPDF') }}" class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                <a href="{{ url('admin/tiket/export') }}" class="btn btn-success"><i class="fa-regular fa-file-excel" style="color: #ffffff;"></i></a>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1">
                <i class="fas fa-upload"></i>
                </button>
                
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>harga</th>
                            <th>jadwal id</th>
                            <th>kota asal</th>
                            <th>kota tujuan</th>
                            <th>nama armada</th>
                            <th>foto</th>
                            <th>detail</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>no</th>
                            <th>harga</th>
                            <th>jadwal id</th>
                            <th>kota asal</th>
                            <th>kota tujuan</th>
                            <th>nama armada</th>
                            <th>foto</th>
                            <th>detail</th>
                            <th>aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tiket as $row)
                        <tr>
                            <td>{{ $row->id_tiket }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->jadwal_id }}</td>
                            <td>{{ $row->kota_asal }}</td>
                            <td>{{ $row->kota_tujuan }}</td>
                            <td>{{ $row->nama_armada }}</td>
                            <td><img src="{{url('admin/img')}}/{{$row->foto}}" width="50px" alt=""></td>
                            <td>{{ $row->detail }}</td>
                            <td>
                                <a href="{{ url('admin/tiket/show/'.$row->id_tiket) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('admin/tiket/edit/'.$row->id_tiket) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if (Auth::user()->role == 'admin')
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $row->id_tiket }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $row->id_tiket }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus tiket ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ url('admin/tiket/destroy/'.$row->id_tiket) }}" class="btn btn-primary">Delete</a>
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
@endsection
