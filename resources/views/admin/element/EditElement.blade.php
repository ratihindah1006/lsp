@extends('layout.main')

@section('container')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Element</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/unit"> Unit</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/unit/{{ $unit->id }}/element">Element</a></li>
                <li class="breadcrumb-item"><a href="">Edit Data Element</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <form method="post" action="/category/{{ $category->id }}/unit/{{ $unit->id }}/element/{{ $element->id }}">
        @method('put')
        @csrf
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h3 class="card-title">Edit Element</h3>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="no_element" class="form-label">No Element</label>
                                    <input type="text" class="form-control @error('no_element') is-invalid @enderror" id="no_element" name="no_element" value="{{ old('no_element', $element->no_element) }}">
                                    @error('no_element')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="element_title" class="form-label">Judul Element</label>
                                    <input type="text" class="form-control @error('element_title') is-invalid @enderror" id="element_title" name="element_title" value="{{ old('element_title', $element->element_title) }}">
                                    @error('element_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="benchmark" class="form-label">Judul Benchmark</label>
                                    <input type="text" class="form-control @error('benchmark') is-invalid @enderror" id="benchmark" name="benchmark" value="{{ old('benchmark', $element->benchmark) }}">
                                    @error('benchmark')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="benchmark" class="form-label">Benchmark Link</label>
                                    <input type="url" class="form-control @error('benchmark_url') is-invalid @enderror" id="benchmark_url" name="benchmark_url" value="{{ old('benchmark_url', $element->benchmark_url) }}">
                                    @error('benchmark_url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="card-footer mb-3">
                                    <button type="submit" class="btn btn-warning float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                    <a href="/category/{{ $category->id }}/unit/{{ $unit->id }}/element" class="btn btn-outline-primary float-right mr-2">Batal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection