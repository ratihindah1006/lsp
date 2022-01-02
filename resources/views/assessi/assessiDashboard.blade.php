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
        <div class="col">
            <div class="row ">
                <a href="/apl01" class="btn btn-success btn-sm">
                    <span>Apl 01</span>
                </a>&emsp;
                @if ($assessi != null)
                    @if ($assessi->status == '1')
                        <a href="/apl02" class="btn btn-success btn-sm">
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
            </div>
        </div>
    @endsection
