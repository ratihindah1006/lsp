@extends('layout.assessi')

@section('container')
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-dark">
                <div class="card-header">
                    <h2 class="card-title bold">FR-APL-02 ASSESMEN MANDIRI</h2>
                </div>
                <div class="card-header">
                    <p class="my-text">Panduan Asesmen mandiri</p><br>
                </div>
                <p class="my-text">&emsp; Judul Skema Sertifikasi &emsp; : &emsp; {{$skema->schema_title}}</p>
                <p class="my-text">&emsp; Nomor &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$skema->no_skkni}}</p>
                <p class="my-text">&emsp; Tempat Uji Kompetensi&emsp;&ensp; : &emsp; {{$class->tuk}}</p>
                <p class="my-text">&emsp; Nama Asesor &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$asesor->data_assessor->name}}</p>
                <p class="my-text">&emsp; Nama Asesi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{$asesi->data_assessi->name}}</p>
                <p class="my-text">&emsp; Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{$asesi->schema_class->event->event_time}}</p><br>
                <p class="my-text">&emsp; Asesi diminta untuk :</p>
                <p class="my-text">&emsp; 1. Mempelajari Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta
                    untuk di Ases.</p>
                <p class="my-text">&emsp; 2. Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas
                    pertanyaan tersebut, tuliskan tanda ? pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda ? pada kolom (BK).</p>
                <p class="my-text">&emsp; 3. Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).</p>
                <p class="my-text">&emsp; 4. Menandatangani form Asesmen Mandiri.</p>

                <?php $i = 0; ?>
                <div class="card-body">

                    <form method="post" action="/apl02/store/{{ $asesi->id }}">
                        @csrf
                        @foreach ($units as $unit)<br>
                        <table style="min-width: 100%" border="3" class="my-text">


                            <tr>
                                <th width="500px">Kode Unit : </th>
                                <th colspan="3" width="500px">{{ $unit->unit_code }}</th>
                            </tr>

                            <tr>
                                <th>Judul Unit :</th>
                                <th colspan="3">{{ $unit->unit_title }}</th>
                            </tr>

                            <tr>
                                <th rowspan="2">&ensp;Dapatkah Saya...?&ensp;</th>
                                <th colspan="2" width="350px" style="text-align:center">&ensp;Penilaian&ensp;</th>
                                <th rowspan="2" width="350px">&ensp;Bukti-bukti Kompetensi&ensp;</th>
                            </tr>

                            <tr align="center">
                                <th>&ensp;&ensp;K&ensp;&ensp;</th>
                                <th>&ensp;BK&ensp;&ensp;</th>
                            </tr>


                            @foreach ($unit->elements as $element)
                            <tr>
                                <td>Judul Element : {{ $element->element_title }}<br><br>
                                    Kriteria Unjuk Kerja :
                                    @foreach ($element->criterias as $criteria)
                                    <br>
                                    {{ $loop->iteration }}.&ensp;{{ $criteria->criteria_title }}
                                    @endforeach
                                </td>

                                <th>
                                    <br>
                                    <div class="form-check">
                                        <input required class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="K" @if($assessment && $assessment[$i]=='K' ) checked @endif>
                                        <label class="form-check-label" for="{{ $element->id }}">
                                        </label>
                                    </div>
                                </th>

                                <th>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="BK" @if($assessment && $assessment[$i]=='BK' ) checked @endif>
                                        <label class="form-check-label" for="{{ $element->id }}">
                                        </label>
                                        <?php $i++; ?>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{ asset('storage/'.$apl01->transcript) }}" class="my-text-link">Transkip nilai atau sertifikat pelatihan yang relevan dengan skema {{$skema->schema_title}}</a><br><br>
                                    <a href="{{ asset('storage/'.$apl01->work_exper_certif) }}" class="my-text-link">Surat keterangan pengalaman kerja yang relevan dalam bidang {{$skema->schema_title}} minimal 1 tahun</a>
                                </td>
                            </tr>



                            @endforeach


                        </table>
                        @endforeach<br><br><br>

                        <p class="my-text">Note ***) Diisi oleh Assessor</p>
                        <table style="min-width: 100%" border="3" class="my-text">
                            <tr>
                                <th width="800px">&ensp;Rekomendasi </th>
                                <th colspan="2" width="300px">&ensp;Pemohon **)&ensp;</th>
                            </tr>

                            <tr>
                                <th rowspan="2">
                                    <p class="form-check-inline">&emsp;1. Assessment
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status" @if ($apl02 !=null && $apl02->status == '1') checked @endif disabled>
                                        <label class="form-check-label" for="status">Dilanjutkan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status" @if ($apl02 !=null && $apl02->status == '0') checked @endif disabled>
                                        <label class="form-check-label" for="status">Tidak Dilanjutkan</label>
                                    </div>
                                    </p>
                                    <p class="form-check-inline">&emsp;2. Proses Assessment dilanjutkan Melalui
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lane" id="lane" @if ($apl02 !=null && $apl02->lane == 'Uji Kompetensi') checked @endif disabled>
                                        <label class="form-check-label" for="lane">Uji Kompetensi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lane" id="lane" @if ($apl02 !=null && $apl02->lane == 'Asesmen Portofolio') checked @endif disabled>
                                        <label class="form-check-label" for="lane">Asesmen Portofolio</label>
                                    </div>
                                    </p>
                                </th>
                                <th width="200px">&ensp;Nama&ensp;</th>
                                <th>&ensp;{{ $asesi->name }}&ensp;</th>
                            </tr>

                            <tr>
                                <th>&ensp;TTD&ensp;</th>
                                <th>
                                    <div class="col-xl-4">
                                        <div class="input-group mb-3">
                                            <img class="txt" src="{{ asset('storage/' . $apl01->assessi_signature) }}" width="100px" height="100px">
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th rowspan="3">&ensp;
                                    <div class="col-xl-10">
                                        <label class="my-text">Catatan&emsp;:</label>
                                        <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5" disabled></textarea>
                                        @error('note')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> <br>
                                </th>
                                <th colspan="2">&ensp;Admin LSP/Assesor ***)&ensp;</th>

                            </tr>

                            <tr>
                                <th>&ensp;Nama&ensp;</th>
                                <th>&ensp;{{ $asesor->name }}&ensp;</th>

                            </tr>
                            <tr>
                                <th>&ensp;TTD&ensp;</th>
                                <th>
                                    <div class="col-xl-4">
                                        <div class="input-group mb-3">
                                            <img class="txt" src="{{ asset('storage/' . $apl01->assessor_signature) }}" width="100px" height="100px">
                                        </div>
                                    </div>
                                </th>
                            </tr>

                </div>
                </table><br>
                <div class="col">
                    <center><button type="submit" class="btn btn-success mt-4" style="width: 170px">Submit</button></center>
                </div> <br><br>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection