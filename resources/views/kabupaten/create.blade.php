@extends('layouts.dashboard')

@section('title')
    Kabupaten
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kabupaten</li>
@endsection

@section('content')
    <div class="card col-8" style="margin:20px;">
        <div class="card-header">Tambah Kabupaten</div>
        <div class="card-body">

            <form action="{{ url('kabupaten') }}" method="post">
                @csrf
                @method('post')
                <label for="nama_kabupaten">Nama Kabupaten</label></br>
                <input type="text" name="nama_kabupaten" id="nama_kabupaten"
                    class="form-control @error('nama_kabupaten') is-invalid @enderror" autofocus></br>
                @error('nama_kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input class="btn btn-success mt-2" type="submit" value="Simpan">
            </form>

        </div>
    </div>
@endsection
