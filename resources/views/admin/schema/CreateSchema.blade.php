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

    <form method="post" action="/skema">
        @csrf
        <div class="card">
            <div class="col-md-14">
                <div class="card-content-center">
                    <div class="card-body" style="width: auto;">
                        <div class="form-group">
                            <label for="schema_code" class="form-label">Kode Skema</label>
                            <input type="text" class="form-control @error('schema_code') is-invalid @enderror" id="schema_code" name="schema_code" value="{{ old('schema_code') }}">
                            @error('schema_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <a href="/skema" class="btn btn-outline-primary float-right mr-2">Batal</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection