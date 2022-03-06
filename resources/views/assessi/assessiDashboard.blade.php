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
        @foreach ($assessis as $p)
            <br>
            <div class="cards"><br><br>
                <div class="col">
                    <p class="my-text">Nama &emsp; : &emsp; {{ $p->data_assessi->name }}</p><br>
                    <p class="my-text">email &emsp; : &emsp; {{ $p->data_assessi->email }} </p>
                    <p class="my-text">kelas skema &emsp; : &emsp; {{ $p->schema_class->name}} </p>
                    <div class="row">
                        <a href="/apl01/{{ $p->id }}" class="btn btn-success btn-sm">
                            <span>Apl 01</span>
                        </a>&emsp;
                        @if ($assessi != null)
                            @if ($assessi->status == '1')
                                <a href="/apl02/{{ $p->id }}" class="btn btn-success btn-sm">
                                    <span>Apl 02</span>
                                </a>
                            @else
                                <a href="/apl02" class="btn btn-success btn-sm disabled">
                                    <span>Apl 02</span>
                                </a>
                            @endif
                        @else
                            <a href="/apl02" class="btn btn-success btn-sm disabled">
                                <span>Apl 02</span>
                            </a>
                        @endif
                    </div><br><br>
                </div>
            </div>
        @endforeach
    @endsection
