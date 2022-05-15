@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/skema">Skema</a></li>
            </ol>
        </div>
    </div>

    <div class="data-table-area">
        <div class="container col-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <a href="/skema/create" class="btn btn-primary btn-sm"><i class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Skema</th>
                                                <th>Judul Skema</th>
                                                <th>Kemasan Kompetensi</th>
                                                <th>Persyaratan Dasar Permohonan</th>
                                                <th>Biaya</th>
                                                <th width="150px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schema as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->schema_code }}</td>
                                                <td>{{ $value->schema_title }}</td>
                                                <td>{{ $value->competency_package }}</td>
                                                <td>{{ $value->requirement }}</td>
                                                <td>{{ $value->cost }}</td>
                                                <td align="center">
                                                    <a href="/skema/{{ $value->id }}/unit" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/skema/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <form action="/skema/{{ $value->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->schema_title}}"><span class="ti-trash"></span>
                                                        </button>
                                                    </form>
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