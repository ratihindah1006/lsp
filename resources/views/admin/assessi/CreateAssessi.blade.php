@extends('layout.main')

@section('container')


    <div class="col-lg-8">
        <form method="post" action="/dataAssessi">
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
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="text"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Judul Bidang</label>
                                          <select style="width: 100%; height:40px;" name="field_id" id="field_id" class="form control select2">
                                            <option value="">Pilih Bidang</option>
                                            @foreach ($field as $value)
                                            <option value="{{ $value->id }}" {{ old("field_id") == $value->id ? 'selected' : null }}>{{ $value->field_title }}</option>
                                            @endforeach
                                          </select>
                                          @error('field_id')
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
                                            @foreach ($assessor as $value)
                                            <option value="{{ $value->id }}" {{ old("assessor_id") == $value->id ? 'selected' : null }}>{{ $value->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('field_id')
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