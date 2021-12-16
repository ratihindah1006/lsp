@extends('layout.main')

@section('container')
<ol class="breadcrumb">
    <li><a href="/category"><i class="fa fa-file-o"></i> Category</a></li>
                    <li >&ensp; > &ensp;</li>
                        <li><a href="/category/{{ $category }}/schema"> Schema</a></li>
                        <li >&ensp; > &ensp;</li>
                        <li><a href="/category/{{ $category }}/schema/{{ $schema }}/unit"> Unit</a></li>
                        <li >&ensp; > &ensp;</li>
                        <li><a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element"> Element</a></li>
                </ol>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Element List </h2>
                        </div>

                        @if(session()->has ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/create"class="btn btn-primary btn-sm"><i class="bi bi-plus-square-fill ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Element Code</th>
                                        <th>Element Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach ($element as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->element_code }}</td>
                                        <td>{{ $value->element_title}}</td>
                                        <td >
                    <a href="/category/{{ $category }}/schema/{{ $schema }}/unit/{{ $unit }}/element/{{ $value->element_code }}/criteria" class="btn btn-primary btn-sm"><span class="bi bi-info-square"></span></a>
                    <a href="/category/{{ $category }}/schema/{{$schema}}/unit/{{$unit}}/element/{{ $value->element_code }}/edit" class="btn btn-warning btn-sm"><span class="bi bi-pencil-square"></span></a>
                    <form action="/category/{{ $category }}/schema/{{$schema}}/unit/{{ $unit }}/element/{{ $value->element_code }}" method="POST" class="d-inline">
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