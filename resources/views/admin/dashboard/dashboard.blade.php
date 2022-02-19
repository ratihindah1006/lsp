@extends('layout.main')

@section('container')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Asesor</div>
                            <div class="stat-digit">{{ $assessor }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Asesi</div>
                            <div class="stat-digit">{{ $assessi }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-time text-pink border-pink"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Event</div>
                            <div class="stat-digit">{{ $event }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-layout-grid2 text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Kategori</div>
                            <div class="stat-digit">{{ $category }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection