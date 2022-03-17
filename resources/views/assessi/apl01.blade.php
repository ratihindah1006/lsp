@extends('layout.assessi')

@section('container')
    <form action="/beranda/{{ $assessi->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-12">
                    <div class="card text-dark">
                        <div class="card-header">
                            <h2 class="font-weight-bold card-title">FR-APL-01 FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</h2>
                            <button type="submit" class="btn btn-whatsapp float-right mr-3">Cetak<span
                                class="btn-icon-right"><i class="ti ti-printer"></i></span></button>
                        </div>
                        {{-- <div class="card-header">
                                <button type="submit" class="btn btn-whatsapp button-right">Simpan <span
                                        class="btn-icon-right"><i class="fa fa-check"></i></span>
                                </button>&nbsp;
                                <a href="/beranda" type="submit" class="btn btn-reddit ">Batal <span
                                        class="btn-icon-right"><i class="fa fa-close"></i></span>
                                </a>
                            </div> --}}
                        <div class="card-body">
                            <div class="form-validation">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h4 class="font-weight-bold ">Data Pribadi</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold ">Nama
                                                Lengkap
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                    name="name"
                                                    @if ($apl01 != null) {
                                                    value= "{{ $apl01->name }}"
                                                    }
                                                @else{
                                                    value="{{ old('name') }}"
                                                } @endif
                                                    id="name">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="nik">NIK
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->nik }}"
                                            }@else{
                                            value="{{ old('nik') }}"
                                            } @endif
                                                    id="nik" name="nik">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="gender">Jenis Kelamin
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('gender') is-invalid @enderror"
                                                    id="gender" name="gender">
                                                    <option value="">- - Pilih - -</option>
                                                    <option value="laki-laki"
                                                        @if ($apl01 != null) {{ $apl01->gender === 'laki-laki' ? 'selected' : '' }}@else{{ old('gender') == 'laki-laki' ? 'selected' : '' }} @endif>
                                                        Laki-Laki</option>
                                                    <option value="perempuan"
                                                        @if ($apl01 != null) {{ $apl01->gender === 'perempuan' ? 'selected' : '' }} @else {{ old('gender') == 'perempuan' ? 'selected' : '' }} @endif>
                                                        Perempuan</option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="place_of_birth">Tempat Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('place_of_birth') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->place_of_birth }}"
                                            }@else{
                                            value="{{ old('place_of_birth') }}"
                                            } @endif
                                                    id="place_of_birth" name="place_of_birth">
                                                @error('place_of_birth')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date"
                                                    class="form-control @error('date_of_birth') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->date_of_birth }}"
                                            }@else{
                                            value="{{ old('date_of_birth') }}"
                                            } @endif
                                                    id="date_of_birth" name="date_of_birth">
                                                @error('date_of_birth')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="domicile">Kota Domisili
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('domicile') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->domicile }}"
                                            }@else{
                                            value="{{ old('domicile') }}"
                                            } @endif
                                                    id="domicile" name="domicile">
                                                @error('domicile')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="address">Alamat
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->address }}"
                                            }@else{
                                            value="{{ old('address') }}"
                                            } @endif
                                                    id="address" name="address">
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="no_hp">Nomor Ponsel
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->no_hp }}"
                                            }@else{
                                            value="{{ old('no_hp') }}"
                                            } @endif
                                                    id="no_hp" name="no_hp">
                                                @error('no_hp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="email">Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->email }}"
                                            }@else{
                                            value="{{ old('email') }}"
                                            } @endif
                                                    id="email" name="email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="last_education">Pendidikan Terakhir
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('last_education') is-invalid @enderror"
                                                    id="last_education" name="last_education">
                                                    <option value="">- - Pilih - -</option>
                                                    <option value="sma"
                                                        @if ($apl01 != null) {{ $apl01->last_education === 'sma' ? 'selected' : '' }}@else{{ old('last_education') == 'sma' ? 'selected' : '' }} @endif>
                                                        SMA</option>
                                                    <option value="s1"
                                                        @if ($apl01 != null) {{ $apl01->last_education === 's1' ? 'selected' : '' }}@else{{ old('last_education') == 's1' ? 'selected' : '' }} @endif>
                                                        S1
                                                    </option>
                                                    <option value="s2"
                                                        @if ($apl01 != null) {{ $apl01->last_education === 's2' ? 'selected' : '' }}@else{{ old('last_education') == 's2' ? 'selected' : '' }} @endif>
                                                        S2
                                                    </option>
                                                </select>
                                                @error('last_education')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="nationality">Kebangsaan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('nationality') is-invalid @enderror"
                                                    id="nationality" name="nationality">
                                                    <option value="">- - Pilih - -</option>
                                                    <option value="wni"
                                                        @if ($apl01 != null) {{ $apl01->nationality === 'wni' ? 'selected' : '' }}@else{{ old('nationality') == 'wni' ? 'selected' : '' }} @endif>
                                                        WNI
                                                    </option>
                                                    <option value="wna"
                                                        @if ($apl01 != null) {{ $apl01->nationality === 'wna' ? 'selected' : '' }}@else{{ old('nationality') == 'wna' ? 'selected' : '' }} @endif>
                                                        WNA
                                                    </option>
                                                </select>
                                                @error('nationality')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <h4 class="font-weight-bold">Data Pekerjaan</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_name">Nama Perusahaan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('comp_name') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->comp_name }}"
                                            }@else{
                                            value="{{ old('comp_name') }}"
                                            } @endif
                                                    id="comp_name" name="comp_name">
                                                @error('comp_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="job_title">Pekerjaan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('job_title') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->job_title }}"
                                            }@else{
                                            value="{{ old('job_title') }}"
                                            } @endif
                                                    id="job_title" name="job_title">
                                                @error('job_title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="position">Jabatan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('position') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->position }}"
                                            }@else{
                                            value="{{ old('position') }}"
                                            } @endif
                                                    id="position" name="position">
                                                @error('position')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_address">Alamat Kantor<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('comp_address') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->comp_address }}"
                                            }@else{
                                            value="{{ old('comp_address') }}"
                                            } @endif
                                                    id="comp_address" name="comp_address" rows="5"
                                                    placeholder="Tuliskan alamat kantor">
                                                @error('comp_address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_telp">Telepon Kantor
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('comp_telp') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->comp_telp }}"
                                            }@else{
                                            value="{{ old('comp_telp') }}"
                                            } @endif
                                                    id="comp_telp" name="comp_telp" placeholder="212-999-0000">
                                                @error('comp_telp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_email">Email Kantor
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email"
                                                    class="form-control @error('comp_email') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->comp_email }}"
                                            }@else{
                                            value="{{ old('comp_email') }}"
                                            } @endif
                                                    id="comp_email" name="comp_email" placeholder="xxxx@mail.com">
                                                @error('comp_email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_fax">Fax Kantor
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('comp_fax') is-invalid @enderror"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->comp_fax }}"
                                            }@else{
                                            value="{{ old('comp_fax') }}"
                                            } @endif
                                                    id="comp_fax" name="comp_fax">
                                                @error('comp_fax')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="postal_code">Kode Pos
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text"
                                                    class="form-control @error('postal_code') is-invalid @enderror"
                                                    id="postal_code" name="postal_code"
                                                    @if ($apl01 != null) {
                                            value= "{{ $apl01->postal_code }}"
                                            }@else{
                                            value="{{ old('postal_code') }}"
                                            } @endif>
                                                @error('postal_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        <div class="card-header">
                            <h4 class="font-weight-bold">Data Sertifikasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold   "
                                                for="sert_schema">Skema Sertifikasi
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('sert_schema') is-invalid @enderror"
                                                    id="sert_schema" name="sert_schema">
                                                    <option value="">- - Pilih - -</option>
                                                    <option value="kkni"
                                                        @if ($apl01 != null) {{ $apl01->sert_schema === 'kkni' ? 'selected' : '' }}@else{{ old('sert_schema') == 'kkni' ? 'selected' : '' }} @endif>
                                                        KKNI
                                                    </option>
                                                    <option value="klaster"
                                                        @if ($apl01 != null) {{ $apl01->sert_schema === 'klaster' ? 'selected' : '' }}@else{{ old('sert_schema') == 'klaster' ? 'selected' : '' }} @endif>
                                                        Klaster
                                                    </option>
                                                    <option value="okupasi"
                                                        @if ($apl01 != null) {{ $apl01->sert_schema === 'okupasi' ? 'selected' : '' }}@else{{ old('sert_schema') == 'okupasi' ? 'selected' : '' }} @endif>
                                                        Okupasi
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="assessment_purpose">Tujuan Assessment
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select
                                                    class="form-control @error('assessment_purpose') is-invalid @enderror"
                                                    id="assessment_purpose" name="assessment_purpose">
                                                    <option value="">- - Pilih - -</option>
                                                    <option value="sertifikasi baru"
                                                        @if ($apl01 != null) {{ $apl01->assessment_purpose === 'sertifikasi baru' ? 'selected' : '' }}@else{{ old('assessment_purpose') == 'sertifikasi baru' ? 'selected' : '' }} @endif>
                                                        Sertifikasi Ulang</option>
                                                    <option value="sertifikasi ulang"
                                                        @if ($apl01 != null) {{ $apl01->assessment_purpose === 'sertifikasi ulang' ? 'selected' : '' }}@else{{ old('assessment_purpose') == 'sertifikasi ulang' ? 'selected' : '' }} @endif>
                                                        Sertifikasi Baru</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-10 my-text " for="">Judul
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;&emsp;
                                                {{ $assessis->schema_title }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-10  my-text " for="">Nomor
                                                Skema&emsp;&emsp;:&emsp;&emsp;
                                                {{ $assessis->no_skkni }}
                                            </label>
                                        </div>
                                    </div>
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
                                    </div>
                                </div>
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
                        <div class="card-header">
                            <h4 class="font-weight-bold">Berkas Kelengkapan Pemohon </h4>
                        </div>
                        <div class="card-header">
                            <h6>*Berkas diupload dengan format pdf dengan ukuran max 1 MB</h6>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="font-weight-bold  ">1.&ensp; Ijazah Pendidikan Terakhir (
                                            Minimal SMA)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class=" input-group mb-3">
                                            <input class="form-control @error('ijazah') is-invalid @enderror" type="file"
                                                value="{{ old('ijazah') }}" id="ijazah" name="ijazah">
                                            @error('ijazah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <label class="font-weight-bold  ">2.&ensp; Pas Foto Berwarna
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="mb-3">
                                            <input type="file"
                                                class="form-control
                                         @error('photo') is-invalid @enderror"
                                                value="{{ old('photo') }}" id="photo" name="photo">
                                            @error('photo')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="font-weight-bold  ">3.&ensp; KTP/SIM/Paspor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control @error('ktp') is-invalid @enderror"
                                                value="{{ old('ktp') }}" id="ktp" name="ktp">
                                            @error('ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <label class="font-weight-bold  ">4.&ensp; Transkip Nilai
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="mb-3">
                                            <input type="file"
                                                class="form-control @error('transcript') is-invalid @enderror"
                                                value="{{ old('transcript') }}" id="transcript" name="transcript">
                                            @error('transcript')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="font-weight-bold  ">5.&ensp; Surat Keterangan Pengalaman
                                            Kerja
                                            Minimal 1 Tahun (Jika Ada)
                                        </label>
                                        <div class="mb-3">
                                            <input type="file" class="form-control" id="work_exper_certif"
                                                name="work_exper_certif">
                                        </div>
                                    </div>
                                </div>
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
                        <div class="card-header">
                            <h4 class="font-weight-bold ">Halaman Persetujuan</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <p class="my-text">
                                                Berdasarkan Ketentuan Persyaratan Dasar Pemohon,<br>
                                                Maka Pemohon &emsp;:<br>
                                                Diterima / Ditolak
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="my-text">Catatan&emsp;:</label>
                                            <textarea class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" id="note" name="note"
                                                rows="5" placeholder="catatan" disabled></textarea>
                                            @error('note')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <div class="input-group mb-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <div class="input-group mb-3">
                                                <input type="file"
                                                    class="form-control @error('assessi_signature') is-invalid @enderror"
                                                    value="{{ old('assessi_signature') }}" id="assessi_signature"
                                                    name="assessi_signature">
                                                @error('assessi_signature')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <label class="my-text txt ">TTD Assssi
                                                <span class="text-danger txt">*</span>
                                                <p>(*format jpg) </p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right mr-3">Save <span
                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                            <a href="/beranda" class="btn btn-outline-primary float-right mr-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
