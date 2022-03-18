@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Data Asesi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dataAssessi">Asesi</a></li>
                <li class="breadcrumb-item"><a href="">Edit Asesit</a></li>
            </ol>
        </div>
    </div>
    <form method="post" action="/dataAssessi/{{ $data_assessi->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-1">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-content-center">
                                <div class="card-body"  style="width: 50rem; ">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $data_assessi->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $data_assessi->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="text"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                value="{{ old('password', $data_assessi->password) }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="card-footer mb-3">
                                            <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                            <a href="/dataAssessi" class="btn btn-outline-primary float-right mr-2">Batal</a>
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
