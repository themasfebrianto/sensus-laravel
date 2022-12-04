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
        <div class="card">
            <div class="card-header">
                <form class="row row-cols-lg-auto g-1">
                    <div class="col">
                        <input class="form-control" type="text" name="q" value=""
                            placeholder="Cari Disni..." />
                    </div>
                    <div class="col">
                        <button class="btn btn-success">Search</button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('kabupaten.create') }}" class="btn btn-primary">Tambah</a>
                        </div>

                    </div>
                </form>
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
