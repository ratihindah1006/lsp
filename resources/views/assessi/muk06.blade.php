@extends('layout.assessi')

@section('container')

<form method="post" action="/assessi/muk06/store" enctype="multipart/form-data">
@csrf
<div class="container-fluid">
  <div class="row">
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
                  <td class="font-weight-bold">{{ $schema->schema_title }}</td>
                </tr>
                <tr>
                  <td>Nomor</td>
                  <td>: &nbsp;</td>
                  <td class="font-weight-bold">{{ $schema->schema_code }}</td>
                </tr>
                <tr>
                  <td colspan="2">TUK</td>
                  <td>: &nbsp;</td>
                  <td class="font-weight-bold">{{ $schema_class->tuk }}</td>
                </tr>
                <tr>
                  <td colspan="2">Nama Assesor</td>
                  <td>: &nbsp;</td>
                  <td class="font-weight-bold">{{ $assessor->name }}</td>
                </tr>
                <tr>
                  <td colspan="2">Nama Peserta</td>
                  <td>: &nbsp;</td>
                  <td class="font-weight-bold">{{ $assessi->data_assessi->name }}</td>
                </tr>
                <tr>
                  <td colspan="2">Tanggal</td>
                  <td>: &nbsp;</td>
                  <td class="font-weight-bold">{{ $schema_class->date }}</td>
                </tr>
              </table>
              
              <ul class="mt-5 mb-4">
                <p>Peserta diminta untuk:</p>
                <li>- Membaca dengan seksama soal essay yang diberikan</li>
                <li>- Menjawab pada kolom jawaban secara singkat dan jelas</li>
              </ul>

              @foreach ($schema->unit_schemas as $unit)
              <table style="min-width: 100%" class="p-0" border="3">
                <tr>
                  <td rowspan="2">{{ $loop->iteration }} </td>
                  <td rowspan="2" style="width: 30%">Kode Unit</td>
                  <td  style="width: 20%">Unit Kompetensi</td>
                  <td>{{ $unit->unit->unit_code }}</td>
                </tr>
                <tr>
                  <td>Judul Unit</td>
                  <td>{{ $unit->unit->unit_title }}</td>
                </tr>
              </table>

              <table class="mt-1 mb-5 fixed" border="3">
                <tr>
                  <th style="width: 50%">Pertanyaaan</th>
                  <th style="width: 50%">Jawaban</th>
                </tr>
                <tr>
                  <td class="p-2" bgcolor="lightgray" style="vertical-align:top; min-width: 50%;">
                    <b><u>Pertanyaan: </u></b> <br><br>
                    @foreach ($unit->questions->where('code_id', $schema_class->code_id) as $q)
                      @if (isset($q))
                        <span style="background-color:yellow;" class="font-weight-bold">{{ $q->no_soal }}</span> <br><br>
                        {!! $q->question !!} <br>
                      @else

                      @endif
                    @endforeach 
                  </td>
                  <input type="hidden" id="assessiId" name="assessiId[]" value="{{ $assessi->id }}">
                  <input type="hidden" id="unitId" name="unitId[]" value="{{ $unit->id }}">
                  <input type="hidden" id="codeId" name="codeId[]" value="{{ $schema_class->code_id }}">
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
              <p class="mt-5 mb-0">Note ***) diisi oleh Assessor</p>
              <table style="min-width: 100%" border="3">
                <tr class="font-weight-bold">
                  <td colspan="2">Pemohon **)</td>
                </tr>
                <tr>
                  <td style="vertical-align: top" width="40%" rowspan="2">Nama</td>
                  <td class="font-weight-bold">{{ $assessi->data_assessi->name }}
                    <div class="custom-control custom-switch d-inline ml-2">
                      <input type="checkbox" class="custom-control-input" id="assessi_switch" required>
                      <label class="custom-control-label" for="assessi_switch"></label>
                    </div> 
                  </td>
                </tr>
                <tr>
                  <td><img class="txt" src="{{ asset('storage/' . $assessi->apl01->assessi_signature) }}"
                    height="100px"></td>
                </tr>
                <tr class="font-weight-bold">
                  <td colspan="2">Assessor ***)</td>
                </tr>
                <tr>
                  <td style="vertical-align: top" rowspan="2">Nama</td>
                  <td class="font-weight-bold">{{ $assessor->name }}</td>
                </tr>
                <tr>
                  <td><img class="txt" src="{{ asset('storage/' . $assessi->apl01->assessor_signature) }}"
                    height="100px"></td>
                </tr>
                <tr>
                  <td>No. Registrasi</td>
                  <td class="font-weight-bold">{{ $assessor->no_met }}</td>
                </tr>
              </table>             
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                class="btn-icon-right"><i class="fa fa-save"></i></span></button>
              <a href="/beranda" class="btn btn-outline-primary float-right mr-2">Kembali</a>
            </div>
        </div>
      </div>
  </div>
</div>
</form>

@endsection