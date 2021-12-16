@extends('layout.main')

@section('container')

<div class="col-lg-8">
  <form method="post" action="/category/{{$category->category_code}}/schema/{{$schema->schema_code}}/unit/{{$unit->unit_code}}/element/{{ $element->element_code }}">
    @method('put')
    @csrf
    <div class="limiter">
      <div class="container-form">
        <div class="wrap-form">
          <div class="input-form">
            <div class="row mt-5">
              <div class="justify">
                <div class="col-md-14">
                  <div class="card">
                    <div class="card-header text-center" style="width: 40rem;border: 5px double rgb(50, 116, 47);">
                      <h4 class="card-title">Edit Element</h4>
                    </div>
                    <div class="card-content-center">
                      <div class="card-body">
                        <form class="form form-vertical">
                          <div class="form-body">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="element_code" class="form-label"> Element Code</label>
                                  <input name="element_code" type="text" class="form-control @error('element_code') is-invalid @enderror" id="element_code" value="{{ old('element_code', $element->element_code) }}">
                                  @error('element_code')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="element_title" class="form-label">Element Title</label>
                                  <input type="text" class="form-control @error('element_title') is-invalid @enderror" id="element_title" name="element_title" value="{{ old('element_title', $element->element_title) }}">
                                  @error('element_title')
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