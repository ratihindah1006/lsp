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
                            <a href="/soal/create" class="btn btn-primary btn-sm"><i
                                    class="ti-plus">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive my-text">
                                      <table class="display p-0" id="example">
                                        <thead>
                                            <tr>
                                                <th width="5px">No</th>
                                                <th width="20%">Skema</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($schemas as $schema)
                                            <tr style="vertical-align:top">
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $schema->schema_title }}</td>
                                              <td>
                                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                                  <div class="accordion__item">
                                                      <div class="accordion__header collapsed accordion__header--primary" data-toggle="collapse" data-target="#header-bg_collapse{{ $loop->iteration }}">
                                                          <span class="accordion__header--icon"></span>
                                                          <span class="accordion__header--text">Unit</span>
                                                          <span class="accordion__header--indicator"></span>
                                                      </div>
                                                      <div id="header-bg_collapse{{ $loop->iteration }}" class="collapse accordion__body" data-parent="#accordion-seven">
                                                          <div class="accordion__body--text p-0">
                                                            <table class="table" border="solid black">
                                                                <thead class="text-center bg-warning">
                                                                    <tr>
                                                                        <th width="5px">No</th>
                                                                        <th>Judul Unit</th>
                                                                        <th>Judul Element</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                @foreach ($schema->units as $unit)
                                                                <tr style="vertical-align:top">
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $unit->unit_title }}</td>
                                                                    <td>
                                                                    @foreach ($unit->elements as $item)
                                                                        {{ $loop->iteration }}. {{ $item->element_title }} <hr>
                                                                    @endforeach
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @foreach ($unit->elements as $item)
                                                                            @if ($item->question != null)
                                                                                <a href="/soal/{{ $item->id }}/edit" class="btn-sm btn-primary d-inline-flex"><i class="ti-pencil"></i></a>
                                                                                <button type="button" class="btn-sm btn-danger box-shadow-none d-inline-flex border-0" data-toggle="modal" data-target="#modalDeleteSoal{{ $item->id }}"><i class="ti-trash"></i></button>
                                                                                <!-- Modal -->
                                                                                <form method="post" action="/soal/{{ $item->question->id }}">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <div class="modal fade" id="modalDeleteSoal{{ $item->id }}">
                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header bg-danger">
                                                                                                <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <p>Yakin ingin menghapus data soal dari elemen <b>{{ $item->element_title }}</b> ? </p>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </form> 
                                                                            @else
                                                                                <a href="/soal/create" class="btn-sm btn-secondary d-inline-flex"><i class="ti-plus"></i></a> 
                                                                            @endif         
                                                                            <hr>
                                                                        @endforeach    
                                                                    </td>
                                                                </tr>
                                                                @endforeach
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
@endsection