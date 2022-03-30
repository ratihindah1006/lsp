@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/skema">Skema</a></li>
                <li class="breadcrumb-item"><a href="">Edit Data Skema</a></li>
            </ol>
        </div>
    </div>
</div>

<form method="post" action="/skema/{{ $schema->id }}">
    @method('put')
    @csrf
    <div class="col-lg-8">
        <div class="card-center">
            <div class="row mt-1">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h4 class="card-title">Edit Skema</h4>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Kategori</label>
                                    <select style="width: 100%; height:40px;" name="category_id" id="category_id" class="form-control maximum-search-length @error('category_id') is-invalid @enderror">
                                        <option value=""></option>
                                        @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}" {{ old('category_id', $schema->category_id) == $categorys->id ? 'selected' : null }}>
                                            {{ $categorys->category_title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="schema_title" class="form-label">Judul Skema</label>
                                    <input type="text" class="form-control @error('schema_title') is-invalid @enderror" id="schema_title" name="schema_title" value="{{ old('schema_title', $schema->schema_title) }}">
                                    @error('schema_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="competency_package" class="form-label">Kemasan Kompetensi</label>
                                    <select class="form-control @error('competency_package') is-invalid @enderror" id="competency_package" name="competency_package">

                                        <option value="KKNI" {{  $schema->competency_package == 'KKNI' ? 'selected' : '' }}>
                                            KKNI</option>
                                        <option value="Okupasi Nasional" {{  $schema->competency_package == 'Okupasi Nasional' ? 'selected' : '' }}>
                                            Okupasi Nasional</option>
                                        <option value="Klaster" {{  $schema->competency_package == 'Klaster' ? 'selected' : '' }}>
                                            Klaster</option>
                                    </select>
                                    @error('competency_package')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="requirement" class="form-label">Persyaratan Dasar Permohonan</label>
                                    <input type="text" class="form-control @error('requirement') is-invalid @enderror" id="requirement" name="requirement" value="{{ old('requirement', $schema->requirement) }}">
                                    @error('requirement')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cost" class="form-label">Biaya</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost', $schema->cost) }}">
                                    @error('cost')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="card-footer mb-3">
                                    <button type="submit" class="btn btn-warning float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                    <a href="/skema" class="btn btn-outline-primary float-right mr-2">Batal</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection