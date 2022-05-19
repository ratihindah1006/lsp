@extends('layout.assessi')

@section('container')

<div class="container-fluid">
  <div class="row">
      <div class="col-lg-12">
        <div class="card text-dark">
          <div class="card-header">
            <h5 class="card-title bold">FR.IA.02 TUGAS PRAKTIK DEMONSTRASI</h5>
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
              <div class="mt-3">
                {!! $instruksi->instruksi ?? null !!}
              </div>
            </div>
        </div>
      </div>
  </div>
</div>


@endsection