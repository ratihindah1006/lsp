@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Element</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema">Skema</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema/{{ $schema }}/unit">
                        Unit</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit->id }}/element">
                        Element</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Unit : {{ $unit->unit_title }}</p>
                </div>
            </div>
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


                        <form method="post" action="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit->id }}/element">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 ml-5">
                                            <div class="form-group row">
                                                <label for="element_title" class="form-label my-text">Judul Element</label>
                                                <input style="width: 100%; height:40px;" type="text" class="form-control @error('element_title') is-invalid @enderror" id="element_title" name="element_title" value="{{ old('element_title') }}">
                                                @error('element_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="benchmark" class="form-label my-text">Benchmark</label>
                                                <input style="width: 100%; height:40px;" type="text" class="form-control @error('benchmark') is-invalid @enderror" id="benchmark" name="benchmark" value="{{ old('benchmark') }}">
                                                @error('benchmark')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col ml-3 mtm-4">
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary" style="width: 70%; height:40px;">Tambah</button>
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
                                                <th>Element Title</th>
                                                <th>Benchmark</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($element as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->element_title }}</td>
                                                <td>{{ $value->benchmark }}</td>
                                                <td align="center">
                                                    <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit->id }}/element/{{ $value->id }}/criteria" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit->id }}/element/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <a href="#" class="btn btn-danger btn-sm delete" schema-id="{{ $schema }}" category-id="{{ $category }}" unit-id="{{ $unit->id }}" element-id="{{ $value->id }}" element-title="{{ $value->element_title }}"><span class="ti-trash"></span></a>
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
            var element_title = $(this).attr('element-title');
            swal({
                    title: "Apakah Kamu Yakin?",
                    text: "Kamu akan menghapus data element dengan judul : "+element_title+"",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/category/"+category_id+"/schema/"+schema_id+"/unit/"+unit_id+"/element/"+element_id+""
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