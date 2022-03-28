@extends('layout.main')

@section('container')
    <form method="post" action="/KelasSkema/{{ $class }}/dataAsesi/{{ $assessis->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Data Asesi</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nama Asesi</label>
                                            <select style="width: 100%; height:40px;" name="data_assessi_id"
                                                id="data_assessi_id"
                                                class="form-control maximum-search-length @error('data_assessi_id') is-invalid @enderror">
                                                <option value=""></option>
                                                @foreach ($data_assessi as $assessi)
                                                    <option value="{{ $assessi->id }}"
                                                        {{ old('data_assessi_id', $assessis->data_assessi_id) == $assessi->id ? 'selected' : null }}>
                                                        {{ $assessi->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('data_assessor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="assessor_id" class="form-label">Nama Asesor</label>
                                            <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id"
                                                class="form-control maximum-search-length @error('assessor_id') is-invalid @enderror">
                                                <option value=""></option>
                                                @foreach ($assessor as $assessor)
                                                    <option value="{{ $assessor->id }}"
                                                        {{ old('assessor_id', $assessis->assessor_id) == $assessor->id ? 'selected' : null }}>
                                                        {{ $assessor->data_assessor->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('assessor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="card-footer mb-3">
                                            <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                            <a href="/KelasSkema/{{ $class }}/dataAsesi"
                                                class="btn btn-outline-primary float-right mr-2">Batal</a>
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
