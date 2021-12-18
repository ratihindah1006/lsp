@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Asesi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="/dataAssessi">Daftar Asesi</a></li>
            </ol>
        </div>
    </div>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                       
                        @if(session()->has ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <a href="/dataAssessi/create"class="btn btn-primary btn-sm"><i class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="table-responsive">
                            <table class="display" id="example">
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
                    <a href="/dataAssessi/{{$value->id}}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                    <form action="/dataAssessi/{{$value->id}}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Yakin ingin menghapus data?')"><span class="ti-trash"></span>
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