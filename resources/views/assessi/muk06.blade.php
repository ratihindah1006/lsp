@extends('layout.assessi')

@section('container')

<form method="post" action="/assessi/muk06/store">
@csrf
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-1"></div>
      <div class="col-lg-12">
        <div class="card text-dark">
          <div class="card-header">
            <h5 class="card-title bold">FR-MUK-06 FORMULIR PERTANYAAN ESSAY</h5>
          </div>
          <div class="card-body">
            <table style="min-width: 100%" border="3">
              <tr>
                <td rowspan="2">Skema Sertifikasi/Klaster Asesmen</td>
                <td>Judul</td>
                <td>: &nbsp;</td>
                <td>{{ $schema->schema_title }}</td>
              </tr>
              <tr>
                <td>Nomor</td>
                <td>: &nbsp;</td>
                <td>{{ $schema->no_skkni }}</td>
              </tr>
              <tr>
                <td colspan="2">TUK</td>
                <td>: &nbsp;</td>
                <td>{{ $schema_class->tuk }}</td>
              </tr>
              <tr>
                <td colspan="2">Nama Assesor</td>
                <td>: &nbsp;</td>
                <td>{{ $assessor->name }}</td>
              </tr>
              <tr>
                <td colspan="2">Nama Peserta</td>
                <td>: &nbsp;</td>
                <td>{{ $assessi->name }}</td>
              </tr>
              <tr>
                <td colspan="2">Tanggal</td>
                <td>: &nbsp;</td>
                <td>{{ $schema_class->event->event_time }}</td>
              </tr>
            </table>
            
            <ul class="mt-5 mb-4">
              <p>Peserta diminta untuk:</p>
              <li>- Membaca dengan seksama soal essay yang diberikan</li>
              <li>- Menjawab pada kolom jawaban secara singkat dan jelas</li>
            </ul>

            @foreach ($schema->units as $unit)
            <table style="min-width: 100%" class="p-0" border="3">
              <tr>
                <td rowspan="2">{{ $loop->iteration }} </td>
                <td rowspan="2" style="width: 30%">Kode Unit</td>
                <td  style="width: 20%">Unit Kompetensi</td>
                <td>{{ $unit->unit_code }}</td>
              </tr>
              <tr>
                <td>Judul Unit</td>
                <td>{{ $unit->unit_title }}</td>
              </tr>
            </table>

            <table class="mt-1 mb-5 fixed" border="3">
              <tr>
                <th style="width: 50%">Pertanyaaan</th>
                <th style="width: 50%">Jawaban</th>
              </tr>
              <tr>
                <td class="p-2" bgcolor="lightgray" style="vertical-align:top; min-width: 50%;">
                  Pertanyaan: <br>
                  @foreach ($unit->elements as $e)
                      {!! $loop->iteration.'. '.$e->question['question'] !!}<br>
                  @endforeach 
                </td>
                <input type="hidden" id="assessiId" name="assessiId[]" value="{{ $assessi->id }}">
                <input type="hidden" id="unitId" name="unitId[]" value="{{ $unit->id }}">
                <td style="min-width: 50%; vertical-align:top;" class="p-0">
                  <div class="form-group">
                    <textarea class="summernote form-control @error('answer') is-invalid @enderror" name="answer[]" value="{{ old('answer') }}">
                      @if(!$answer->where('unit_id', $unit->id)->isEmpty())
                        {{ $answer->where('unit_id', $unit->id)->first()->answer }}
                      @endif
                    </textarea>
                    @error('answer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </td>
                <td>
                  
                </td>
              </tr>
            </table>
            @endforeach
          </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right mr-3">Save <span
                class="btn-icon-right"><i class="fa fa-save"></i></span></button>
              <a href="/beranda" class="btn btn-outline-primary float-right mr-2">Cancel</a>
          </div>
        </div>
      </div>
  </div>
</div>
</form>

@endsection