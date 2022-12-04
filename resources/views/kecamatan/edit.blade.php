@extends('layouts.dashboard')

@section('title')
    Kecamatan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kecamatan</li>
@endsection

@section('content')
    <div class="card col-8" style="margin:20px;">
        <div class="card-header">Edit kecamatan</div>
        <div class="card-body">

            <form action="{{ url('kecamatan/' . $kecamatan->id_kecamatan) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="{{ $kecamatan->id_kecamatan }}" />
                <label for="nama_kecamatan">Nama kecamatan</label></br>
                <input type="text" name="nama_kecamatan" id="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}"
                    class="form-control @error('nama_kecamatan') is-invalid @enderror" autofocus></br>
                @error('nama_kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label for="id_kabupaten">Kabupaten</label></br>
                <select name="id_kabupaten" id="id_kabupaten" class="form-control">
                    <option value="">{{ $nama_kabupaten->nama_kabupaten }}</option>
                    <!--hasil pluck dari controller produk.index di iterasi di sini-->
                    @foreach ($kabupaten as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
                <input class="btn btn-success mt-3" type="submit" value="Simpan">
            </form>

        </div>
    </div>
@endsection