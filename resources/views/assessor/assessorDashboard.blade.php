@extends('layout.assessor')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4 class="text-info">Beranda Assessor</h4>
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
                    <p class="my-text">Nama &emsp; : &emsp; {{ $assessor->name }}</p><br>
                    <p class="my-text">email &emsp; : &emsp; {{ $assessor->email }} </p><br>
                </div>
        </div>
</div>
@endsection
