<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
</head>
<body>
    <h3 align="center">Data Transaksi</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>no</th>
                <th>Total Tiket</th>
                <th>Total harga</th>
                <th>member_id</th>
                <th>tiket_id</th>
                <th>tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($transaksi as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $row->total_tiket }}</td>
                <td>{{ $row->totalharga }}</td>
                <td>{{ $row->member_id }}</td>
                <td>{{ $row->tiket_id }}</td>
                <td>{{ $row->tanggal }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>