@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Kriteria Unjuk Kerja</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category }}/unit">
                        Unit</a></li>
                <li class="breadcrumb-item "><a href="/category/{{ $category }}/unit/{{ $unit }}/element">
                        Elemen</a></li>
                <li class="breadcrumb-item active"><a href="/category/{{ $category }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria">
                        Kriteria</a></li>
            </ol>
        </div>
    </div>

    <div class="card text-white bg-dark">
        <div class="col-sm-12 p-md-0">
            <div class="card-header">
                <div class="welcome-text">
                    <p>Element : {{ $element->element_title }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">

                        <form method="post" action="/category/{{ $category }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1 ml-5">
                                            <div class="form-group row">
                                                <label for="no_criteria" class="form-label my-text">No Kriteria</label>
                                                <input style="width: 100%; height:40px;" type="text" class="form-control @error('no_criteria') is-invalid @enderror" id="no_criteria" name="no_criteria" value="{{ old('no_criteria') }}">
                                                @error('no_criteria')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-7 ml-5">
                                            <div class="form-group row">
                                                <label for="criteria_title" class="form-label my-text">Judul Kriteria</label>
                                                <textarea type="text" class="form-control @error('criteria_title') is-invalid @enderror" id="criteria_title" name="criteria_title"></textarea>
                                                @error('criteria_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col ml-4">
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-primary mtm-4" style="width: 50%; height:40px;">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive my-text">
                                    <table class="display" id="example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Criteria Title</th>
                                                <th width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($criteria as $value)
                                            <tr>
                                                <td>{{ $value->no_criteria }}</td>
                                                <td>{{ $value->criteria_title }}</td>
                                                <td>
                                                    <a href="/category/{{ $category }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria/{{ $value->id }}/edit" class="btn btn-warning btn-sm"><span class="ti-pencil"></span></a>
                                                    <form action="/category/{{ $category }}/unit/{{ $unit }}/element/{{ $element->id }}/criteria/{{ $value->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->criteria_title}}"><span class="ti-trash"></span>
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
</div>
@endsection