<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal Armada</title>
</head>
@foreach ($jadwal as $jaa)
<body>
    <input type="hidden" value="{{$jaa->idjadwal}}">
    <h3 align="center">Data Jadwal</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <th>No</th>
            <th>ID Jadwal</th>
            <th>Jam Berangkat</th>
            <th>Jam Sampai</th>
        </thead>
        <tbody align="center">
            @php $no = 1; @endphp
            <tr>
                <td>{{$no++}}</td>
                <td>{{$jaa->idjadwal}}</td>
                <td>{{$jaa->jam_berangkat}}</td>
                <td>{{$jaa->jam_sampai}}</td>
            </tr>
        </tbody>
    </table>
</body>
@endforeach
</html>