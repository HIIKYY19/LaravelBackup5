@extends('admin.layout.appadmin')
@section('content')

@foreach ($jadwal as $jdl)
<section class="py-5">
    <input type="hidden" value="{{$jdl->idjadwal}}">
    <div class="container px-4 px-lg-5 my-5">
                <table class="table">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th>ID Jadwal</th>
                                <th>Jam Berangkat</th>
                                <th>Jam Sampai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td>{{$jdl->idjadwal}}</td>
                                <td>{{$jdl->jam_berangkat}}</td>
                                <td>{{$jdl->jam_sampai}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div align="center">
                        <a href="{{url('/admin/jadwal/')}}">
                         <button class="btn btn-outline-dark flex-shrink-0" type="button">
                             Kembali
                         </button>
                        </a>
                    </div>
            </div>
        </section>
@endforeach

@endsection