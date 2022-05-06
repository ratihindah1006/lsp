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
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/unit">
                        Unit</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/unit/{{ $unit->id }}/element">
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
                        <form method="post" action="/category/{{ $category }}/unit/{{ $unit->id }}/element">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-1 ml-5">
                                            <div class="form-group row">
                                                <label for="no_element" class="form-label my-text">No Element</label>
                                                <input type="text" class="form-control @error('no_element') is-invalid @enderror" id="no_element" name="no_element" value="{{ old('element_title') }}">
                                                @error('no_element')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col-3">
                                            <div class="form-group row">
                                                <label for="element_title" class="form-label my-text">Judul Element</label>
                                                <input type="text" class="form-control @error('element_title') is-invalid @enderror" id="element_title" name="element_title" value="{{ old('element_title') }}">
                                                @error('element_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col-2">
                                            <div class="form-group row">
                                                <label for="benchmark" class="form-label my-text">Judul Benchmark</label>
                                                <input type="text" class="form-control @error('benchmark') is-invalid @enderror" id="benchmark" name="benchmark" value="{{ old('benchmark') }}">
                                                @error('benchmark')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>&emsp;
                                        <div class="col-2">
                                            <div class="form-group row">
                                                <label for="benchmark_url" class="form-label my-text">Benchmark Link</label>
                                                <input type="url" class="form-control @error('benchmark_url') is-invalid @enderror" id="benchmark_url" name="benchmark_url" value="{{ old('benchmark_url') }}">
                                                @error('benchmark_url')
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
                                                <td>{{ $value->no_element }}</td>
                                                <td>{{ $value->element_title }}</td>
                                                <td>{{ $value->benchmark }}</td>
                                                <td align="center">
                                                    <a href="/category/{{ $category }}/unit/{{ $unit->id }}/element/{{ $value->id }}/criteria" class="btn btn-primary btn-sm"><span class="ti-info"></span></a>
                                                    <a href="/category/{{ $category }}/unit/{{ $unit->id }}/element/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <form action="/category/{{ $category }}/unit/{{ $unit->id }}/element/{{ $value->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->element_title}}"><span class="ti-trash"></span>
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