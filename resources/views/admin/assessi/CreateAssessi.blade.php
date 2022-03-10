@extends('layout.main')

@section('container')
<<<<<<< HEAD


=======
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
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
                                        <label>Nama Asesi</label>
<<<<<<< HEAD
                                          <select style="width: 100%; height:40px;" name="data_assessi_id" id="data_assessi_id" class="form control select2">
                                            <option value="">Pilih Asesi</option>
=======
                                          <select class="form-control maximum-search-length @error('data_assessi_id') is-invalid @enderror" style="width: 100%; height:40px;" name="data_assessi_id" id="data_assessi_id">
                                            <option value=""></option>
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
                                            @foreach ($assessi as $assessi)
                                            <option value="{{ $assessi->id }}" {{ old("data_assessi_id") == $assessi->id ? 'selected' : null }}>{{ $assessi->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('data_assessi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
<<<<<<< HEAD


                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id" class="form control select2">
                                            <option value="">Pilih Asesor</option>
=======
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id" class="form-control maximum-search-length @error('assessor_id') is-invalid @enderror">
                                            <option value=""></option>
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
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
<<<<<<< HEAD
                                    
=======
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
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
<<<<<<< HEAD

=======
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
    </div>


@endsection