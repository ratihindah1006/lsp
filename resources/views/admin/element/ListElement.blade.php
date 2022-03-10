@extends('layout.main')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Elemen</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema">Skema</a></li>
                    <li class="breadcrumb-item"><a href="/category/{{ $category }}/schema/{{ $schema }}/unit">
                            Unit</a></li>
                    <li class="breadcrumb-item active"><a
                            href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element">
                            Elemen</a></li>
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
                            <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/create"
                                class="btn btn-primary btn-sm"><i
                                    class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive my-text">
                                        <table class="display" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Element Code</th>
                                                    <th>Element Title</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($element as $value)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $value->element_code }}</td>
                                                        <td>{{ $value->element_title }}</td>
                                                        <td>
                                                            <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $value->element_code }}/criteria"
                                                                class="btn btn-primary btn-sm"><span
                                                                    class="ti-info"></span></a>
                                                            <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $value->element_code }}/edit"
                                                                class="btn btn-warning btn-sm"><span
                                                                    class="ti-pencil"></span></a>
                                                            <form
                                                                action="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $value->element_code }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm border-0"
                                                                    onclick="return confirm('Yakin ingin menghapus data?')"><span
                                                                        class="ti-trash"></span>
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
    @endsection
