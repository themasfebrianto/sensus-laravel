@extends('layouts.dashboard')

@section('title')
    Kecamatan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kecamatan</li>
@endsection

@section('content')
    <div class="card-body">
        @if (session()->has('flash_message'))
            <div class="alert alert-success mb-2" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex">
                <form action="{{ route('kecamatan.search') }}" class="col-10">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari kecamatan" name="nama_kecamatan">
                        <div class="input-group-append">
                            <button class="btn btn-warning " type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="ml-4">
                    <div class="col">
                        <a href="{{ route('kecamatan.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="col">
                        <a href="{{ url('kecamatan/cetak_pdf') }}" class="btn btn-secondary" target="_blank">Cetak PDF</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $row)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_kecamatan }}</td>
                                <td>{{ $row->nama_kabupaten }}</td>
                                <td>
                                    <a href="{{ url('/kecamatan/' . $row->id_kecamatan) }}" title="Edit kecamatan"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>
                                            Edit</button></a>

                                    <form method="POST" action="{{ url('/kecamatan/' . $row->id_kecamatan) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete kecamatan"
                                            onclick="return confirm('Anda Yakin?')"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-2">
                    {!! $kecamatan->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
