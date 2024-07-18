@extends('admin.layout.appadmin')
@section('content')


@foreach($transaksi as $p)
<h1>{{$p->total_tiket}}</h1>
@endforeach

@endsection