@extends('layout.assessor')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Beranda</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/assessor">Beranda</a></li>
            </ol>
        </div>
    </div>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Event</th>
                                                <th>Skema</th>
                                                <th>Kelas Skema</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($assessor->assessors as $v)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v->schema_class->event->event_name}}</td>
                                                <td>{{ $v->schema_class->schema->schema_title }}</td>
                                                <td>{{$v->schema_class->name}}</td>
                                                <td>
                                                    <a href="/assessi/{{ $v->id }}" class="btn btn-primary btn-sm mb-2">
                                                        <span>Assessi</span></a>
                                                </td>
                                                
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