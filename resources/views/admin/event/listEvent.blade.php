@extends('layout.main')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Event</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/category">Event</a></li>
                </ol>
            </div>
        </div>
        <div class="data-table-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                            @if (session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="/event/create" class="btn btn-primary btn-sm"><i
                                    class="ti-plus">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive my-text">
                                        <table class="display" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Event</th>
                                                    <th>Nama Event</th>
                                                    <th>Mulai</th>
                                                    <th>Selesai </th>
                                                    <th>Tipe</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($event as $value)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $value->event_code }}</td>
                                                        <td>{{ $value->event_name }}</td>
                                                        <td>{{ $value->event_starts }}</td>
                                                        <td>{{ $value->event_ends }}</td>
                                                        <td>{{ $value->type }}</td>
                                                        <td>{{ $value->status }}</td>
                                                        <td align="center">
                                                            <a href="/event/{{ $value->event_code }}/KelasSkema" class="btn btn-primary btn-sm"><span
                                                                    class="ti-info"></span></a>
                                                            <a href="/event/{{ $value->id }}/edit"
                                                                class="btn btn-warning btn-sm"><span
                                                                    class="ti-pencil"></span></a>
                                                            <form action="/event/{{ $value->id }}" method="POST"
                                                                class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm border-0"
                                                                    onclick="return confirm('Yakin ingin menghapus data?')"><span
                                                                        class="ti-trash"></span>
                                                                </button>
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
