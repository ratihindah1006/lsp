@extends('layout.main')

@section('container')

<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Assessi Data List </h2>
                        </div>

                        @if(session()->has ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <a href="/dataAssessi/create"class="btn btn-primary btn-sm"><i class="bi bi-plus-square-fill ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Kode Skema</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach ($assessi as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email}}</td>
                                        <td>{{ $value->password}}</td>
                                        <td>{{ $value->schema_code}}</td>
                                        <td >
                    <a href="/dataAssessi/{{$value->id}}/edit" class="btn btn-warning btn-sm"><span class="bi bi-pencil-square"></span></a>
                    <form action="/dataAssessi/{{$value->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span class="bi bi-trash-fill"></span>
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
@endsection