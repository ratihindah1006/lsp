@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Unit Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/skema">Skema</a></li>
                <li class="breadcrumb-item active"><a href="/skema/{{ $schema->id }}/unit"> Unit Skema</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Skema : {{ $schema->schema_title }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="data-table-area">
        <div class="container col-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <a href="/skema/{{ $schema->id }}/unit/create" class="btn btn-primary btn-sm">
                            <i class="ti-plus ">&nbsp;</i>Tambah / Edit
                        </a><br><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Unit Code</th>
                                                <th>Unit Title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unit as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->unit->unit_code }}</td>
                                                <td>{{ $value->unit->unit_title }}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection