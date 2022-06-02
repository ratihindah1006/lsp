@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Asesor</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dataAssessor">Asesor</a></li>
                <li class="breadcrumb-item"><a href="">Edit Asesor</a></li>
            </ol>
        </div>
    </div>
    <form method="post" action="/dataAssessor/{{ $data_assessor->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card">
            <div class="col-md-14">
                    <div class="card-content-center">
                        <div class="card-body" style="width: auto; ">
                            <div class="col-xl-12 col-xxl-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $data_assessor->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_met" class="form-label">No MET</label>
                                            <input name="no_met" type="text"
                                                class="form-control @error('no_met') is-invalid @enderror" id="no_met"
                                                value="{{ old('no_met', $data_assessor->no_met) }}">
                                            @error('no_met')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $data_assessor->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="assessor_signature" class="form-label">Tanda Tangan</label>
                                            <input type="file" class="form-control @error('assessor_signature') is-invalid @enderror"
                                                id="assessor_signature" name="assessor_signature" value="{{ old('assessor_signature', $data_assessor->assessor_signature) }}">
                                                <div class="input-group mb-3">
                                                    <img src="{{ asset('storage/' . $data_assessor->assessor_signature) }}"
                                                        style="margin-left:auto;margin-right:auto;display:block;width:200px">
                                                </div>
                                            @error('assessor_signature')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="card-footer mb-3">
                                            <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                            <a href="/dataAssessor" class="btn btn-outline-primary float-right mr-2">Batal</a>
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
