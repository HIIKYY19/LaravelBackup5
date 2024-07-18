<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
</head>
<body>
    <h3 align="center">Data Member</h3>
    <table border="1" cellpadding="10" align="center">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach ($member as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->password}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->foto}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>