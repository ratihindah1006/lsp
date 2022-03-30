@extends('layout.assessor')

@section('container')

<form method="post" action="/assessor/muk06/update">
  @csrf
  <input type="hidden" id="assessiId" name="assessiId" value="{{ $assessi->id }}">
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
                  <td>{{ $assessor }}</td>
                </tr>
                <tr>
                  <td colspan="2">Nama Peserta</td>
                  <td>: &nbsp;</td>
                  <td>{{ $assessi->data_assessi->name }}</td>
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
                  <td rowspan="2" style="width: 2%">{{ $loop->iteration }} </td>
                  <td rowspan="2" style="width: 30%">Kode Unit</td>
                  <td  style="width: 20%">Unit Kompetensi</td>
                  <td>{{ $unit->unit_code }}</td>
                </tr>
                <tr>
                  <td>Judul Unit</td>
                  <td>{{ $unit->unit_title }}</td>
                </tr>
              </table>
  
              <table class="mt-1 mb-5 fixed" style="min-width: 100%" border="3">
                <tr>
                  <th style="width: 45%" rowspan="2">Pertanyaaan</th>
                  <th style="width: 45%" rowspan="2">Jawaban</th>
                  <th colspan="2" class="text-center">Rekomendasi</th>
                </tr>
                <tr class="text-center">
                  <td>K</td>
                  <td>BK</td>
                </tr>
                <tr>
                  <td class="p-2" bgcolor="lightgray" style="vertical-align:top;">
                    <b><u>Pertanyaan: </u></b> <br><br>
                    @foreach ($unit->questions as $q)
                      @if (isset($q))
                        <span class="text-light bg-info">{{ $q->no_soal }}</span> <br><br>
                        {!! $q->question !!} <br>
                      @else

                      @endif
                    @endforeach 
                    <hr>
                    <b><u>Kunci Jawaban: </u></b><br><br>
                    @foreach ($unit->questions as $q)
                      @if (isset($q))
                        <span class="text-light bg-info">{{ $q->no_soal }}</span> <br><br>
                        {!! $q->key_answer !!} <br>
                      @else
                
                      @endif
                    @endforeach 
                  </td>
                  <input type="hidden" id="unitId" name="unitId[]" value="{{ $unit->id }}">
                  <td style="vertical-align:top;">
                    <div class="form-group">
                      <textarea class="summernote form-control @error('answer[]') is-invalid @enderror" name="answer[]">
                      @if(!$answer->where('unit_id', $unit->id)->isEmpty())
                        {{ $answer->where('unit_id', $unit->id)->first()->answer }}
                      @endif
                      </textarea>
                      @error('answer[]')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </td>
                  <div class="form-group">
                    <td class="text-center" style="vertical-align:top;">
                      <label class="radio-inline">
                          <input type="radio" name="rekomendasi[{{ $loop->index }}]" value="K"
                          @if(!$answer->where('unit_id', $unit->id)->isEmpty() && !$answer->where('rekomendasi')->isEmpty() && $answer->where('unit_id', $unit->id)->first()->rekomendasi == 1)
                            {{ ' checked' }}
                          @endif
                          ></label>
                    </td>
                    <td class="text-center" style="vertical-align:top;">     
                      <label class="radio-inline">
                          <input type="radio" name="rekomendasi[{{ $loop->index }}]" value="BK"
                          @if(!$answer->where('unit_id', $unit->id)->isEmpty() && !$answer->where('rekomendasi')->isEmpty() && $answer->where('unit_id', $unit->id)->first()->rekomendasi == 0)
                            {{ ' checked' }}
                          @endif
                          ></label>
                    </td>
                  </div>
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