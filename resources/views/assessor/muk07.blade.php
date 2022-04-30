@extends('layout.assessor')

@section('container')

<form method="post" action="/assessor/muk07/update">
  @csrf
  <input type="hidden" id="assessiId" name="assessiId" value="{{ $assessi->id }}">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1"></div>
        <div class="col-lg-12">
          <div class="card text-dark">
            <div class="card-header">
              <h5 class="card-title bold">FR-IA-07 PERTANYAAN LISAN</h5>
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
              
              <ul class="mt-5 mb-4 list-icons">
                <p class="font-weight-bold">PANDUAN BAGI ASESOR: Instruksi</p>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Ajukan pertanyaan kepada Asesi dari daftar terlampir untuk mengonfirmasi pengetahuan, sebagaimana diperlukan.</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Tempatkan centang di kotak untuk mencerminkan prestasi Asesi (Kompeten 'K' atau Belum Kompeten 'BK').</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Tulis jawaban Asesi secara singkat di tempat yang disediakan untuk setiap pertanyaan.</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Ceklist kolom tandatangan sebagai bukti rekaman mengumpulkan bukti tambahan pertanyaan lisan</li>
              </ul>
  
              @foreach ($schema->unit_schemas as $unit)
              <table style="min-width: 100%" class="p-0" border="3">
                <tr>
                  <td rowspan="2" style="width: 2%">{{ $loop->iteration }} </td>
                  <td rowspan="2" style="width: 30%">Kode Unit</td>
                  <td  style="width: 20%">Unit Kompetensi</td>
                  <td>{{ $unit->unit->unit_code }}</td>
                </tr>
                <tr>
                  <td>Judul Unit</td>
                  <td>{{ $unit->unit->unit_title }}</td>
                </tr>
              </table>
  
              <table class="mt-1 mb-5 fixed" style="min-width: 100%" border="3">
                <tr>
                  <th style="width: 45%" rowspan="2">Pertanyaaan</th>
                  <th style="width: 45%" rowspan="2">Jawaban</th>
                  <th colspan="2" class="text-center">Rekomendasi</th>
                </tr>
                <tr class="text-center font-weight-bold">
                  <td>K</td>
                  <td>BK</td>
                </tr>
                <tr>
                  <td class="p-2" bgcolor="lightgray" style="vertical-align:top;">
                    <b><u>Pertanyaan: </u></b> <br><br>
                    @foreach ($unit->pertanyaan_lisans->where('code_lisan_id', $schema_class->code_lisan_id) as $q)
                      @if (isset($q))
                        <span style="background-color:yellow;" class="font-weight-bold">{{ $q->no_soal }}</span> <br><br>
                        {!! $q->question !!} <br>
                      @else
                        
                      @endif
                    @endforeach 
                    <hr>
                    <b><u>Kunci Jawaban: </u></b><br><br>
                    @foreach ($unit->pertanyaan_lisans->where('code_lisan_id', $schema_class->code_lisan_id) as $q)
                      @if (isset($q))
                        <span style="background-color:yellow;" class="font-weight-bold">{{ $q->no_soal }}</span> <br><br>
                        {!! $q->key_answer !!} <br>
                      @else
                
                      @endif
                    @endforeach 
                  </td>
                  <input type="hidden" id="unitId" name="unitId[]" value="{{ $unit->id }}">
                  <input type="hidden" id="codeId" name="codeId" value="{{ $schema_class->code_lisan_id }}">
                  <td style="vertical-align:top;">
                    <div class="form-group">
                      <textarea class="summernote form-control @error('answer[]') is-invalid @enderror" name="answer[{{ $loop->index }}]">
                        @if(!$answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->isEmpty())
                        {{ $answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->first()->answer }}
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
                          @if(!$answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->where('rekomendasi', '===',  NULL)->first() && $answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->where('rekomendasi', '===',  1)->first())
                          {{ ' checked' }}
                          @endif
                          ></label>
                    </td>
                    <td class="text-center" style="vertical-align:top;">     
                      <label class="radio-inline">
                          <input type="radio" name="rekomendasi[{{ $loop->index }}]" value="BK"
                          @if(!$answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->where('rekomendasi', '===',  NULL)->first() && $answer->where('code_lisan_id', $schema_class->code_lisan_id)->where('unit_id', $unit->id)->where('rekomendasi', '===',  0)->first())
                          {{ ' checked' }}
                          @endif
                          ></label>
                    </td>
                  </div>
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
                      <input type="checkbox" class="custom-control-input" name="assessi_agreement" id="assessi_agreement" required
                      @if (isset($assessi->ia07['assessi_agreement']))
                        @if($assessi->ia07['assessi_agreement'])
                          {{ 'checked' }}          
                        @endif        
                      @endif>
                      <label class="custom-control-label" for="assessi_agreement"></label>
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
                  <td class="font-weight-bold">{{ $assessor->name }} 
                    <div class="custom-control custom-switch d-inline ml-2">
                      <input type="checkbox" class="custom-control-input" name="assessor_agreement" id="assessor_agreement" required
                      @if (isset($assessi->ia07['assessor_agreement']))
                        @if($assessi->ia07['assessor_agreement'])
                          {{ 'checked' }}          
                        @endif        
                      @endif>
                      <label class="custom-control-label" for="assessor_agreement"></label>
                    </div>  
                  </td>
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
                <a href="/list" class="btn btn-outline-primary float-right mr-2">Kembali</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</form>

@endsection