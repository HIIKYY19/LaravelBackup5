@extends('admin.layout.appadmin')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <form action="{{url('admin/penumpang/import')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
        {{csrf_field()}}
        <input type="file" name="file">
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
<main>
   
 <h1 class="h3 mb-2 text-gray-800" align="center">Tabel Penumpang</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{url('/admin/penumpang/create')}}"> <button class="btn btn-sm btn-primary">Tambah</button></a>
        <a href="{{url('admin/penumpang/penumpangPDF')}}"class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
        <a href="{{url('admin/penumpang/export')}}"class="btn btn-success"><i class="fas fa-file-excel"></i></a>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-upload"></i>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Gender</th>
                                            <th>No. Tlp</th>
                                            <th>Berat Bawaan</th>
                                            <th>Password</th>
                                            {{-- <th>Foto</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Gender</th>
                                            <th>No. Tlp</th>
                                            <th>Berat Bawaan</th>
                                            <th>Password</th>
                                            {{-- <th>Foto</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($penumpang as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->gender}}</td>
                                        <td>{{$row->no_telepon}}</td>
                                        <td>{{$row->berat_bawaan}}</td>
                                        <td>{{$row->password}}</td>
                                        {{-- <td>{{$row->foto}}</td> --}}
                                        <td>
                                            <a href="{{url('admin/penumpang/show/'.$row->id)}}"class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{url('admin/penumpang/edit/'.$row->id)}}"class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
                                                <i class="fas fa-trash"></i>
                                                </button>
    
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Apakah anda yakin akan menghapus data {{$row->nama}} ?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{url('admin/penumpang/delete/'.$row->id)}}" type="button" class="btn btn-danger">Delete</a>
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
                     @endsection