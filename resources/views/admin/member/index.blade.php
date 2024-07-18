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
      <form action="{{url('admin/member/import')}}" method="POST" enctype="multipart/form-data">
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
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables Member</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="{{url('admin/member/create')}}" class="btn btn-primary" ><i class="fas fa-plus"></i></a>
                        <a href="{{url('admin/member/memberPDF')}}"class="btn btn-danger"><i class="fas fa-file-pdf"></i></a>
                        <a href="{{url('admin/member/export')}}"class="btn btn-success"><i class="fas fa-file-excel"></i></a>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-upload"></i>
                        </button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>no</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($member as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->password}}</td>
                                        <td>{{$row->role}}</td>
                                        <td>{{$row->foto}}</td> 
                                        <td>
                                                <a href="{{url('admin/member/show/'.$row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{url('admin/member/edit/'.$row->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                
                                                <!-- Button trigger modal -->
                                                @if (Auth::user()->role == 'admin')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$row->id}}">
                                                  <i class="fas fa-trash"></i>
                                                </button>
                                                @endif

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
                                                        Apakah anda yakin akan menghapus data {{$row->name}} ?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{url('admin/member/delete/'.$row->id)}}" type="button" class="btn btn-danger">Delete</a>
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