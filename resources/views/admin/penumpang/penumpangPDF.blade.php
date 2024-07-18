<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penumpang</title>
</head>
<body>
    <h3 align="center">Data Penumpang</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>No. Tlp</th>
                <th>Berat Bawaan</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @php $id = 1; @endphp
            @foreach ($penumpang as $row)
            <tr>
                <td>{{$id++}}</td>
                <td>{{$row->nama}}</td>
                <td>{{$row->gender}}</td>
                <td>{{$row->no_telepon}}</td>
                <td>{{$row->berat_bawaan}}</td>
                <td>{{$row->password}}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>