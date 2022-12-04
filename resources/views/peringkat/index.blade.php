@extends('layouts.dashboard')

@section('title')
    Cek Peringkat
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Cek Peringkat</li>
@endsection

@section('content')
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>
@endsection
