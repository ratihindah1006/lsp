<h4 class="font-weight-bold card-title">FR-APL-01 FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</h4>
<table style="margin-left:auto;margin-right:auto">
    <tbody>
        <tr>
            <td width="100" ><b> Data Diri</b></td>
            <td width="10"></td>
            <td width="150"></td>
            <td width="100"><b> Data Pekerjaan </b></td>
            <td width="10"></td>
            <td width="150"></td>
        </tr>
        <tr >
            <td width="100"> Nama lengkap</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->name }}</td>
            <td width="100">Nama Perusahaan</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_name }}</td>
        </tr>
        <tr >
            <td width="100"> NIK</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->nik }}</td>
            <td width="100">Pekerjaan</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->job_title }}</td>
        </tr>
        <tr >
            <td width="100"> Jenis Kelamin</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->gender }}</td>
            <td width="100">Jabatan</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->position }}</td>
        </tr>
        <tr >
            <td width="100"> Tempat Lahir</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->place_of_birth }}</td>
            <td width="100">Fax Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_fax }}</td>
        </tr>
        <tr >
            <td width="100"> Tanggal Lahir</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->date_of_birth }}</td>
            <td width="100">Telepon Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_telp }}</td>
        </tr>
        <tr >
            <td width="100">Kota Domisili</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->domicile }}</td>
            <td width="100">Email Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_email }}</td>
        </tr>
        <tr >
             <td width="100"> Nomor Ponsel</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->no_hp }}</td>
            <td width="100">Kode Pos</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->postal_code }}</td>
        </tr>
        <tr >
           
            <td width="100"> Alamat</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->address }}</td>
            <td width="100">Alamat Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_address }}</td>
            
        </tr>
        <tr >
            <td width="100"> Pendidikan Terakhir</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->last_education }}</td>
            <td width="100"></td>
            <td width="10"></td>
            <td width="150"></td>
        </tr>
        <tr >
            <td width="100"> Kebangsaan</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->nationality }}</td>
            <td width="100"></td>
            <td width="10"></td>
            <td width="150"></td>
        </tr>
    </tbody>
</table><br>
<h4 class="font-weight-bold">Data Sertifikasi</h4>
<table>
    <tbody>
        <tr>
            <td width="100"> Skema Sertifikasi</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->sert_schema }}</td>
            <td width="100">Tujuan Assessment</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->assessment_purpose }}</td>
        </tr>
        <tr>
            <td width="100"> Judul</td>
            <td width="10">:</td>
            <td width="150">{{ $assessis->schema_title }}</td>
            <td width="100">Nomor Skema</td>
            <td width="10">:</td>
            <td width="150">{{ $assessis->schema_code }}</td>
        </tr>
    </tbody>
</table><br>
<div>
    <table border="1" style="border-style: solid;">
        <thead class="my-text font-weight-bold">
            <tr>
                <th width="10">No</th>
                <th width="100">Kode Unit</th>
                <th width="290">Judul Unit</th>
                <th width="100">Jenis Standar</th>
            </tr>
        </thead>
        <tbody class="my-text">
          @foreach ($assessis->unit_schemas as $value)
                                                
            <tr>
                <td>{{ $loop->iteration }}</td>
                 <td>{{ $value->unit->unit_code }}</td>
                <td>{{ $value->unit->unit_title }}</td>
                <td>{{ $value->schema->competency_package }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
