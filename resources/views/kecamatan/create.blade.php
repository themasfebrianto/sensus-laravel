@extends('layouts.dashboard')

@section('title')
    Kecamatan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kecamatan</li>
@endsection

@section('content')
    @if (session()->has('flash_message'))
        <div class="card-body">
            <div class="alert alert-danger mb-2" role="alert">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif
    <div class="card col-8" style="margin:20px;">
        <div class="card-header">Tambah kecamatan</div>
        <div class="card-body">

            <form action="{{ url('kecamatan') }}" method="post">
                @csrf
                @method('post')
                <label for="nama_kecamatan">Nama Kecamatan</label></br>
                <input type="text" name="nama_kecamatan" id="nama_kecamatan"
                    class="form-control @error('nama_kecamatan') is-invalid @enderror" autofocus></br>
                @error('nama_kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label for="id_kabupaten">Kabupaten</label></br>
                <select name="id_kabupaten" id="id_kabupaten"
                    class="form-control @error('id_kabupaten') is-invalid @enderror">
                    <option value="">Pilih Kabupaten</option>
                    <!--hasil pluck dari controller produk.index di iterasi di sini-->
                    @foreach ($kabupaten as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
                @error('id_kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input class="btn btn-success mt-4" type="submit" value="Simpan">
            </form>

        </div>
    </div>
@endsection
