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
                    <li class="breadcrumb-item"><a href="/KelasSkema">Kelas Skema</a></li>
                    <li class="breadcrumb-item active"><a href="/KelasSkema/{{ $class }}/dataAsesor">Data Asesor</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="data-table-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                            <form method="post" action="/KelasSkema/{{ $class }}/dataAsesor">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8 ml-5">
                                                <div class="form-group row">
                                                    <h5>Tambah Asesor (*maksimal 2)</h5>
                                                    <select style="width: 100%; height:40px;" name="data_assessor_id"
                                                        id="data_assessor_id"
                                                        class="form-control maximum-search-length @error('data_assessor_id') is-invalid @enderror">
                                                        <option value=""></option>
                                                        @foreach ($assessor as $assessor)
                                                            <option value="{{ $assessor->id }}"
                                                                {{ old('assessor_id') == $assessor->id ? 'selected' : null }}>
                                                                {{ $assessor->email }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('assessor_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col ml-5">
                                                <div class="form-group row">
                                                    @if ($count < 2)
                                                        <button type="submit" class="btn btn-primary mt-4"
                                                            style="width: 100px">Tambah</button>
                                                    @else
                                                        <a class="btn btn-primary mt-4 disabled"
                                                            style="width: 100px">Tambah</a>
                                                    @endif
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
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assessors as $value)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $value->data_assessor->name }}</td>
                                                        <td>{{ $value->data_assessor->email }}</td>
                                                        <td align="center">
                                                            <form
                                                                action="/KelasSkema/{{ $class }}/dataAsesor/{{ $value->id }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-sm border-0 delete-confirm" data-name="{{$value->data_assessor->name}}" ><span
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
