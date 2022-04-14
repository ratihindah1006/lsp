@extends('layout.main')

@section('container')

<div class="container-fluid">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Edit {{ $title }} Skema <div class="text-danger d-inline"> {{ $schema->schema_title }} </div> Kode <div class="text-danger d-inline">{{ $question->code->code_name }}</div></h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/soal">Edit {{ $title }}</a></li>
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
  
    <form method="post" action="/soal/{{ $question->id }}">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">KUK</h4>
                  </div>
                  <div class="card-body">
                    {{ $question->no_soal }}
                  </div>
              </div>
            </div>

            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pertanyaan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="summernote form-control @error('question') is-invalid @enderror" name="question" required>{{ old('question', $question->question) }}</textarea>
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
                            <textarea class="summernote form-control @error('key_answer') is-invalid @enderror" name="key_answer" required>{{ old('key_answer', $question->key_answer) }}</textarea>
                            @error('key_answer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mx-auto mb-3">Update</button>
        </div>
    </form>
</div>

@endsection