@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>File Data Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item"><a href="/category/{{ $category->id }}/schema">Skema</a></li>
                <li class="breadcrumb-item"><a href="">File Data Skema</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-dark">
                <div class="card-body">
                    @foreach ($unit as $u)
                    @php
                    $r = 1;
                    @endphp
                    <br>
                    <table style="min-width: 100%" border="3" class="my-text">

                        <tr>
                            <th width="1500px">Kode Unit : {{ $u->unit_code }}</th>
                        </tr>

                        <tr>
                            <th>Judul Unit : {{ $u->unit_title }}</th>
                        </tr>

                        <tr>
                            @foreach ($u->elements as $element)
                            <td>
                                <b>Element : {{ $element->element_title }}</b><br>
                                <b>Kriteria unjuk kerja: </b><br>
                                <ul>
                                    @foreach ($element->criterias as $criteria)
                                    <li>{{ $r.'.'.$loop->iteration.' '.$criteria->criteria_title }}</li>
                                    @endforeach
                                </ul>
                                @php
                                $r++;
                                @endphp
                            </td>

                        </tr>
                        @endforeach
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection