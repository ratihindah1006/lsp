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
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/schema">Skema</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Bidang : {{ $category->field_title }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        @if(session()->has ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <a href="/category/{{ $category->id }}/schema/create" class="btn btn-primary btn-sm"><i class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Skema</th>
                                                <th>No. SKKNI</th>
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
                                                <td>{{ $value->schema_title }}</td>
                                                <td>{{ $value->no_skkni }}</td>
                                                <td>{{ $value->competency_package }}</td>
                                                <td>{{ $value->requirement }}</td>
                                                <td>{{ $value->cost }}</td>
                                                <td align="center">
                                                    <a href="/category/{{ $category->id }}/schema/{{ $value->id }}/unit" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/category/{{ $category->id }}/schema/{{ $value->id }}/show" class="btn btn-success btn-sm"><span class="ti-file"></span></a>
                                                    <a href="/category/{{ $category->id }}/schema/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <a href="#" class="btn btn-danger btn-sm delete" schema-id="{{ $value->id }}" category-id="{{ $category->id }}" schema-title="{{ $value->schema_title }}"><span class="ti-trash"></span></a>
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
            var schema_title = $(this).attr('schema-title');
            swal({
                    title: "Apakah Kamu Yakin?",
                    text: "Kamu akan menghapus data skema dengan judul : "+schema_title+"",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/category/"+category_id+"/schema/"+schema_id+""
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