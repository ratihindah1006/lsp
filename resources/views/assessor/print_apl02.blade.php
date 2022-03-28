<div class="container-fluid">
    <font size="2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-footer">
                        <h2 class="font-weight-bold card-title">FR-APL-02 ASSESMEN MANDIRI</h2>
                        <div class="card-body">

                            <p class="my-text">&emsp; Panduan Asesmen mandiri</p>
                            <p class="my-text">&emsp; Judul Skema Sertifikasi &emsp; : &emsp; {{ $skema->schema_title }}</p>
                            <p class="my-text">&emsp; Nomor &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{ $skema->no_skkni }}</p>
                            <p class="my-text">&emsp; Tempat Uji Kompetensi&emsp;&ensp; : &emsp; {{ $class->tuk }}</p>
                            <p class="my-text">&emsp; Nama Asesor &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{ $asesor->data_assessor->name }}</p>
                            <p class="my-text">&emsp; Nama Asesi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{ $assessi->data_assessi->name }} </p>
                            <p class="my-text">&emsp; Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{ $assessi->schema_class->event->event_time }}</p>
                            <p class="my-text">&emsp; Asesi diminta untuk :</p>
                            <ul>
                                <li class="my-text">&emsp; Mempelajari Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta
                                    untuk di Ases.</li>
                                <li class="my-text">&emsp; Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas
                                    pertanyaan tersebut, tuliskan tanda ? pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda ? pada kolom (BK).</li>
                                <li class="my-text">&emsp; Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).</li>
                                <li class="my-text">&emsp; Menandatangani form Asesmen Mandiri.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </font>
</div>

<div class="container-fluid">
    <font size="2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-body">
                        <?php $i = 0; ?>

                        @foreach ($units as $unit)
                        @php
                        $r = 1;
                        @endphp
                        <br>
                        <table style="min-width: 100%" border="3" class="my-text">

                            <tr>
                                <th width="350px">Kode Unit : </th>
                                <th colspan="3">{{ $unit->unit_code }}</th>
                            </tr>

                            <tr>
                                <th>Judul Unit :</th>
                                <th colspan="3">{{ $unit->unit_title }}</th>
                            </tr>

                            <tr>
                                <th rowspan="2">&ensp;Dapatkah Saya...?&ensp;</th>
                                <th colspan="2" style="text-align:center">&ensp;Penilaian&ensp;</th>
                                <th rowspan="2" width="200px" style="text-align:center">&ensp;Bukti-bukti Kompetensi&ensp;</th>
                            </tr>

                            <tr align="center">
                                <th width="50px">&ensp;&ensp;K&ensp;&ensp;</th>
                                <th width="50px">&ensp;BK&ensp;&ensp;</th>
                            </tr>


                            @foreach ($unit->elements as $element)
                            <tr>
                                <td style="width: 50%">
                                    <b>Element : {{ $element->element_title }}</b><br>
                                    <b>Kriteria unjuk kerja: </b><br>
                                    @foreach ($element->criterias as $criteria)
                                    <p>{{ $r.'.'.$loop->iteration.' '.$criteria->criteria_title }}</p>
                                    @endforeach
                                    @php
                                    $r++;
                                    @endphp
                                </td>

                                <th class="text-center">
                                    <br>
                                    <div class="form-check">
                                        <label class="radio-inline" for="{{ $element->id }}">
                                            <input required class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="K" @if ($assessment && $assessment[$i]=='K' ) checked @endif disabled>
                                        </label>
                                    </div>
                                </th>

                                <th class="text-center">
                                    <br>
                                    <div class="form-check">
                                        <label class="radio-inline" for="{{ $element->id }}">
                                            <input class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="BK" @if ($assessment && $assessment[$i]=='BK' ) checked @endif disabled>
                                        </label>
                                        <?php $i++; ?>
                                    </div>
                                </th>
                                <td>
                                    <a href="{{ asset('storage/' . $apl01->transcript) }}" class="my-text-link">Transkip
                                        nilai atau sertifikat pelatihan yang relevan dengan skema
                                        {{ $skema->schema_title }}</a><br><br>
                                    <a href="{{ asset('storage/' . $apl01->work_exper_certif) }}" class="my-text-link">Surat
                                        keterangan pengalaman kerja yang relevan dalam bidang {{ $skema->schema_title }}
                                        minimal 1 tahun</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </font>
</div>
<br>

<div class="container-fluid">
    <font size="2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark">
                    <p class="my-text"><br>&emsp; Note ***) Diisi oleh Assessor</p>
                    <div class="card-body">
                    <table style="min-width: 100%" border="3" class="my-text">
                            <tr>
                                <th width="400px">&ensp;Rekomendasi </th>
                                <th colspan="2" width="150px">&ensp;Pemohon **)&ensp;</th>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    <p class="form-check-inline">&emsp;1. Assessment
                                        <input required class="form-check-input" type="radio" name="status" id="status" value="1" @if ($apl02->status == '1') checked @endif>
                                        <label class="form-check-label" for="status">Dilanjutkan</label>

                                        <input class="form-check-input" type="radio" name="status" id="status" value="0" @if ($apl02->status == '0') checked @endif>
                                        <label class="form-check-label" for="status">Tidak Dilanjutkan</label>
                                    </p>

                                    <p class="form-check-inline">&emsp;2. Proses Assessment dilanjutkan Melalui
                                        <input required class="form-check-input" type="radio" name="lane" id="lane" value="Uji Kompetensi" @if ($apl02->lane == 'Uji Kompetensi') checked @endif>
                                        <label class="form-check-label" for="lane">Uji Kompetensi</label>

                                        <input class="form-check-input" type="radio" name="lane" id="lane" value="Asesmen Portofolio" @if ($apl02->lane == 'Asesmen Portofolio') checked @endif>
                                        <label class="form-check-label" for="lane">Asesmen Portofolio</label>
                                    </p>
                                </td>
                                <td width="50px">&ensp;Nama&ensp;</td>
                                <th width="100px">&ensp;{{ $assessi->data_assessi->name }}&ensp;</th>
                            </tr>

                            <tr>
                                <td>&ensp;TTD&ensp;</td>
                                <th>
                                    <div class="col-xl-4">
                                        <div class="input-group mb-3">
                                        </div>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <td rowspan="3">&ensp;
                                    <div class="col-xl-10">
                                        <label class="my-text">&emsp;Catatan&emsp;:</label>
                                        <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5" value=" {{ $apl02->note, old ('note') }}">{{ $apl02->note }}</textarea>
                                        @error('note')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div> <br>
                                </td>
                                <th colspan="2">&ensp;Admin LSP/Assesor ***)&ensp;</th>

                            </tr>

                            <tr>
                                <th>&ensp;Nama&ensp;</th>
                                <th>&ensp;{{ $asesor->data_assessor->name }}&ensp;</th>

                            </tr>
                            <tr>
                                <th>&ensp;TTD&ensp;</th>
                                <th>
                                    <div class="col-xl-4">
                                        <div class="input-group mb-3">
                                        </div>
                                    </div>
                                </th>
                            </tr>

                    </div>
                    </table>
                    
                </div>
            </div>
        </div>
    </font>
</div>