@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Ubah Password</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="">Ubah Password</a>
                </li>
            </ol>
        </div>
    </div>
    <div class=
    <form action="/edit_password_admin" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card text-dark mt-5 pt-4">
                            <center><h4>Ubah Password</h4></center>
                        &emsp;&emsp;
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Password Sekarang</label>
                            <div class=" col-lg-8">
                                <input type="password" class="form-control  @error('current_password') is-invalid @enderror"
                                    name="current_password" id="current_password">
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Password Baru</label>
                            <div class=" col-lg-8">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                    name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Konfirmasi Password Baru</label>
                            <div class=" col-lg-8">
                                <input type="password"
                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right mr-3">Save <span class="btn-icon-right"><i
                                        class="fa fa-save"></i></span></button>
                            <a href="/beranda" class="btn btn-outline-primary float-right mr-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
