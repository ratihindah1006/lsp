@extends('layout.main')

@section('container')

    <div class="col-lg-8">
        <form method="post" action="/category/{{ $category }}/schema">
            @csrf
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h3 class="card-title">Tambah Skema</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="schema_title" class="form-label">Judul Skema</label>
                                            <input type="text"
                                                class="form-control @error('schema_title') is-invalid @enderror"
                                                id="schema_title" name="schema_title" value="{{ old('schema_title') }}">
                                            @error('schema_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="no_skkni" class="form-label">No. Skkni</label>
                                            <input type="text"
                                                class="form-control @error('no_skkni') is-invalid @enderror"
                                                id="no_skkni" name="no_skkni" value="{{ old('no_skkni') }}">
                                            @error('no_skkni')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="competency_package" class="form-label">Kemasan Kompetensi</label>
                                            <select class="form-control @error('competency_package') is-invalid @enderror" id="competency_package"
                                                name="competency_package">
                                                <option value="">- - Pilih - -</option>
                                                <option value="KKNI">
                                                    KKNI</option>
                                                <option value="Okupasi Nasional">
                                                    Okupasi Nasional</option>
                                                <option value="Klaster">
                                                    Klaster</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="requirement" class="form-label">Persyaratan Dasar Permohonan</label>
                                            <input type="text"
                                                class="form-control @error('requirement') is-invalid @enderror"
                                                id="requirement" name="requirement" value="{{ old('requirement') }}">
                                            @error('requirement')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="cost" class="form-label">Biaya</label>
                                            <input type="text"
                                                class="form-control @error('cost') is-invalid @enderror"
                                                id="cost" name="cost" value="{{ old('cost') }}">
                                            @error('cost')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <center><button type="submit" class="btn btn-success mt-4"
                                                style="width: 170px">Submit</button></center>
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
