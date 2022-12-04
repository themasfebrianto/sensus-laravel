<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan Data Kecamatan</title>
</head>

<body>

    <div class="d-flex flex-row justify-content-center">
        <table class="table table-bordered justify-center">
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $row)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_kecamatan }}</td>
                        <td>{{ $row->nama_kabupaten }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
