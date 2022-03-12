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

        <div class="cards"><br><br>
                <div class="col">
                    <p class="my-text">Nama &emsp; : &emsp; {{ $assessi->name }}</p><br>
                    <p class="my-text">email &emsp; : &emsp; {{ $assessi->email }} </p><br>
                </div>
        </div>
        @foreach ($assessis as $p)
            <br>
            <div class="cards"><br><br>
                <div class="col">
                    <p class="my-text">Event &emsp;  &emsp;  &emsp;  &emsp; : &emsp; {{ $p->schema_class->event->event_name }}</p>
                    <p class="my-text">Schema &emsp;  &emsp;  &emsp; : &emsp; {{ $p->schema_class->schema->schema_title }}</p>
                    <p class="my-text">kelas skema &emsp; &ensp; : &emsp; {{ $p->schema_class->name }} </p>
                    <p class="my-text">Assessor &emsp;  &emsp; &ensp; : &emsp; {{ $p->assessor->data_assessor->name }} </p> <br>
                    <div class="row">
                        @if ($p->schema_class->event->status == 'Open')
                            <a href="/apl01/{{ $p->id }}" class="btn btn-success btn-sm">
                                <span>Apl 01</span>
                            </a>&emsp;
                            @if ($p->apl01 != null)
                                @if ($p->apl01->status == '1')
                                    <a href="/apl02/{{ $p->id }}" class="btn btn-primary btn-sm">
                                        <span>Apl 02</span>
                                    </a>
                                    @if ($p->apl02 != null)
                                        @if ($p->apl02->status == '1')
                                            &emsp;
                                            <a href="/assessi/muk06/{{ $p->id }}" class="btn btn-secondary btn-sm">
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
                    </div><br><br>
                </div>
            </div>
        @endforeach
    @endsection
