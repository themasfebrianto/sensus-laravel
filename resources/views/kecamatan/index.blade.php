@extends('layouts.app')
@section('content')
<div class="container">
        <table>
            <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Opsi</th>
            </tr>
        @foreach ($kecamatan as $row)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->nama_kecamatan}}</td>
                    <td>{{$row->nama_kabupaten}}</td>
                    <td>
                        <button>edit</button>
                        <button>hapus</button>
                    </td>
                    </tr>
        @endforeach
        </table>
</div>
@endsection