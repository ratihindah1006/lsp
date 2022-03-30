@extends('layout.main')

@section('container')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Data Unit</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/unit"> Unit</a></li>
                <li class="breadcrumb-item"><a href="">Tambah Data Unit</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <form method="post" action="/category/{{ $category }}/unit">
        @csrf
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h4 class="card-title">Tambah Unit</h4>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="unit_code" class="form-label">Kode Unit</label>
                                    <input name="unit_code" type="text" class="form-control @error('unit_code') is-invalid @enderror" id="unit_code" value="{{ old('unit_code') }}">
                                    @error('unit_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="unit_title" class="form-label">Judul Unit</label>
                                    <input type="text" class="form-control @error('unit_title') is-invalid @enderror" id="unit_title" name="unit_title" value="{{ old('unit_title') }}">
                                    @error('unit_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="card-footer mb-3">
                                    <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                    <a href="/category/{{ $category }}/unit" class="btn btn-outline-primary float-right mr-2">Batal</a>
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