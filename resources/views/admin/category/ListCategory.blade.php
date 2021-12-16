@extends('layout.main')

@section('container')
<ol class="breadcrumb">
    <li><a href="/category"><i class="fa fa-file-o"></i> Category</a></li>
            </ol>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Category List </h2>
                        </div>

                        @if(session()->has ('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <a href="/category/create"class="btn btn-primary btn-sm  mt-2"><i class="bi bi-plus-square-fill ">&nbsp;&nbsp;&nbsp;</i>Add</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Code</th>
                                        <th>Category Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                @foreach ($category as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->category_code }}</td>
                                        <td>{{ $value->category_title }}</td>
                                        <td >
                    <a href="/category/{{ $value->category_code }}/schema" class="btn btn-primary btn-sm"><span class="bi bi-info-square"></span></a>
                    <a href="/category/{{ $value->category_code }}/edit" class="btn btn-warning btn-sm"><span class="bi bi-pencil-square"></span></a>
                    <form action="/category/{{ $value->category_code }}" method="POST" class="d-inline">
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