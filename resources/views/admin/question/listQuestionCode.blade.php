@extends('layout.main')

@section('container')

<div class="container-fluid">
  <div class="row page-titles mx-0">
      <div class="col-sm-6 p-md-0">
          <div class="welcome-text">
              <h4>Daftar {{ $title }} Skema <div class="text-danger d-inline"> {{ $codeQuestion->schema->schema_title }} </div> Kode <div class="text-danger d-inline">{{ $codeQuestion->code_name }}</div></h4>
          </div>
      </div>
      <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/{{ $title }}">{{ $title }}</a></li>
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
                      <a href="/soal/create" class="btn btn-primary btn-sm mr-2"><i
                          class="ti-plus">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                      <div class="card">
                          <div class="card-body">
                              <div class="table-responsive my-text">
                                <table class="display p-0" id="example">
                                  <thead>
                                      <tr>
                                          <th>No Soal</th>
                                          <th>Pertanyaan</th>
                                          <th>Jawaban</th>
                                          <th>Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($questions as $question)
                                      <tr style="vertical-align:top">
                                        <td>{{ $question->no_soal }}</td>
                                        <td>{!! $question->question !!}</td>
                                        <td>{!! $question->key_answer !!}</td>
                                        <td><a href="/soal/{{ $question->id }}/edit" class="btn btn-sm btn-primary"><i class="ti-pencil"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDeleteSoal{{ $question->id }}"><i class="ti-trash"></i></button>
                                            <!-- Modal -->
                                            <form method="post" action="/soal/{{ $question->id }}">
                                                @csrf
                                                @method('delete')
                                                    <div class="modal fade" id="modalDeleteSoal{{ $question->id }}">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                    <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menghapus data soal <b>{{ $question->no_soal }}</b> ? </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form> 
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

@endsection