@extends('layout.main')

@section('container')


    <div class="col-lg-8">
        <form method="post" action="/KelasSkema/{{ $class->id }}/dataAsesi">
            @csrf
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Tambah Data Asesi</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="assessi_id" id="assessi_id" class="form control select2">
                                            <option value="">Pilih Asesi</option>
                                            @foreach ($assessi as $assessi)
                                            <option value="{{ $assessi->id }}" {{ old("assessi_id") == $assessi->id ? 'selected' : null }}>{{ $assessi->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('assessi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id" class="form control select2">
                                            <option value="">Pilih Asesor</option>
                                            @foreach ($assessor as $assessor)
                                            <option value="{{ $assessor->id }}" {{ old("assessor_id") == $assessor->id ? 'selected' : null }}>{{ $assessor->data_assessor->name }}</option>
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