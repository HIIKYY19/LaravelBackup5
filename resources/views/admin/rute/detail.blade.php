@extends('admin.layout.appadmin')
@section('content')

@foreach ($rute as $r)
<h1>{{$r->kode}}</h1>
@endforeach

@endsection