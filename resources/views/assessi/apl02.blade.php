@extends('layout.assessi')

@section('container')
<br>
<form method="post" action="/apl02/store/{{ $asesi->id }}">
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-footer" style=" border-bottom: 7px solid  #191970;">
                        <h2 class="font-weight-bold card-title">FR-APL-02 ASSESMEN MANDIRI</h2>
                        @if($apl02 != null)
                        @if ($apl02->status != null)
                        <a href="/exportapl02/{{ $asesi->id }}" class="btn btn-whatsapp float-right mr-3">Cetak<span class="btn-icon-right"><i class="ti ti-printer"></i></span></a>
                        @else
                        <a href="/exportapl02/{{ $asesi->id }}" class="btn btn-whatsapp float-right mr-3 disabled">Cetak<span class="btn-icon-right"><i class="ti ti-printer"></i></span></a>

                        @endif
                        @else
                        <a href="/exportapl02/{{ $asesi->id }}" class="btn btn-whatsapp float-right mr-3 disabled">Cetak<span class="btn-icon-right"><i class="ti ti-printer"></i></span></a>
                        @endif
                        <button type="submit" class="btn btn-primary float-right mr-1">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                        <a href="/beranda" class="btn btn-danger float-right mr-1">Batal <span class="btn-icon-right"><i class="fa fa-close"></i></span></a>
                    </div>

                    <div class="card-body" style="border: none">
                        <div class="my-text">
                            <p>&emsp; Panduan Asesmen mandiri</p><br>
                            <p>&emsp; Judul Skema Sertifikasi &emsp; : &emsp; {{$skema->schema_title}}</p>
                            <p>&emsp; Nomor &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$skema->schema_code}}</p>
                            <p>&emsp; Tempat Uji Kompetensi&emsp;&ensp; : &emsp; {{$class->tuk}}</p>
                            <p>&emsp; Nama Asesor &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$asesor->data_assessor->name}}</p>
                            <p>&emsp; Nama Asesi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{$asesi->data_assessi->name}}</p>
                            <p>&emsp; Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{$asesi->schema_class->event->event_time}}</p><br>
                            <p>&emsp;Asesi diminta untuk :</p>
                            <ul style="list-style: none">
                                <li>&emsp;1. Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta
                                    untuk di Ases.</li>
                                <li>&emsp;2. Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas
                                    pertanyaan tersebut, tuliskan tanda ? pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda ? pada kolom (BK).</li>
                                <li>&emsp;3. Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).</li>
                                <li>&emsp;4. Menandatangani form Asesmen Mandiri.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-header" style="border-top: 7px solid  #191970;">
                        <?php $i = 0; ?>
                        <?php $j = 0; ?>
                        <?php $k = 0; ?>
                        <div class="card-body" style="border: none">

                            <?php $xxx = 1; ?>
                            @foreach ($units as $unit)<br>
                            @php
                            $r = 1;
                            @endphp
                            <table style="min-width: 100%" border="3" class="my-text">

                                <tr>
                                    <th width="500px">Kode Unit : </th>
                                    <th colspan="3" width="500px">{{ $unit->unit->unit_code }}</th>
                                </tr>

                                <tr>
                                    <th>Judul Unit :</th>
                                    <th colspan="3">{{ $unit->unit->unit_title }}</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">&ensp;Dapatkah Saya...?&ensp;</th>
                                    <th colspan="2" width="350px" style="text-align:center">&ensp;Penilaian&ensp;</th>
                                    <th rowspan="2" width="350px" style="text-align:center"> <input type="checkbox" class="checkedall_{{ $xxx }}" onchange="checkedAll(this, event)">&ensp;Bukti-bukti Kompetensi&ensp;</th>
                                </tr>

                                <tr align="center">
                                    <th>&ensp;&ensp;K&ensp;&ensp;</th>
                                    <th>&ensp;BK&ensp;&ensp;</th>
                                </tr>


                                @foreach ($unit->unit->elements as $element)
                                <tr>
                                    <td style="width: 50%">
                                        <b>Element : {{ $element->element_title }}</b><br>
                                        <b>Kriteria unjuk kerja: </b><br>
                                        <ul style="list-style: none">
                                            @foreach ($element->criterias as $criteria)
                                            <li>{{ $r.'.'.$loop->iteration.' '.$criteria->criteria_title }}</li>
                                            @endforeach
                                        </ul>
                                        @php
                                        $r++;
                                        @endphp
                                    </td>

                                    <th class="text-center">
                                        <br>
                                        <div class="form-check">
                                            <input required class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="K" @if(isset($assessment[$i])) @if($assessment && $assessment[$i]=='K' ) checked @endif @endif>
                                            <label class="form-check-label" for="{{ $element->id }}">
                                            </label>
                                        </div>
                                    </th>

                                    <th class="text-center">
                                        <br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="element_{{ $element->id }}" id="{{ $element->id }}" value="BK" @if(isset($assessment[$i])) @if($assessment && $assessment[$i]=='BK' ) checked @endif @endif>
                                            <label class="form-check-label" for="{{ $element->id }}">
                                            </label>
                                            <?php $i++; ?>
                                        </div>
                                    </th>
                                    <td>
                                        <label> 1. 
                                    <input required type="checkbox" name="elemen_{{ $element->id }}" id="{{ $element->id }}" class="checkbox_{{ $xxx }}" value="1" @if(isset($transcript[$j])) @if($transcript && $transcript[$j]=='1' ) checked @endif @endif>
                                        <a href="{{ asset('storage/'.$apl01->transcript) }}" class="my-text-link">Transkip nilai atau sertifikat pelatihan yang relevan dengan skema {{$skema->schema_title}}</a><br>
                                        </label>
                                        <?php $j++; ?>
                                        
                                        <label> 2. 
                                    <input required type="checkbox" name="elemenn_{{ $element->id }}" id="{{ $element->id }}" class="checkbox_{{ $xxx }}" value="1" @if(isset($work_exper_certif[$k])) @if($work_exper_certif && $work_exper_certif[$k]=='1' ) checked @endif @endif>
                                        <a href="{{ asset('storage/'.$apl01->work_exper_certif) }}" class="my-text-link">Surat keterangan pengalaman kerja yang relevan dalam bidang {{$skema->schema_title}} minimal 1 tahun</a>
                                        </label>
                                        <?php $k++; ?>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </table>
                            <?php $xxx++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-dark">
                    <div class="card-header" style="border-top: 7px solid  #191970;">
                        <div class="card-body" style="border: none">
                            <p class="my-text">Note ***) Diisi oleh Assessor</p>

                            <table style="min-width: 100%" border="3" class="my-text">
                                <tr>
                                    <th width="800px">&ensp;Rekomendasi </th>
                                    <th colspan="2" width="300px">&ensp;Pemohon **)&ensp;</th>
                                </tr>

                                <tr>
                                    <th rowspan="1">
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
                                    <td width="200px" valign="top">&ensp;Nama : &ensp;</td>
                                    <th>&ensp;{{ $asesi->data_assessi->name }}&ensp;
                                        <p>&ensp;Tanda Tangan : &ensp;</p>
                                        <p>
                                        <div class="col-xl-4">
                                            <div class="input-group mb-3">
                                                <img class="txt" src="{{ asset('storage/' . $apl01->assessi_signature) }}" width="100px" height="100px">
                                                <div class="custom-control custom-switch d-inline">
                                                    <input type="checkbox" class="custom-control-input" name="assessi_agreement" id="assessi_agreement" required @if (isset($apl02['assessi_agreement'])) @if ($apl02['assessi_agreement']) {{ 'checked' }} @endif @endif>
                                                    <label class="custom-control-label" for="assessi_agreement"></label>
                                                </div>
                                            </div>
                                        </div>
                                        </p>
                                    </th>
                                </tr>

                                <tr>
                                    <th rowspan="3">&ensp;
                                        <div class="col-xl-10">
                                            <label class="my-text">Catatan&emsp;:</label>
                                            @if ($apl02 != null)
                                                @if ($apl02->note != null)
                                                    <textarea class="form-control @error('note') is-invalid @enderror" style="text-align: left; padding:10px" id="note"
                                                        name="note" rows="3" disabled
                                                        value="{{ $apl01->note }}">{{ $apl02->note }}</textarea>
                                                @endif
                                            @else
                                                <textarea class="form-control @error('note') is-invalid @enderror" style="text-align: left; padding:10px" id="note"
                                                    name="note" rows="3" disabled value=""></textarea>
                                            @endif
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
                                    <td valign="top">&ensp;Nama : &ensp;</td>
                                    <th>&ensp;{{ $asesor->data_assessor->name }}&ensp;
                                        <p>&ensp;Tanda Tangan : &ensp;</p>
                                        <p>
                                        <div class="col-xl-4">
                                            <div class="input-group mb-3">
                                                <img class="txt" src="{{ asset('storage/' . $asesor->data_assessor->assessor_signature) }}" width="100px" height="100px">
                                            </div>
                                        </div>
                                        </p>
                                    </th>

                                </tr>
                                <tr>
                                    <td>&ensp;No. Registrasi&ensp;</td>
                                    <th>&ensp;{{ $asesor->data_assessor->no_met }}&ensp;
                                </tr>

                        </div>
                    </div>
                    </table><br>
                    <div class="col">
                        <center><a href="#" class="btn btn-dark">Ke Atas <span class="btn-icon-right"><i class="fa fa-arrow-up"></i></span></a></center>
                    </div> <br><br>

                </div>
            </div>
        </div>
    </div>
</form>




@endsection
@section("script")
    <script>
        function checkedAll (element, e) {
            const e_class = element.className;
            const no = e_class.split("_")[1];
            const t_class = `.checkbox_${no}`;
            $(t_class).prop("checked", element.checked);
        }
    </script>
@endsection