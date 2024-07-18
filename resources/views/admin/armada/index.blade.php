@extends('admin.layout.appadmin')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Armada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('admin/armada/import')}}" method="POST" enctype="multipart/form-data">
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
                        <h1 class="mt-4">Tables Armada</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <a href="{{url('/admin/armada/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                <a href="{{url('/admin/armada/armadaAllPDF')}}" class="btn btn-info"><i class="fas fa-file-pdf"></i></a>
                                <a href="{{url('/admin/armada/export')}}" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-upload"></i>
                                </button>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id Armada</th>
                                            <th>Jenis Armada</th>
                                            <th>Nama Armada</th>
                                            <th>kapasitas</th>
                                            <th>Nama Supir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Armada</th>
                                            <th>Jenis Armada</th>
                                            <th>Nama Armada</th>
                                            <th>kapasitas</th>
                                            <th>Nama Supir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($armada as $a)
                                    <tr>
                                        <td>{{$a->idarmada}}</td>
                                        <td>{{$a->jenis_armada}}</td>
                                        <td>{{$a->nama_armada}}</td>
                                        <td>{{$a->kapasitas}}</td>
                                        <td>{{$a->nama}}</td>
                                        <td>
                                            <a href="{{url('/admin/armada/show/'.$a->idarmada)}}" class="btn btn-sm btn-info"><i class= "fas fa-eye"></i></a>
                                            <a href="{{url('/admin/armada/edit/'.$a->idarmada)}}" class="btn btn-sm btn-warning"><i class= "fas fa-edit"></i></a>
                                           <a href="{{url('/admin/armada/idPDF/'.$a->nama_armada)}}" class="btn btn-sm btn-info"><i class="fas fa-file-pdf"></i></a>
                                           @if (Auth::user()->role == 'admin')
                                           <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$a->idarmada}}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$a->idarmada}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menghapus data {{$a->nama_armada}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{url('admin/armada/delete/'.$a->idarmada)}}" type="button" class="btn btn-danger">Delete</a>
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