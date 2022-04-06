@extends('layout.assessor')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Daftar Assessi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
                <li class="breadcrumb-item"><a href="">Daftar Assessi</a></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-list">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive my-text">
                            <table class="display" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Kelas Skema</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assessi->assessors as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        @foreach($value->assessis as $v)

                                        <td>{{ $v->data_assessi->name}}</td>
                                        <td>{{ $v->data_assessi->email }}</td>
                                        <td>{{$v->schema_class->name}}</td>
                                        <td>
                                            @if ($v->apl01 != null)
                                            <a href="/list/{{ $v->id }}" class="btn btn-success btn-sm mb-2">
                                                <span>Apl 01</span></a>
                                            @else
                                            <a href="/list/{{ $v->id }}" class="btn btn-success btn-sm disabled mb-2">
                                                <span>Apl 01</span></a>
                                            @endif
                                            @if ($v->apl02 != null)
                                            <a href="/list02/{{ $v->id }}" class="btn btn-primary btn-sm mb-2">
                                                <span>Apl 02</span></a>
                                            @else
                                            <a href="/list02/{{ $v->id }}" class="btn btn-primary btn-sm disabled mb-2">
                                                <span>Apl 02</span></a>
                                            @endif

                                            @if ($v->apl02 != null)
                                            @if ($v->apl02['status'])
                                            <a href="/assessor/ak01/{{ $v->id }}" class="btn btn-secondary btn-sm mb-2"><span>FR.AK.01</span></a>
                                            @if (isset($v->ak01['tl_verif_porto']))
                                            @if ($v->ak01['tl_verif_porto'])
                                            <a href="/assessor/" class="btn btn-secondary btn-sm mb-2"><span>Verif Porto</span></a>
                                            @endif
                                            @endif
                                            @if (isset($v->ak01['l_obs_langsung']))
                                            @if ($v->ak01['l_obs_langsung'])
                                            <a href="/assessor/muk01/{{ $v->id }}" class="btn btn-secondary btn-sm mb-2"><span>FR.MUK.01</span></a>
                                            @endif
                                            @endif
                                            @if (isset($v->ak01['t_p_tulis']))
                                            @if ($v->ak01['t_p_tulis'])
                                            <a href="/assessor/muk06/{{ $v->id }}" class="btn btn-secondary btn-sm mb-2"><span>FR.MUK.06</span></a>
                                            @endif
                                            @endif
                                            @if (isset($v->ak01['t_p_lisan']))
                                            @if ($v->ak01['t_p_lisan'])
                                            <a href="/assessor/" class="btn btn-secondary btn-sm mb-2"><span>Pertanyaan Lisan</span></a>
                                            @endif
                                            @endif
                                            @if (isset($v->ak01['t_p_wawancara']))
                                            @if ($v->ak01['t_p_wawancara'])
                                            <a href="/assessor/" class="btn btn-secondary btn-sm mb-2"><span>Pertanyaan Wawancara</span></a>
                                            @endif
                                            @endif
                                            @else
                                            <a href="" class="btn btn-secondary btn-sm disabled mb-2"><span>FR.AK.01</span></a>
                                            @endif
                                            @else
                                            <a href="" class="btn btn-secondary btn-sm disabled mb-2"><span>FR.AK.01</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
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
@endsection