<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laporan Data Kabupaten</title>
</head>

<body>
    <div class="d-flex flex-row justify-content-center">
        <table class="table table-bordered justify-center">
            <thead class="">
                <tr>
                    <th scope="col">No
                    </th>
                    <th scope="col">Kabupaten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kabupaten as $row)
                    <tr scope="row">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_kabupaten }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
