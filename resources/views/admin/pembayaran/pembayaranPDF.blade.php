<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembayaran</title>
</head>
<body>
    <h3 align="center">Data Pembayaran</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>no</th>
                <th>Transaksi Id</th>
                <th>tanggal</th>
                <th>bayar</th>
                <th>kembalian</th>
                <th>status_pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pembayaran as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $row->transaksi_id }}</td>
                <td>{{ $row->tanggal }}</td>
                <td>{{ $row->bayar }}</td>
                <td>{{ $row->kembalian }}</td>
                <td>{{ $row->status_pembayaran }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>