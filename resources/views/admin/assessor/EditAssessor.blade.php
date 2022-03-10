@extends('layout.main')

@section('container')
    <form method="post" action="/KelasSkema/{{ $class->id }}/dataAsesor/{{ $assessors->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Data Asesor</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">
                                <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="data_assessor_id" id="data_assessor_id" class="form-control maximum-search-length @error('data_assessor_id') is-invalid @enderror">
                                            <option value=""></option>
                                            @foreach ($data_assessor as $assessor)
                                            <option value="{{ $assessor->id }}" {{ old('data_assessor_id', $assessors->data_assessor_id) == $assessor->id ? 'selected' : null }}>{{ $assessor->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('data_assessor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col">
                                            <center><button type="submit" class="btn btn-success mt-4"
                                                    style="width: 170px">Submit</button>
                                            </center>
                                        </div>
                                    </div>
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


