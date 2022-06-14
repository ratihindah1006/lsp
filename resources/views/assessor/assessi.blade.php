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
                                    @foreach($assessi as $v)
                                    <tr>
                                       
                                        <td>{{ $loop->iteration }}</td>

                                        

                                        <td>{{ $v->data_assessi->name}}</td>
                                        <td>{{ $v->data_assessi->email }}</td>
                                        <td>{{$v->schema_class->name}}</td>
                                        <td>
                                            
                                            @if($v->apl01 != null && $v->apl01->status == '1')
                                                <a href="/list/{{ $v->id }}" class="btn btn-success btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Permohonan Sertifikasi Kompetensi">
                                                    <span>Apl 01-Diterima</span></a>
                                            @elseif($v->apl01 != null && $v->apl01->status == '0')
                                                <a href="/list/{{ $v->id }}" class="btn btn-danger btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Permohonan Sertifikasi Kompetensi">
                                                    <span>Apl 01-Ditolak</span></a>
                                            @elseif ($v->apl01 != null && $v->apl01->status == null)
                                                <a href="/list/{{ $v->id }}" class="btn btn-primary btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Permohonan Sertifikasi Kompetensi">
                                                    <span>Apl 01</span></a>
                                            @else
                                            <a href="/list/{{ $v->id }}" class="btn btn-primary btn-sm disabled mb-2">
                                                <span>Apl 01</span></a>
                                            @endif
                                            @if ($v->apl02 != null && $v->apl02->status == null)
                                            <a href="/list02/{{ $v->id }}" class="btn btn-primary btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Asesmen Mandiri">
                                                <span>Apl 02</span></a>
                                            @elseif($v->apl02 != null && $v->apl02->status == '0')
                                            <a href="/list02/{{ $v->id }}" class="btn btn-danger btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Asesmen Mandiri">
                                                <span>Apl 02-Ditolak</span></a>
                                            @elseif($v->apl02 != null && $v->apl02->status == '1')
                                            <a href="/list02/{{ $v->id }}" class="btn btn-success btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Asesmen Mandiri">
                                                <span>Apl 02-Diterima</span></a>
                                            @else
                                            <a href="/list02/{{ $v->id }}" class="btn btn-primary btn-sm disabled mb-2">
                                                <span>Apl 02</span></a>
                                            @endif

                                            @if ($v->apl02 != null)
                                                @if ($v->apl02['status'])
                                                    <a href="/assessor/ak01/{{ $v->id }}" class="btn @if ($v->ak01 && $v->ak01->assessor_agreement == "1") {{ "btn-success" }} @else {{ "btn-primary" }} @endif btn-sm mb-2 text-white" data-toggle="tooltip" data-placement="bottom" title="Persetujuan Asesmen"><span>FR.AK.01</span></a>
                                                    @if (isset($v->ak01['tl_verif_porto']))
                                                        @if ($v->ak01['tl_verif_porto'])
                                                            <a href="/assessor/" class="btn btn-primary btn-sm mb-2 disabled" data-toggle="tooltip" data-placement="bottom" title="Vertifikasi Portofolio"><span>Verif Porto</span></a>
                                                        @endif
                                                    @endif
                                                    @if (isset($v->ak01['l_obs_langsung']))
                                                        @if ($v->ak01['l_obs_langsung'])
                                                            <a href="/assessor/muk01/{{ $v->id }}" class="btn @if ($v->muk01 && $v->muk01->assessor_agreement == "1") {{ "btn-success" }} @else {{ "btn-primary" }} @endif btn-sm mb-2 text-white" data-toggle="tooltip" data-placement="bottom" title="Ceklist Observasi"><span>FR.MUK.01</span></a>
                                                            <a href="/assessor/jawaban_assessi/{{ $v->id }}" class="btn btn-primary btn-sm mb-2" data-toggle="tooltip" data-placement="bottom" title="Soal/Jawaban Praktik"><span>SOAL/JAWABAN ASESI</span></a>
                                                        @endif
                                                    @endif
                                                    @if (isset($v->ak01['t_p_tulis']))
                                                        @if ($v->ak01['t_p_tulis'])
                                                            <a href="/assessor/muk06/{{ $v->id }}" class="btn @if (!$v->muk06) {{ "btn-warning" }} @elseif ($v->muk06 && $v->muk01->assessor_agreement == "1") {{ "btn-success" }} @else {{ "btn-primary" }} @endif btn-sm mb-2 text-white" data-toggle="tooltip" data-placement="bottom" title="Soal Esay @if (!$v->muk06) {{ "Belum diisi oleh Asesi" }} @endif"><span>FR.MUK.06</span></a>
                                                        @endif
                                                    @endif
                                                    @if (isset($v->ak01['t_p_lisan']))
                                                        @if ($v->ak01['t_p_lisan'])
                                                            <a href="/assessor/muk07/{{ $v->id }}" class="btn @if ($v->ia07 && $v->ia07->assessor_agreement == "1") {{ "btn-success" }} @else {{ "btn-primary" }} @endif btn-sm mb-2 text-white" data-toggle="tooltip" data-placement="bottom" title="Soal Lisan"><span>FR.IA.07</span></a>
                                                        @endif
                                                    @endif
                                                    @if (isset($v->ak01['t_p_wawancara']))
                                                        @if ($v->ak01['t_p_wawancara'])
                                                            <a href="/assessor/" class="btn btn-primary btn-sm mb-2 disabled" data-toggle="tooltip" data-placement="bottom" title="Pertanyaan Wawancara"><span>Pertanyaan Wawancara</span></a>
                                                        @endif
                                                    @endif
                                                @else
                                                    <a href="" class="btn btn-primary btn-sm disabled mb-2"><span>FR.AK.01</span></a>
                                                @endif
                                            @else
                                                <a href="" class="btn btn-primary btn-sm disabled mb-2"><span>FR.AK.01</span></a>
                                            @endif
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
@endsection