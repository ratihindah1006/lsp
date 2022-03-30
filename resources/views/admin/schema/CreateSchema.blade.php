@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Data Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/schema">Skema</a></li>
                <li class="breadcrumb-item"><a href="">Tambah Data Skema</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <form method="post" action="/skema">
        @csrf
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h3 class="card-title">Tambah Skema</h3>
                        </div>
                        <div class="card-body">
                        <div class="col-12">
                                        <div class="form-group">
                                        <label>Judul Kategori</label>
                                          <select class="form-control maximum-search-length @error('category_id') is-invalid @enderror" style="width: 100%; height:40px;" name="category_id" id="category_id">
                                            <option value=""></option>
                                            @foreach ($category as $category)
                                            <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? 'selected' : null }}>{{ $category->category_title }}</option>
                                            @endforeach
                                          </select>
                                          @error('category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            <div class="form-group">
                                <label for="schema_title" class="form-label">Judul Skema</label>
                                <input type="text" class="form-control @error('schema_title') is-invalid @enderror" id="schema_title" name="schema_title" value="{{ old('schema_title') }}">
                                @error('schema_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="competency_package" class="form-label">Kemasan Kompetensi</label>
                                <select class="form-control @error('competency_package') is-invalid @enderror" id="competency_package" name="competency_package">
                                    <option value="">- - Pilih - -</option>
                                    <option value="KKNI">
                                        KKNI</option>
                                    <option value="Okupasi Nasional">
                                        Okupasi Nasional</option>
                                    <option value="Klaster">
                                        Klaster</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="requirement" class="form-label">Persyaratan Dasar Permohonan</label>
                                <input type="text" class="form-control @error('requirement') is-invalid @enderror" id="requirement" name="requirement" value="{{ old('requirement') }}">
                                @error('requirement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cost" class="form-label">Biaya</label>
                                <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost') }}">
                                @error('cost')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="card-footer mb-3">
                                <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                <a href="/category/{{ $category }}/schema" class="btn btn-outline-primary float-right mr-2">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection