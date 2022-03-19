@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Kategori</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="">Edit Data Kategori</a></li>
            </ol>
        </div>
    </div>
</div>
<form method="post" action="/category/{{ $category->id }}">
    @method('put')
    @csrf
    <div class="col-lg-8">
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_title" class="form-label">Judul Kategori</label>
                                    <input type="text" class="form-control @error('category_title') is-invalid @enderror" id="category_title" name="category_title" value="{{ old('category_title', $category->category_title) }}">
                                    @error('category_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="field_title" class="form-label">Judul Bidang</label>
                                    <input type="text" class="form-control @error('field_title') is-invalid @enderror" id="field_title" name="field_title" value="{{ old('field_title', $category->field_title) }}">
                                    @error('field_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="card-footer mb-3">
                                    <button type="submit" class="btn btn-warning float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                    <a href="/category" class="btn btn-outline-primary float-right mr-2">Batal</a>
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