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
    @foreach ($unit as $u)
    <tr>
        <td width="1500px">Kode Unit : {{ $u->unit_code }}</td>
    </tr>

    <tr>
        <td>Judul Unit : {{ $u->unit_title }}</td>
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

    <tr>
        @foreach ($u->elements as $e)
        <td>Elemen : {{ $e->element_title }}<br>
            Kriteria Unjuk Kerja : <br>
            @foreach ($e->criterias as $c)
            <br>{{ $c->criteria_title }}
            @endforeach
        </td>
        <td><input type="checkbox" name="k"></td>
        <td><input type="checkbox" name="bk"></td>
        <td><input type="checkbox" name="file"></td>

    </tr>
    @endforeach


    @endforeach
</table>

