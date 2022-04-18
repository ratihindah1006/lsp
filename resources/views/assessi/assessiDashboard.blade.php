@extends('layout.assessi')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Beranda Assessi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
            </ol>
        </div>
    </div>


    <div class="row">
        @foreach ($assessis as $p)
        <div class="col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="font-weight-bold card-title">{{ $p->schema_class->schema->schema_title }}</h4></br>
                    <table class="my-text">
                        <tbody>
                            <tr>
                                <td width="100"><b> Event</b></td>
                                <td width="15"> :</td>
                                <td width="250">{{ $p->schema_class->event->event_name }}</td>
                            </tr>
                            <tr>
                                <td width="100"><b> Tanggal</b></td>
                                <td width="15"> :</td>
                                <td width="250">{{ $p->schema_class->date }}</td>
                            </tr>
                            <tr>
                                <td width="100"><b> Nama Asesor</b></td>
                                <td width="15"> :</td>
                                <td width="250">{{ $p->assessor->data_assessor->name }}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            @if ($p->schema_class->event->status == 'Open')
                            <a href="/apl01/{{ $p->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Permohonan Sertifikasi Kompetensi">
                                <span>Apl 01</span>
                            </a>&emsp;
                            @if ($p->apl01 != null)
                            @if ($p->apl01->status == '1')
                            <a href="/apl02/{{ $p->id }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Asesmen Mandiri">
                                <span>Apl 02</span>
                            </a>
                            @if ($p->apl02 != null)
                            @if ($p->apl02->status == '1')
                            &emsp;
                            <a href="/assessi/muk06/{{ $p->id }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Soal Esay">
                                <span>MUK06</span>
                            </a>
                            @else
                            &emsp;
                            <a href="/" class="btn btn-secondary btn-sm disabled">
                                <span>MUK06</span>
                            </a>
                            @endif
                            @else
                            &emsp;
                            <a href="/" class="btn btn-secondary btn-sm disabled">
                                <span>MUK06</span>
                            </a>
                            @endif
                            @else
                            <a href="/apl02" class="btn btn-primary btn-sm disabled">
                                <span>Apl 02</span>
                            </a>&emsp;
                            <a href="/assessi/muk06/{{ $p->id }}" class="btn btn-secondary btn-sm disabled">
                                <span>MUK06</span>
                            </a>
                            @endif
                            @else
                            <a href="/apl02" class="btn btn-primary btn-sm disabled">
                                <span>Apl 02</span>
                            </a>&emsp;
                            <a href="/assessi/muk06/{{ $p->id }}" class="btn btn-secondary btn-sm disabled">
                                <span>MUK06</span>
                            </a>
                            @endif
                            @else
                            <a href="/apl01/{{ $p->id }}" class="btn btn-success btn-sm disabled">
                                <span>Apl 01</span>
                            </a>&emsp;
                            <a href="/apl02" class="btn btn-primary btn-sm disabled">
                                <span>Apl 02</span>
                            </a>&emsp;
                            <a href="/assessi/muk06/{{ $p->id }}" class="btn btn-secondary btn-sm disabled">
                                <span>MUK06</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    @endsection