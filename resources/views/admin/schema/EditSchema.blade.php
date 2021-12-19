@extends('layout.main')

@section('container')
    <form method="post" action="/category/{{ $category->category_code }}/schema/{{ $schema->schema_code }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Create Schema</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="schema_code" class="form-label">Schema Code</label>
                                            <input name="schema_code" type="text"
                                                class="form-control @error('schema_code') is-invalid @enderror"
                                                id="schema_code" value="{{ old('schema_code', $schema->schema_code) }}">
                                            @error('schema_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="schema_title" class="form-label">Schema Title</label>
                                            <input type="text"
                                                class="form-control @error('schema_title') is-invalid @enderror"
                                                id="schema_title" name="schema_title"
                                                value="{{ old('schema_title', $schema->schema_title) }}">
                                            @error('schema_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
            </div>
        </div>
    </form>
  </div>

@endsection
