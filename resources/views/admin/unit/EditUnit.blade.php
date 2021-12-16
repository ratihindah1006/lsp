@extends('layout.main')

@section('container')
<form method="post" action="/category/{{$category->category_code}}/schema/{{$schema->schema_code}}/unit/{{$unit->unit_code}}">
  @method('put')
  @csrf
  <div class="col-lg-8">
    <div class="limiter">
      <div class="container-form">
        <div class="wrap-form">
          <div class="input-form">
            <div class="row mt-5">
              <div class="justify">
                <div class="col-md-14">
                  <div class="card">
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
                                  <label for="unit_code" class="form-label">Unit Code</label>
                                  <input name="unit_code" type="text" class="form-control @error('unit_code') is-invalid @enderror" id="unit_code" value="{{ old('unit_code', $unit->unit_code) }}">
                                  @error('unit_code')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="unit_title" class="form-label">Unit Title</label>
                                  <input type="text" class="form-control @error('unit_title') is-invalid @enderror" id="unit_title" name="unit_title" value="{{ old('unit_title', $unit->unit_title) }}">
                                  @error('unit_title')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                                <div class="col">
                                  <center><button type="submit" class="btn btn-success mt-4" style="width: 170px">Submit</button></center>
                                </div>
                        </form>
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