@extends('layout.main')

@section('container')


<div class="container-fluid">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Tambah {{ $title }}</h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/{{ $title }}">{{ $title }}</a></li>
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
  
    <form method="post" action="/soal">
        @csrf
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="form-group">
                    <label for="skema" class="form-label">Skema</label>
                    <select class="form-control single-select"
                        name="skema" id="skema" required>
                        <option value="">--Pilih Skema--</option>
                        @foreach ($schemas as $schema)
                            <option value="{{ $schema->id }}">{{ $schema->schema_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xl-12 col-xxl-12">
                <div class="form-group">
                    <label for="unit" class="form-label">Unit</label>
                    <select class="form-control single-select"
                        name="unit" id="unit" required>
                        <option value="">--Pilih Unit--</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12 col-xxl-12">
                <div class="form-group">
                    <label for="element" class="form-label">Element</label>
                    <select class="form-control single-select"
                        name="element" id="element" required>
                        <option value="">--Pilih Element--</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pertanyaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="summernote form-control @error('question') is-invalid @enderror" name="question" required></textarea>
                            @error('question')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kunci Jawaban</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="summernote form-control @error('key_answer') is-invalid @enderror" name="key_answer" required></textarea>
                            @error('key_answer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mx-auto mb-3">Submit</button>
        </div>
    </form>
</div>


@endsection