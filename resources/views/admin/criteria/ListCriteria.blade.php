@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Kriteria Unjuk Kerja</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema">Skema</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema/{{ $schema }}/unit">
                        Unit</a></li>
                <li class="breadcrumb-item "><a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element">
                        Elemen</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria">
                        Kriteria</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Element : {{ $element->element_title }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">

                        <form method="post" action="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 ml-5">
                                            <div class="form-group row">
                                                <label for="criteria_title" class="form-label my-text">Judul Kriteria</label>
                                                <textarea type="text" class="form-control @error('criteria_title') is-invalid @enderror" id="criteria_title" name="criteria_title"></textarea>
                                                @error('criteria_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col ml-4">
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary mtm-4" style="width: 50%; height:40px;">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Criteria Title</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($criteria as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->criteria_title }}</td>
                                                <td>
                                                    <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <a href="#" class="btn btn-danger btn-sm delete" schema-id="{{ $schema }}" category-id="{{ $category }}" unit-id="{{ $unit }}" element-id="{{ $element->id }}" criteria-id="{{ $value->id }}" criteria-title="{{ $value->criteria_title }}"><span class="ti-trash"></span></a>
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
            var element_id = $(this).attr('element-id');
            var criteria_id = $(this).attr('criteria-id');
            var criteria_title = $(this).attr('criteria-title');
            swal({
                    title: "Apakah Kamu Yakin?",
                    text: "Kamu akan menghapus data kriteria unjuk kerja dengan judul : " + criteria_title + "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/category/" + category_id + "/schema/" + schema_id + "/unit/" + unit_id + "/element/" + element_id + "/criteria/" + criteria_id + ""
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