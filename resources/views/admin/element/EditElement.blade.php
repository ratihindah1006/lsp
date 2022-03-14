@extends('layout.main')

@section('container')

    <div class="col-lg-8">
        <form method="post"
            action="/category/{{ $category->id }}/schema/{{ $schema->id }}/unit/{{ $unit->id }}/element/{{ $element->id }}">
            @method('put')
            @csrf
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h3 class="card-title">Edit Element</h3>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="element_title" class="form-label">Element Title</label>
                                            <input type="text"
                                                class="form-control @error('element_title') is-invalid @enderror"
                                                id="element_title" name="element_title"
                                                value="{{ old('element_title', $element->element_title) }}">
                                            @error('element_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="benchmark" class="form-label">Benchmark</label>
                                            <input type="text"
                                                class="form-control @error('benchmark') is-invalid @enderror"
                                                id="benchmark" name="benchmark"
                                                value="{{ old('benchmark', $element->benchmark) }}">
                                            @error('benchmark')
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
