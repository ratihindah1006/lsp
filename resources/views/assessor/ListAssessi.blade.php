@extends('layout.assessi')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Assessi</h4>
                </div>
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

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive my-text">
                                        <table class="display" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assessis as $value)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>
                                                            @if ($value->apl01 != null)
                                                                <a href="/list/{{ $value->id }}"
                                                                    class="btn btn-success btn-sm">
                                                                    <span>Apl 01</span></a>
                                                            @else
                                                            <a href="/list/{{ $value->id }}"
                                                                class="btn btn-success btn-sm disabled">
                                                                <span>Apl 01</span></a>
                                                            @endif
                                                            @if ($value->apl02 != null)
                                                                <a href="/list/{{ $value->id }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <span>Apl 02</span></a>
                                                            @else
                                                            <a href="/list/{{ $value->id }}"
                                                                class="btn btn-primary btn-sm disabled">
                                                                <span>Apl 02</span></a>
                                                            @endif
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
    </div>
    @endsection
