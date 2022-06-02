@extends('layout.main')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar {{ $title }}</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/soallisan">{{ $title }}</a></li>
                </ol>
            </div>
        </div>
        <div class="data-table-area">
            <div class="container col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <a href="/soallisan/create" class="btn btn-primary btn-sm mr-2 mb-2"><i
                                class="ti-plus">&nbsp;&nbsp;&nbsp;</i>Tambah Soal</a>
                            <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modalTambahKodeSoalLisan"><i
                                    class="ti-plus">&nbsp;&nbsp;&nbsp;</i>Tambah Kode</button><br><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive my-text">
                                      <table class="display p-0" id="example">
                                        <thead>
                                            <tr>
                                                <th width="5px">No</th>
                                                <th width="20%">Skema</th>
                                                <th>Kode Soal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($schemas as $schema)
                                            <tr style="vertical-align:top">
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $schema->schema_title }}</td>
                                              <td>
                                                <div id="accordion-seven" class="accordion-rounded-stylish  accordion-no-gutter accordion accordion-header-bg">
                                                  <div class="accordion__item">
                                                      <div class="accordion__header collapsed accordion__header--primary" data-toggle="collapse" data-target="#header-bg_collapse{{ $loop->iteration }}">
                                                          <span class="accordion__header--icon"></span>
                                                          <span class="accordion__header--text">Daftar Kode Soal</span>
                                                          <span class="accordion__header--indicator"></span>
                                                      </div>
                                                      <div id="header-bg_collapse{{ $loop->iteration }}" class="collapse accordion__body" data-parent="#accordion-seven">
                                                          <div class="accordion__body--text p-0">
                                                            <table class="table text-dark" border="solid black">
                                                                <thead class="text-center bg-warning">
                                                                    <tr>
                                                                        <th width="5px">No</th>
                                                                        <th>Kode Soal</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                @forelse ($schema->codes_lisan as $code)
                                                                <tr style="vertical-align:top">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $code->code_lisan_name }}</td>
                                                                    <td class="text-center"><a href="/soallisan/kodesoal/{{ $code->id }}" class="btn btn-sm btn-primary"><span><i class="ti-search"></i></span></a></td>
                                                                </tr>
                                                                @empty
                                                                    <td class="text-center" colspan="3">Belum Ada Kode Soal</td>
                                                                @endforelse
                                                            </table>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <form method="post" action="/soallisan/kodeSoal">
            @csrf
            <div class="modal fade" id="modalTambahKodeSoalLisan">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Tambah Kode Soal</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="schema">Schema<label class="text-danger">&nbsp;*</label></label>
                                <select name="schema" class="form-control single-select" id="schema" required>
                                    <option value="">--Pilih Schema--</option>
                                        @foreach ($schemas as $schema)
                                            <option value="{{ $schema->id }}">{{ $schema->schema_title }}</option>                                        
                                        @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="kode_soal">Kode Soal<label class="text-danger">&nbsp;*</label></label>
                                <input name="kode_soal" class="form-control" placeholder="Masukkan Kode Soal" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
@endsection