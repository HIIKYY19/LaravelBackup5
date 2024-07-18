<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tiket</title>
</head>
<body>
    <h3 align="center">Data Tiket</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>no</th>
                <th>harga</th>
                <th>jadwal id</th>
                <th>kota asal</th>
                <th>kota tujuan</th>
                <th>nama armada</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($tiket as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $row->harga }}</td>
                <td>{{ $row->jadwal_id }}</td>
                <td>{{ $row->kota_asal }}</td>
                <td>{{ $row->kota_tujuan }}</td>
                <td>{{ $row->nama_armada }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>