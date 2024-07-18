@extends('admin.layout.appadmin')

@section('content')
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('admin/jadwal/import')}}" method="POST" enctype="multipart/form-data">
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
</div> -->
<!-- batas modal -->
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables Jadwal</h1>
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
                                <a href="{{url('/admin/jadwal/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                <a href="{{url('/admin/jadwal/jadwalAllPDF')}}" class="btn btn-info"><i class="fas fa-file-pdf"></i></a>
                                <a href="{{url('/admin/jadwal/export')}}" class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-upload"></i>
                                </button> -->
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id Jadwal</th>
                                            <th>Jam Berangkat</th>
                                            <th>Jam Sampai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Jadwal</th>
                                            <th>Jam Berangkat</th>
                                            <th>Jam Sampai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($jadwal as $j)
                                    <tr>
                                        <td>{{$j->idjadwal}}</td>
                                        <td>{{$j->jam_berangkat}}</td>
                                        <td>{{$j->jam_sampai}}</td>
                                        <td>
                                            <a href="{{url('/admin/jadwal/show/'.$j->idjadwal)}}" class="btn btn-sm btn-info"><i class= "fas fa-eye"></i></a>
                                            <a href="{{url('/admin/jadwal/edit/'.$j->idjadwal)}}" class="btn btn-sm btn-warning"><i class= "fas fa-edit"></i></a>
                                            <a href="{{url('/admin/jadwal/jadwalIdPDF/'.$j->idjadwal)}}" class="btn btn-sm btn-info"><i class= "fas fa-file-pdf"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$j->idjadwal}}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$j->idjadwal}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin akan menghapus data {{$j->jam_berangkat}} : {{$j->jam_sampai}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{url('admin/jadwal/delete/'.$j->idjadwal)}}" type="button" class="btn btn-danger">Delete</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
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