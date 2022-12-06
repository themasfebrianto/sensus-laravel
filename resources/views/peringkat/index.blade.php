@extends('layouts.dashboard')

@section('title')
    Cek Peringkat
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Cek Peringkat</li>
@endsection

<script src="{{ asset('js/peringakat.js') }}"></script>

@section('content')
    <div class="card-body">

        <div class="card">
            <div class="card-body">
                <form id="form" onsubmit="return false">
                    <div class="form-group d-flex justify-content-around">
                        <div class="form-group col-6">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Nilai
                            </h2>
                            <input type="text" class="form-control form-control-lg" id="inputNilai"
                                placeholder="Input Nilai">
                        </div>
                        <div class="form-group col-6">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Keterangan
                            </h2>
                            <h6 id="hasil"></h6>
                        </div>
                    </div>
                    <button type="submit" class="btn border" onclick="cek()">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
