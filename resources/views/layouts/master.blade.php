@extends('layouts.dashboard')

@section('title')
    Total Data
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Total Data</li>
@endsection

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $kabupaten }}</h3>
                        <p>Kabupaten</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa fa-flag"></i>
                    </div>
                    <a href="{{ route('kabupaten.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $kecamatan }}</sup></h3>

                        <p>Kecamatan</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa fa-flag-checkered"></i>
                    </div>
                    <a href="{{ route('kecamatan.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection
