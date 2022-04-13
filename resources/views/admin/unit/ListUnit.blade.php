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
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/unit"> Unit</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Kategori : {{ $category->category_title }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <form method="post" action="/category/{{ $category->id }}/unit">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 ml-5">
                                            <div class="form-group row">
                                                <label for="unit_code" class="form-label">Kode Unit</label>
                                                <input name="unit_code" type="text" class="form-control @error('unit_code') is-invalid @enderror" id="unit_code" value="{{ old('unit_code') }}">
                                                @error('unit_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="unit_title" class="form-label">Judul Unit</label>
                                                <input type="text" class="form-control @error('unit_title') is-invalid @enderror" id="unit_title" name="unit_title" value="{{ old('unit_title') }}">
                                                @error('unit_title')
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
                                                    <a href="/category/{{ $category->id }}/unit/{{ $value->id }}/element" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/category/{{ $category->id }}/unit/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <form action="/category/{{ $category->id }}/unit/{{ $value->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->unit_title}}"><span class="ti-trash"></span>
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