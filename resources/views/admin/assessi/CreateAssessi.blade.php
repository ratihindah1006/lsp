@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Asesi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/KelasSkema">Kelas Skema</a></li>
                <li class="breadcrumb-item active"><a href="/KelasSkema/{{ $class }}/dataAsesi">Asesi</a></li>
                <li class="breadcrumb-item active"><a href="/KelasSkema/{{ $class }}/dataAsesi/create">Tambah Asesi</a></li>
            </ol>
        </div>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/KelasSkema/{{ $class }}/dataAsesi">
            @csrf
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-content-center">
                                <div class="card-body" style="width: 50rem; ">
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesi</label>
                                          <select class="form-control maximum-search-length @error('data_assessi_id') is-invalid @enderror" style="width: 100%; height:40px;" name="data_assessi_id" id="data_assessi_id">
                                            <option value=""></option>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id" class="form-control maximum-search-length @error('assessor_id') is-invalid @enderror">
                                            <option value=""></option>
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