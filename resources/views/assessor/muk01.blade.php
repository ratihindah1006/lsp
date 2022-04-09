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
                  <td>{{ $schema->category->no_skkni }}</td>
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
                  <td>{{ $schema_class->date }}</td>
                </tr>
              </table>
              <h5 class="mt-5">PANDUAN BAGI ASESOR</h5>
              <ul class="mb-5">
                <li>- Lengkapi nama unit kompetensi, elemen, dan kriteria unjuk kerja sesuai kolom dalam tabel.</li>
                <li>- Istilah Acuan Pembanding dengan SOP/spesifikasi produk dari industri/organisasi dari tempat kerja atau simulasi tempat kerja.</li>
                <li>- Beri tanda centang (V) pada kolom K jika Anda yakin asesi dapat melakukan/mendemonstrasikan tugas sesuai KUK, atau centang (V) pada kolom BK bila sebaliknya.</li>
                <li>- Penilaian Lanjut diisi bila hasil belum dapat disimpulkan, untuk itu gunakan metode lain sehingga keputusan dapat dibuat.</li>
              </ul>

              @foreach ($schema->unit_schemas as $unit)
              {{-- @php 
                $i = 1; 
              @endphp --}}
              <table class="mb-3" style="min-width: 100%" border="3">
                <tr>
                  <td>Kode Unit</td>
                  <td colspan="4">: {{ $unit->unit->unit_code }}</td>
                </tr>
                <tr>
                  <td>Judul Unit</td>
                  <td colspan="4">: {{ $unit->unit->unit_title }}</td>
                </tr>
                <tr class="text-center">
                  <td rowspan="2"></td>
                  <td rowspan="2">Benchmark(SOP) Spesifikasi Produk Industri</td>
                  <td colspan="2">Rekomendasi</td>
                  <td>Penilaian Lanjut</td>
                </tr>
                <tr class="text-center">
                  <td><span class="badge badge-success">K</span></td>
                  <td><span class="badge badge-danger">BK</span></td>
                  <td><span class="badge badge-primary">PL</span></td>
                </tr>
                @foreach ($unit->unit->elements as $e)
                <tr>
                  <td style="width: 50%">
                      <b>Element : {{ $e->element_title }}</b><br>
                      <b>Kriteria unjuk kerja: </b><br>
                      <ul>
                      @foreach ($e->criterias as $criteria)
                        <li>{{ $criteria->element->no_element.'.'.$criteria->no_criteria.' '.$criteria->criteria_title }}</li>
                      @endforeach
                      </ul>
                      {{-- @php
                        $i++;
                      @endphp   --}}
                  </td>
                  <td style="vertical-align: top">
                    Benchmark <br>
                    {{ $e->benchmark }}
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
              @endforeach             
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-right mr-3">Save <span
                class="btn-icon-right"><i class="fa fa-save"></i></span></button>
              <a href="/list" class="btn btn-outline-primary float-right mr-2">Cancel</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</form>
@endsection