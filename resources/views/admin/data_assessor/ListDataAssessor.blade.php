@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Asesor</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dataAssessor">Data Asesor</a></li>
            </ol>
        </div>
    </div>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">                        
                        <a href="/dataAssessor/create" class="btn btn-primary btn-sm"><i
                                class="ti-plus ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No.MET</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_assessor as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{$value->no_met}}</td>
                                                    <td>{{ $value->email }}</td>                                                 
                                                    <td align="center">
                                                        <a href="/dataAssessor/{{ $value->id }}/edit"
                                                            class="btn btn-warning btn-sm"><span
                                                                class="ti-pencil"></span></a>
                                                        <form action="/dataAssessor/{{ $value->id }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->name}}"><span
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
