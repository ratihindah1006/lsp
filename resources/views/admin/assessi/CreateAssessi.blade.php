@extends('layout.main')

@section('container')

<div class="col-lg-8">
    <form method="post" action="/dataAssessi">
        @csrf
        <div class="limiter">
            <div class="container-form">
                <div class="wrap-form">
                    <div class="input-form">
                        <div class="row mt-5">
                            <div class="justify">
                                <div class="col-md-14">
                                    <div class="card" >
                                        <div class="card-header text-center" style="width: 40rem;border: 5px double rgb(50, 116, 47);">
                                            <h4 class="card-title">Tambah Data Asesi</h4>
                                        </div>
                                        <div class="card-content-center">
                                            <div class="card-body">
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="name" class="form-label">Nama</label>
                                                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                                                                    @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                                                    @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input name="password" type="text" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                                                                    @error('password')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="schema_code" class="form-label">Schema Code</label>
                                                                    <input name="schema_code" type="text" class="form-control @error('schema_code') is-invalid @enderror" id="schema_code" value="{{ old('schema_code') }}">
                                                                    @error('schema_code')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <center><button type="submit" class="btn btn-success mt-4" style="width: 170px">Submit</button></center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection