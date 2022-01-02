@extends('layout.assessi')

@section('container')
<br>

<h1 align="center">APL-02 ASESMEN MANDIRI</h1>
<br><br>
<p class="my-text">Panduan Asesmen mandiri</p><br>
<p class="my-text">Judul Skema Sertifikasi &emsp; : &emsp; {{$skema->schema_title}}</p>
<p class="my-text">Nomor &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$skema->schema_code}}</p>
<p class="my-text">Tempat Uji Kompetensi&emsp;&ensp; :</p>
<p class="my-text">Nama Asesor &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : &emsp; {{$asesor->name}}</p>
<p class="my-text">Nama Asesi &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : &emsp; {{$asesi->name}}</p>
<p class="my-text">Tanggal &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; :</p><br>
<p class="my-text">Asesi diminta untuk :</p>
<p class="my-text">1. Mempelajari Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta
    untuk di Ases.
</p>
<p class="my-text">2. Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas
    pertanyaan tersebut, tuliskan tanda ? pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda ? pada kolom (BK).
</p>
<p class="my-text">3. Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).</p>
<p class="my-text">4. Menandatangani form Asesmen Mandiri.
</p><br>

<form method="post" action="/apl02/store">
    @csrf
    <table border="1" class="my-text">

        @foreach ($units as $unit)
        <tr>
            <th width="1000px">&ensp;Kode Unit : </th>
            <th colspan="3">&ensp;{{ $unit->unit_code }}&ensp;</th>
        </tr>

        <tr>
            <th>&ensp;Judul Unit :</th>
            <th colspan="3">&ensp;{{ $unit->unit_title }}&ensp;</th>
        </tr>

        <tr>
            <th rowspan="2">&ensp;Dapatkah Saya...?&ensp;</th>
            <th colspan="2">&ensp;Penilaian&ensp;</th>
            <th rowspan="2">&ensp;Bukti-bukti Kompetensi&ensp;</th>
        </tr>

        <tr>
            <th>&ensp;&ensp;K&ensp;&ensp;</th>
            <th>&ensp;BK&ensp;&ensp;</th>
        </tr>

        @foreach ($unit->elements as $element)
        <tr>
            <th>&ensp;Judul Element : &ensp;{{ $element->element_title }}&ensp;<br>
                &ensp;Kriteria Unjuk Kerja : <br>
                @foreach ($element->criterias as $criteria)
                <br>&ensp; {{ $criteria->criteria_title }}&ensp;
                @endforeach
            </th>

            <th>
                @foreach ($element->criterias as $criteria)
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $criteria->id }}" id="{{ $criteria->id }}">
                    <label class="form-check-label" for="{{ $criteria->id }}">
                    </label>
                </div>
                @endforeach
            </th>
            <th>
                @foreach ($element->criterias as $criteria)
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{ $criteria->id }}" id="{{ $criteria->id }}">
                    <label class="form-check-label" for="{{ $criteria->id }}">
                    </label>
                </div>@endforeach
            </th>





        </tr>


        @endforeach

        @endforeach
    </table><br><br><br>

    <p class="my-text">Note ***) Diisi oleh Assessor</p>
    <table border="1" class="my-text">
        <tr>
            <th width="1000px">&ensp;Rekomendasi </th>
            <th colspan="2">&ensp;Pemohon **)&ensp;</th>
        </tr>
        <tr>
            <th width="1075px">&ensp;
                <p><br>&emsp;1. Assessment</p>
                <p>&emsp;2. Proses Assessment dilanjutkan Melalui</p><br>
            </th>
            <th><p>&ensp;Nama&ensp;</p>
            <p>d</p>
        </th>
            <th>
                <p>&ensp;{{$asesi->name}}&ensp;</p>
                <p>&ensp;TTD&ensp;</p>
            </th>
        </tr>

        <tr>
            <th width="1000px" rowspan="2">&ensp;
                <div class="col-xl-6">
                    <div class="form-group row">
                        <label class="my-text">&emsp;Catatan&emsp;:</label>
                        <textarea class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" id="note" name="note" rows="5" placeholder="Catatan"></textarea>
                        @error('note')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </th>
            <th colspan="2">&ensp;Admin LSP/Assesor ***)&ensp;</th>
        </tr>

        <tr>

            <th>&ensp;Nama&ensp;</th>
            <th>
                <p>&ensp;{{$asesor->name}}&ensp;</p>
                <p>&ensp;TTD&ensp;</p>
            </th>
        </tr>
    </table>
    <div class="col">
        <center><button type="submit" class="btn btn-success mt-4" style="width: 170px">Submit</button></center>
    </div>
</form>


@endsection