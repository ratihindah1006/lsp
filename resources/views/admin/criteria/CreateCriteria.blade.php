@extends('layout.main')

@section('container')

<div class="col-lg-8">
  <form method="post" action="/category/{{ $category }}/schema/{{$schema}}/unit/{{ $unit }}/element/{{ $element }}/criteria">
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
                      <h4 class="card-title">Create Criteria</h4>
                    </div>
                    <div class="card-content-center">
                      <div class="card-body">
                        <form class="form form-vertical">
                          <div class="form-body">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="criteria_code" class="form-label">Kriteria Code</label>
                                  <input name="criteria_code" type="text" class="form-control @error('criteria_code') is-invalid @enderror" id="criteria_code" value="{{ old('criteria_code') }}">
                                  @error('criteria_code')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="criteria_title" class="form-label">Kriteria Title</label>
                                  <textarea type="text" class="form-control @error('criteria_title') is-invalid @enderror" id="criteria_title" name="criteria_title" value="{{ old('criteria_title') }}" cols="40" rows="5"></textarea>
                                  @error('criteria_title')
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