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
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="post" action="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 ml-5">
                                            <div class="form-group row">
                                                <label for="criteria_title" class="form-label my-text">Judul Kriteria</label>
                                                <input type="text" class="form-control @error('criteria_title') is-invalid @enderror" id="criteria_title" name="criteria_title" value="{{ old('criteria_title') }}" cols="40" rows="5">
                                                @error('criteria_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;

                                        <div class="col">
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary mt-4" style="width: 170px">Tambah</button>
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
                                                    <form action="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria/{{ $value->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span class="ti-trash"></span>
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
        @endsection