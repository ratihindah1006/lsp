@extends('layout.assessor')

@section('container')

<form method="POST" action="/assessor/muk01/update/{{ $assessi->id }}">
@csrf
<input type="hidden" id="assessiId" name="assessiId" value="{{ $assessi->id }}">
  <div class="container-fluid">
    <div class="row">
      <div class=col-lg-1></div>
        <div class="col-lg-10">
          <div class="card text-dark">
            <div class="card-header">
              <h5 class="card-title bold">FR-MUK-01 FORMULIR CEKLIS OBSERVASI UNTUK AKTIVITAS DITEMPAT KERJA ATAU TEMPAT KERJA SIMULASI</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
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
              </div>
              <h5 class="mt-5">PANDUAN BAGI ASESOR</h5>
              <ul class="mb-5" style="list-style: none;">
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Lengkapi nama unit kompetensi, elemen, dan kriteria unjuk kerja sesuai kolom dalam tabel.</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Istilah Acuan Pembanding dengan SOP/spesifikasi produk dari industri/organisasi dari tempat kerja atau simulasi tempat kerja.</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Beri tanda centang (V) pada kolom K jika Anda yakin asesi dapat melakukan/mendemonstrasikan tugas sesuai KUK, atau centang (V) pada kolom BK bila sebaliknya.</li>
                <li><span class="align-middle"><i class="fa fa-check text-info"></i></span> Penilaian Lanjut diisi bila hasil belum dapat disimpulkan, untuk itu gunakan metode lain sehingga keputusan dapat dibuat.</li>
              </ul>

              @foreach ($schema->unit_schemas as $unit)
              <div class="table-responsive">
                <table class="mb-3" style="min-width: 100%" border="3">
                  <tr class="font-weight-bold">
                    <td>Kode Unit</td>
                    <td colspan="4">: {{ $unit->unit->unit_code }}</td>
                  </tr>
                  <tr class="font-weight-bold">
                    <td>Judul Unit</td>
                    <td class="font-weight-bold" colspan="4">: {{ $unit->unit->unit_title }}</td>
                  </tr>
                  <tr class="text-center font-weight-bold">
                    <td rowspan="2"></td>
                    <td rowspan="2">Benchmark(SOP) Spesifikasi Produk Industri</td>
                    <td colspan="2">Rekomendasi</td>
                    <td>Penilaian Lanjut</td>
                  </tr>
                  <tr class="text-center">
                    <td><span class="badge badge-success text-light">K</span></td>
                    <td><span class="badge badge-danger">BK</span></td>
                    <td><span class="badge badge-primary">PL</span></td>
                  </tr>
                  @foreach ($unit->unit->elements as $e)
                  <tr>
                    <td style="width: 50%">
                        <b>Element : {{ $e->element_title }}</b><br>
                        <b>Kriteria unjuk kerja: </b><br>
                        <ul style="list-style: none;">
                        @foreach ($e->criterias as $criteria)
                          <li>{{ $criteria->element->no_element.'.'.$criteria->no_criteria.' '.$criteria->criteria_title }}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td style="vertical-align: top">
                      Benchmark <br>
                      <a href="{{ $e->benchmark_url }}" class="text-primary" target="_blank"><u>{{ $e->benchmark }}</u></a>
                    </td>
                    <td class="text-center">
                        <div class="form-group m-0">
                          <label class="radio-inline">
                            <input type="radio" name="rekomendasi[{{ $e->id }}]" value="K"
                            @if (isset($assessi->muk01->rekomendasi[$e->id]) && $assessi->muk01->rekomendasi[$e->id] == "K")
                              {{ ' checked' }}
                            @endif
                            ></label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio" name="rekomendasi[{{ $e->id }}]" value="BK"
                            @if (isset($assessi->muk01->rekomendasi[$e->id]) && $assessi->muk01->rekomendasi[$e->id] == "BK")
                              {{ ' checked' }}
                            @endif
                            ></label>
                        </td>
                        <td class="text-center">
                          <label class="radio-inline">
                            <input type="radio" name="rekomendasi[{{ $e->id }}]" value="PL"
                            @if (isset($assessi->muk01->rekomendasi[$e->id]) && $assessi->muk01->rekomendasi[$e->id] == "PL")
                              {{ ' checked' }}
                            @endif
                            ></label>
                        </td>
                        </div>
                  </tr>
                  @endforeach
                </table>
              </div>
              @endforeach
              <div class="table-responsive">
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
                        @if (isset($assessi->muk01['assessi_agreement']))
                          @if($assessi->muk01['assessi_agreement'])
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
                        @if (isset($assessi->muk01['assessor_agreement']))
                          @if($assessi->muk01['assessor_agreement'])
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
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                class="btn-icon-right"><i class="fa fa-save"></i></span></button>
              <a href="/assessi/{{ $assessor_id }}" class="btn btn-outline-primary float-right mr-2">Kembali</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</form>
@endsection