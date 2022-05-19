@extends('layout.assessi')

@section('container')

<form method="post" action="/assessi/uploadpraktik" enctype="multipart/form-data">
@csrf
<input type="hidden" id="assessiId" name="assessiId" value="{{ $assessi }}">
<input type="hidden" id="codeId" name="codeId" value="{{ $code }}">
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="card text-dark">
          <div class="card-header">
            <h5 class="card-title">Form Upload Jawaban Soal Praktik</h5>
          </div>
            <div class="card-body">
              <div class="form-group">
                <label for="keterangan" class="font-weight-bold">Keterangan (opsional)</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="file_jawaban" class="font-weight-bold">Upload File</label>
                <input type="file" class="form-control-file @error('file_jawaban') is-invalid @enderror" id="file_jawaban" name="file_jawaban" required>
                <label class="text-danger font-weight-bold">*File Harus Berformat jpg | jpeg | png | pdf | doc | docx | pptx | ppt | xls | xlsx | zip | rar Max:2MB</label>
                @error('file_jawaban')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right mr-3">Upload <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
              <a href="/assessi/soalpraktik/{{ $assessi }}" class="btn btn-outline-primary float-right mr-2">Batal</a>
            </div>
        </div>
      </div>
  </div>
</div>
</form>

@endsection