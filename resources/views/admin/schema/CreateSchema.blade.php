@extends('layout.main')

@section('container')

    <div class="col-lg-8">
        <form method="post" action="/category/{{ $category_code }}/schema">
            @csrf
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h3 class="card-title">Create Schema</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="schema_code" class="form-label">Schema Code</label>
                                            <input name="schema_code" type="text"
                                                class="form-control @error('schema_code') is-invalid @enderror"
                                                id="schema_code" value="{{ old('schema_code') }}">
                                            @error('schema_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="schema_title" class="form-label">Schema Title</label>
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
