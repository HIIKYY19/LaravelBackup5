<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
</head>
<body>
    <h3 align="center">Data Jadwal</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <th>No</th>
            <th>ID Jadwal</th>
            <th>Jam Berangkat</th>
            <th>Jam Tiba</th>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($jadwal as $j)
            <tr>
                <td>{{$no++}}</td>
                <td align="center">{{$j->idjadwal}}</td>
                <td>{{$j->jam_berangkat}}</td>
                <td>{{$j->jam_sampai}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>