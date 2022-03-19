@extends('layout.main')

@section('container')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data KUK</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category->id }}/schema">Skema</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit"> Unit</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}/element">Element</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}/element/{{ $element->id }}/criteria">Kriteria</a></li>
                <li class="breadcrumb-item"><a href="">Edit Data KUK</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <form method="post" action="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}/element/{{ $element->id }}/criteria/{{ $criteria->id }}">
        @method('put')
        @csrf
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h4 class="card-title">Edit Kriteria Unjuk Kerja</h4>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="criteria_title" class="form-label">Judul Kriteria</label>
                                    <textarea type="text" class="form-control @error('criteria_title') is-invalid @enderror" id="criteria_title" name="criteria_title">{{ ($criteria->criteria_title) }}</textarea>
                                    @error('criteria_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="card-footer mb-3">
                                    <button type="submit" class="btn btn-warning float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                    <a href="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}/element/{{ $element->id }}/criteria" class="btn btn-outline-primary float-right mr-2">Batal</a>
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