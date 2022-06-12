@extends('layout.assessi')

@section('container')

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
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-dark">
                            <td>{{ $schema->schema_title }}</td>
                            <td>{{ $code->code_praktik_name }}</td>
                            <td><a href="/assessi/ia02/{{ $assessi->id }}" class="btn btn-rounded btn-primary">Soal Praktik</a></td>
                            <td><a href="/assessi/jawabanpraktik/{{ $assessi->id }}" class="btn btn-rounded btn-secondary">Upload Jawaban</a></td>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukti as $item)
                          <tr class="text-dark">
                              <td>{{ $loop->iteration }}</td>
                              <td><a href="/assessi/download/{{ $item->id }}" class="text-primary" target="_blank" rel="noopener"><u>{{ $item->file_name }}</u></a></td>
                              <td>{{ $item->keterangan ?? '-' }}</td>
                              <td><textarea disabled>{{ $item->catatan }}</textarea></td>
                              <form action="/assessi/deletefile/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn btn-danger"><i class="ti-trash"></i></button></td>
                              </form>
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
        </div>
      </div>
  </div>
</div>


@endsection