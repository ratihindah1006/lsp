@extends('layout.main')

@section('container')

<div class="col-lg-8">
    <form method="post" action="/category">
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
                                            <h4 class="card-title">Create Schema</h4>
                                        </div>
                                        <div class="card-content-center">
                                            <div class="card-body">
                                                <form class="form form-vertical">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                  <label for="category_code" class="form-label">Category Code</label>
                                                                  <input name="category_code" type="text" class="form-control @error('category_code') is-invalid @enderror" id="category_code" value="{{ old('category_code') }}">
                                                                  @error('category_code')
                                                                  <div class="invalid-feedback">
                                                                      {{ $message }}
                                                                  </div>
                                                                  @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                  <label for="category_title" class="form-label">Category Title</label>
                                                                  <input type="text" class="form-control @error('category_title') is-invalid @enderror" id="category_title" name="category_title" value="{{ old('category_title') }}">
                                                                  @error('category_title')
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