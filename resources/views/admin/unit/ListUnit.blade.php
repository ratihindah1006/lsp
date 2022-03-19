@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Unit</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema">Skema</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/schema/{{ $schema->id }}/unit"> Unit</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <a href="/category/{{ $category }}/schema/{{ $schema->id }}/unit/create" class="btn btn-primary btn-sm">
                            <i<i class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add
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
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unit as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->unit_code }}</td>
                                                <td>{{ $value->unit_title }}</td>
                                                <td align="center">
                                                    <a href="/category/{{ $category }}/schema/{{ $schema->id }}/unit/{{ $value->id }}/element" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/category/{{ $category }}/schema/{{ $schema->id }}/unit/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <a href="#" class="btn btn-danger btn-sm delete" schema-id="{{ $schema->id }}" category-id="{{ $category }}" unit-id="{{ $value->id }}" unit-title="{{ $value->unit_title }}"><span class="ti-trash"></span></a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script>
        $('.delete').click(function() {
            var category_id = $(this).attr('category-id');
            var schema_id = $(this).attr('schema-id');
            var unit_id = $(this).attr('unit-id');
            var unit_title = $(this).attr('unit-title');
            swal({
                    title: "Apakah Kamu Yakin?",
                    text: "Kamu akan menghapus data unit dengan judul : "+unit_title+"",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/category/"+category_id+"/schema/"+schema_id+"/unit/"+unit_id+""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data batal dihapus");
                    }
                });
        });
    </script>

    @endsection