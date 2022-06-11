@extends('layout.assessi')

@section('container')

<form method="post" action="/assessor/jawaban_assessi">
@csrf
@method('put')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-12">
        <div class="card text-dark">
          <div class="card-header">
            <h5 class="card-title bold">Soal Praktik</h5>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr class="text-dark">
                            <th>Judul Skema</th>
                            <th>Kode Soal</th>
                            <th>Soal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-dark">
                            <td>{{ $schema->schema_title }}</td>
                            <td>{{ $code->code_praktik_name }}</td>
                            <td><a href="/assessor/ia02/{{ $assessi->id }}" class="btn btn-rounded btn-primary">Soal Praktik</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="card text-dark">
          <div class="card-header">
            <h5 class="card-title bold">Daftar Upload File</h5>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example">
                    <thead>
                        <tr class="text-dark">
                            <th>No</th>
                            <th>Bukti Tugas Praktik*</th>
                            <th>Keterangan</th>
                            <th>Komentar Assesor</th>
                            <th class="text-center">K</th>
                            <th class="text-center">BK</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukti as $item)
                          <tr class="text-dark">
                              <td>{{ $loop->iteration }}</td>
                              <td><a href="/assessor/download/{{ $item->id }}" class="text-primary" target="_blank" rel="noopener"><u>{{ $item->file_name }}</u></a></td>
                              <td>{{ $item->keterangan ?? '-' }}</td>
                              <td><textarea name="catatan[{{ $item->id }}]" id="catatan[{{ $item->id }}]">{{ $item->catatan }}</textarea></td>
                              <td class="text-center"><input type="radio" name="rekomendasi[{{ $item->id }}]" id="rekomendasi[{{ $item->id }}]" value="1" 
                                @if ($item->rekomendasi == "1")
                                  {{ 'checked' }}
                                @endif
                                ></td>
                              <td class="text-center"><input type="radio" name="rekomendasi[{{ $item->id }}]" id="rekomendasi[{{ $item->id }}]" value="0"
                                @if ($item->rekomendasi == "0")
                                  {{ 'checked' }}
                                @endif
                                ></td>
                          </tr>
                        @empty
                          <tr class="text-center">
                            <td colspan="5">Belum Ada File yang diupload</td>
                          </tr>
                        @endforelse
                    </tbody>
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