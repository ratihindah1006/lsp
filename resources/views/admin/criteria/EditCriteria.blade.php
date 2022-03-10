@extends('layout.main')

@section('container')

    <div class="col-lg-8">
        <form method="post"
            action="/category/{{ $category->category_code }}/schema/{{ $schema->schema_code }}/unit/{{ $unit->unit_code }}/element/{{ $element->element_code }}/criteria/{{ $criteria->criteria_code }}">
            @method('put')
            @csrf
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Criteria</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="criteria_code" class="form-label">Kriteria Code</label>
                                            <input name="criteria_code" type="text"
                                                class="form-control @error('criteria_code') is-invalid @enderror"
                                                id="criteria_code"
                                                value="{{ old('criteria_code', $criteria->criteria_code) }}">
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
                                            <input type="text"
                                                class="form-control @error('criteria_title') is-invalid @enderror"
                                                id="criteria_title" name="criteria_title"
                                                value="{{ old('criteria_title', $criteria->criteria_title) }}">
                                            @error('criteria_title')
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
