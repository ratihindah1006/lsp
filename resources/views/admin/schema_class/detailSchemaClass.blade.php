@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Detail Kelas Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/KelasSkema">Kelas Skema</a></li>
                <li class="breadcrumb-item"><a href="">Detail Kelas Skema</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-body">
                        <a href="/KelasSkema" class="btn btn-primary ti-angle-left"></a><br>
                        <br>
                        <table style="min-width: " border="3" class="my-text mb-3">
                            <tr>
                                <th width="400px">Nama </th>
                                <th width="1000px"> {{ $class->name }}</th>
                            </tr>
                            <tr>
                                <th width="400px">Nama Event </th>
                                <th width="1000px"> {{ $class->event->event_name}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Nama Schema </th>
                                <th width="1000px"> {{ $class->schema->schema_title}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Kode Soal Esai </th>
                                <th width="1000px"> {{ $class->code->code_name}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Kode Soal Lisan </th>
                                <th width="1000px"> {{ $class->code_lisan->code_lisan_name}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Kode Soal Praktik </th>
                                <th width="1000px"> {{ $class->code_praktik->code_praktik_name}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Tanggal</th>
                                <th width="1000px"> {{ $class->date}}</th>
                            </tr>
                            <tr>
                                <th width="400px">TUK</th>
                                <th width="1000px"> {{ $class->tuk}}</th>
                            </tr>
                            <tr>
                                <th width="400px">Deskripsi</th>
                                <th width="1000px"> {{ $class->description}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection