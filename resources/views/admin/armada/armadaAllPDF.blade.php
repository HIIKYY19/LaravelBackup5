<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Armada</title>
</head>
<body>
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
        <tbody>
            @php $no = 1; @endphp
            @foreach ($armada as $a)
            <tr>
                <td>{{$no++}}</td>
                <td align="center">{{$a->idarmada}}</td>
                <td>{{$a->jenis_armada}}</td>
                <td>{{$a->nama_armada}}</td>
                <td>{{$a->supir}}</td>
                <td>{{$a->kapasitas}} Kg</td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>