
@extends('layout.assessi')

@section('container')
<br>
<h1 align="center">APL-02 ASESMEN MANDIRI</h1>
<br><br>
<p>Panduan Asesmen mandiri</p><br>
<p>Judul Skema Sertifikasi &ensp;&ensp;&ensp; :</p>
<p>Nomor &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :</p>
<p>Tempat Uji Kompetensi&ensp;&ensp;&ensp; :</p>
<p>Nama Asesor &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :</p>
<p>Nama Asesi &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :</p>
<p>Tanggal &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; :</p><br>
<p>Asesi diminta untuk :</p>
<p>1. Mempelajari Kriteria Unjuk Kerja (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta
untuk di Ases.
</p>
<p>2. Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas
pertanyaan tersebut, tuliskan tanda ? pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda ? pada kolom (BK).
</p>
<p>3. Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).</p>
<p>4. Menandatangani form Asesmen Mandiri.
</p><br>


<table border="1">
  
    @foreach ($assessi as $a)
    <tr>
        <td width="1500px">Kode Schema : {{ $a->schema->schema_code}}</td>
    </tr>

    <tr>
         <td>Judul Schema :  {{ $assessi->schema->schema_title}}</td>
    </tr>
    @foreach ($schemas as $item)
<tr>
    
    <td width="1500px">Kode Unit : {{ $item->units->pluck('unit_code')}}</td>
    
</tr>
<tr>
    
    <td width="1500px">judul Unit : {{ $item->units->pluck('unit_title')}}</td>
    
</tr>

<tr>
    @foreach ($units as $item)
    <td width="1500px">Kode Element : {{ $item->elements->pluck('element_code')}}</td>
    
</tr>
<tr>
    
    <td width="1500px">judul elemen : {{ $item->elements->pluck('element_title')}}</td>
    
</tr>
@foreach ($elements as $item)
<tr>
  
    <td width="1500px">Kode Element : {{ $item->criterias->pluck('criteria_title')}}</td>
    
</tr>

    <tr>
        <th rowspan="2">Dapatkah Saya...?</th>
        <th colspan="2" >Penilaian</th>
        <th rowspan="2">Bukti-bukti Kompetensi</th>
    </tr>
    <tr>
        <th>K</th>
        <th>BK</th>
    </tr>
@endforeach
@endforeach
    @endforeach


    @endforeach
</table>

@endsection