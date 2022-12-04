@extends('layouts.dashboard')

@section('title')
    Kabupaten
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kabupaten</li>
@endsection

@section('content')
    <div class="card-body">
        @if (session()->has('flash_message'))
            <div class="alert alert-success mb-2" role="alert">
                {{ session('flash_message') }}
            </div>
        @endif
        @if (session()->has('constraint'))
            <div class="alert alert-danger mb-2" role="alert">
                {{ session('constraint') }}
            </div>
        @endif
        <div class="card">

            <div class="card-header d-flex">
                <form action="{{ route('kabupaten.search') }}" class="col-10">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Kabupaten" name="nama_kabupaten">
                        <div class="input-group-append">
                            <button class="btn btn-warning " type="submit">Search</button>
                        </div>
                    </div>
                </form>
                <div class="ml-4">
                    <div class="col">
                        <a href="{{ route('kabupaten.create') }}" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="col">
                        <a href="{{ route('kabupaten.cetakpdf') }}" class="btn btn-secondary" target="_blank">Cetak PDF</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kabupaten as $row)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nama_kabupaten }}</td>
                                <td>
                                    <a href="{{ url('/kabupaten/' . $row->id_kabupaten) }}" title="Edit kabupaten"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>
                                            Edit</button></a>

                                    <form method="POST" action="{{ url('/kabupaten/' . $row->id_kabupaten) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete kabupaten"
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
                    {!! $kabupaten->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
