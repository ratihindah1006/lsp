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
            <td width="100">Alamat Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_address }}</td>
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
            <td width="100"> Alamat</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->address }}</td>
            <td width="100">Fax Kantor</td>
            <td width="10">:</td>
            <td width="150">{{ $apl01->comp_fax }}</td>
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
            <td width="150">{{ $category->category_title }}</td>
        </tr>
    </tbody>
</table><br>
<div>
    <table border="1" style="border-style: solid;">
        <thead class="my-text font-weight-bold">
            <tr>
                <th>No</th>
                <th>Kode Unit</th>
                <th>Judul Unit</th>
                <th>Jenis Standar</th>
            </tr>
        </thead>
        <tbody class="my-text">
            @foreach ($assessis->units as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->unit_code }}</td>
                    <td>{{ $value->unit_title }}</td>
                    <td>{{ $value->schema->competency_package }}</td>
            @endforeach
        </tbody>
    </table>
</div>
{{-- <div class="card-header">
    
</div>
<h4 class="font-weight-bold ">Data Pribadi</h4>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold ">Nama Lengkap : {{ $apl01->name }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="nik">NIK : {{ $apl01->nik }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="gender">Jenis Kelamin : {{ $apl01->gender }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="place_of_birth">Tempat Lahir
        :{{ $apl01->place_of_birth }} </label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold " for="date_of_birth">Tanggal Lahir
        :{{ $apl01->date_of_birth }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="domicile">Kota : {{ $apl01->domicile }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="address">Alamat : {{ $apl01->address }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="no_hp">Nomor Ponsel : {{ $apl01->no_hp }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="email">Email : {{ $apl01->email }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="last_education">Pendidikan Terakhir :{{ $apl01->last_education }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold " for="nationality">Kebangsaan:{{ $apl01->nationality }}</label>
</div>

<h4 class="font-weight-bold">Data Pekerjaan</h4>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="comp_name">Nama Perusahaan :{{ $apl01->comp_name }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="job_title">Pekerjaan :{{ $apl01->job_title }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="position">Jabatan :{{ $apl01->position }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="comp_address">Alamat Kantor :{{ $apl01->comp_address }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="comp_telp">Telepon Kantor :{{ $apl01->comp_telp }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="comp_email">Email Kantor:{{ $apl01->comp_email }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="comp_fax">Fax Kantor :{{ $apl01->comp_fax }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="postal_code">Kode Pos :{{ $apl01->postal_code }}</label>
</div>
<h4 class="font-weight-bold">Data Sertifikasi</h4>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold" for="sert_schema">Skema Sertifikasi :{{ $apl01->sert_schema }}</label>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label font-weight-bold  " for="assessment_purpose">Tujuan Assessment :{{ $apl01->assessment_purpose }}</label>
</div>
<pre>

    <label >Judul : {{ $assessis->schema_title }}</label>

    <label >Nomor Skema :{{ $assessis->no_skkni }}</label>

</pre>
    <div class="table-responsive my-text">
        <table class="table table-bordered ">
            <thead class="my-text font-weight-bold">
                <tr>
                    <th>No</th>
                    <th>Kode Unit</th>
                    <th>Judul Unit</th>
                    <th>Jenis Standar</th>
                </tr>
            </thead>
            <tbody class="my-text">
                @foreach ($assessis->units as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->unit_code }}</td>
                        <td>{{ $value->unit_title }}</td>
                        <td>{{ $value->schema->competency_package }}</td>
                @endforeach
            </tbody>
        </table>
    </div> --}}
