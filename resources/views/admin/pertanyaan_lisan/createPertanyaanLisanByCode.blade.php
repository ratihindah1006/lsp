@extends('layout.main')

@push('styles')
    @livewireStyles
@endpush

@section('container')

<div class="container-fluid">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Tambah {{ $title }} Skema <div class="text-danger d-inline"> {{ $codeQuestionLisan->schema->schema_title }} </div> Kode <div class="text-danger d-inline">{{ $codeQuestionLisan->code_lisan_name }}</div></h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/soal">Tambah {{ $title }}</a></li>
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
  
    <form method="post" action="/soallisan" enctype="multipart/form-data">
        @csrf
          <input type="hidden" id="kode_soal" name="kode_soal" value="{{ $codeQuestionLisan->id }}">
          @livewire('drop-down-by-code-lisan', ['codeQuestionLisan' => $codeQuestionLisan])
    </form>
</div>

@endsection

@push('scripts')
    @livewireScripts
@endpush