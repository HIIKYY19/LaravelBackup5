@extends('admin.layout.appadmin')
@section('content')

@foreach ($armada as $a)
<section class="py-5">
    <input type="hidden" value="{{$a->idarmada}}">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">

                    <!-- section foto -->
                    <!-- @empty($ap->foto)
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img/nophoto.jpg')}}" alt="..." /></div>
                    @else
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('admin/img')}}/{{$p->foto}}" alt="..." /></div>
                    @endempty -->
                    <!-- section foto end -->

                    <!-- table armada -->
                    <table class="table">
                        <thead class="thead-dark" align="center">
                            <tr>
                                <th>ID Armada</th>
                                <th>Jenis Armada</th>
                                <th>Nama Armada</th>
                                <th>Nama Supir</th>
                                <th>Kapasitas</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <td>{{$a->idarmada}}</td>
                                <td>{{$a->jenis_armada}}</td>
                                <td>{{$a->nama_armada}}</td>
                                <td>{{$a->supir}}</td>
                                <td>{{$a->kapasitas}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- table end -->

                    <div align="center">
                        <a href="{{url('/admin/armada/')}}">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
@endforeach

@endsection