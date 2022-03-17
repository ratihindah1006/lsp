@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Unit</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category->id }}/schema">Skema</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit"> Unit</a></li>
                <li class="breadcrumb-item"><a href="">Edit Data Unit</a></li>
            </ol>
        </div>
    </div>
</div>

    <form method="post"
        action="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center">
                <div class="row mt-1">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Unit</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                        <div class="form-group">
                                            <label for="unit_code" class="form-label">Kode Unit</label>
                                            <input name="unit_code" type="text"
                                                class="form-control @error('unit_code') is-invalid @enderror" id="unit_code"
                                                value="{{ old('unit_code', $unit->unit_code) }}">
                                            @error('unit_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_title" class="form-label">Judul Unit</label>
                                            <input type="text"
                                                class="form-control @error('unit_title') is-invalid @enderror"
                                                id="unit_title" name="unit_title"
                                                value="{{ old('unit_title', $unit->unit_title) }}">
                                            @error('unit_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <center><button type="submit" class="btn btn-warning mt-4"
                                                    style="width: 170px">Submit</button></center>
                                        </div>
                                    </div>
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
