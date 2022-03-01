@extends('layout.main')

@section('container')

    <div class="col-lg-8">
        <form method="post" action="/KelasSkema/{{ $class }}/dataAsesor">
            @csrf
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Tambah Data Asesor</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">
                                <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="data_assessor_id" id="data_assessor_id" class="form control select2">
                                            <option value="">Pilih Asesor</option>
                                            @foreach ($assessor as $assessor)
                                            <option value="{{ $assessor->id }}" {{ old("assessor_id") == $assessor->id ? 'selected' : null }}>{{ $assessor->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('assessor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <center><button type="submit" class="btn btn-success mt-4"
                                                style="width: 100px">Submit</button></center>
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
