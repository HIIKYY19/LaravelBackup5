<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Armada</title>
</head>
@foreach ($armada as $ar)
<body>
    <input type="hidden" value="{{$ar->idarmada}}">
    <h3 align="center">Data Armada</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <th>No</th>
            <th>ID Armada</th>
            <th>Jenis Armada</th>
            <th>Nama Armada</th>
            <th>Nama Supir</th>
            <th>Kapasitas Bagasi</th>
        </thead>
        <tbody align="center">
            @php $no = 1; @endphp
            <tr>
                <td>{{$no++}}</td>
                <td>{{$ar->idarmada}}</td>
                <td>{{$ar->jenis_armada}}</td>
                <td>{{$ar->nama_armada}}</td>
                <td>{{$ar->supir}}</td>
                <td>{{$ar->kapasitas}} Kg</td>
            </tr>
        </tbody>
    </table>
</body>
@endforeach
</html>