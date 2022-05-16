@extends('layout.main')

@section('container')

<div class="container-fluid">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>{{ $title }} Skema <div class="text-danger d-inline"> {{ $schema }} </div> Kode <div class="text-danger d-inline">{{ $code_praktik->code_praktik_name }}</div></h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/soalpraktik">{{ $title }}</a></li>
          </ol>
      </div>
  </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="post" action="/soalpraktik" enctype="multipart/form-data">
      @method('put')
      @csrf
      <input type="hidden" id="codeId" name="codeId" value="{{ $code_praktik->id }}">
      <div class="row">
          <div class="col-xl-12 col-xxl-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Instruksi</h4>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <textarea class="summernote form-control @error('instruksi') is-invalid @enderror" name="instruksi" required>{{ old('instruksi', $soal_praktik->instruksi ?? null) }}</textarea>
                          @error('instruksi')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
              </div>
          </div>

          <button type="submit" class="btn btn-primary mx-auto mb-3">Tambah/Update</button>
      </div>
  </form>
</div>

@endsection