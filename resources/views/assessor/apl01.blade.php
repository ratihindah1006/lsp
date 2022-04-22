@extends('layout.assessor')

@section('container')
    <form action="/list01/{{ $assessi->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-12">
                    < <div class="card text-dark">
                        <div class="card-footer" style=" border-bottom: 7px solid  #191970;">
                            <h2 class="font-weight-bold card-title">FR-APL-01 FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</h2>
                            <a href="/exportlaporan_apl01/{{$assessi->id}}" class="btn btn-whatsapp float-right mr-3">Cetak<span
                                class="btn-icon-right"><i class="ti ti-printer"></i></span></a>
                            <button type="submit" class="btn btn-primary float-right mr-1">Simpan <span
                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                            <a href="/assessor" class="btn btn-danger float-right mr-1">Batal <span
                                    class="btn-icon-right"><i class="fa fa-close"></i></span></a>
                        </div>
                        <div class="card-body" style="border: none">
                            <div class="form-validation">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h4 class="font-weight-bold ">Data Pribadi</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold "
                                                for="name">Nama
                                                Lengkap
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    value="{{ old('name', $apl01->name) }}" disabled>
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
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="nik" type="text" class="form-control" id="nik"
                                                    value="{{ old('nik', $apl01->nik) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="gender">Jenis Kelamin
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="gender" type="text" class="form-control" id="gender"
                                                    value="{{ old('gender', $apl01->gender) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="place_of_birth">Tempat Lahir
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="place_of_birth" type="text" class="form-control"
                                                    id="place_of_birth"
                                                    value="{{ old('place_of_birth', $apl01->place_of_birth) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="date_of_birth">Tanggal Lahir
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="date_of_birth" type="text" class="form-control"
                                                    id="date_of_birth"
                                                    value="{{ old('date_of_birth', $apl01->date_of_birth) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="domicile">Domisili
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="domicile" type="text" class="form-control" id="domicile"
                                                    value="{{ old('domicile', $apl01->domicile) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="address">Alamat
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control @error('note') is-invalid @enderror" style="text-align: left; padding:10px" id="note"
                                                        name="note" rows="3" disabled
                                                        value="{{ $apl01->address }}">{{ $apl01->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="no_hp">Nomor Hp
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="no_hp" type="text" class="form-control" id=no_hp"
                                                    value="{{ old('no_hp', $apl01->no_hp) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="email">Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="email" type="text" class="form-control" id="email"
                                                    value="{{ old('email', $apl01->email) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="last_education">Pendidikan terakhir
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="last_education" type="text" class="form-control"
                                                    id="last_education"
                                                    value="{{ old('last_education', $apl01->last_education) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="nationality">Email
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="nationality" type="text" class="form-control"
                                                    id="nationality"
                                                    value="{{ old('nationality', $apl01->nationality) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <h4 class="card-title">Data Pekerjaan</h4><br>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_name">Nama Perusahaan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="comp_name" type="text" class="form-control" id="comp_name"
                                                    value="{{ old('comp_name', $apl01->comp_name) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="job_title">Nama Pekerjaan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="job_title" type="text" class="form-control" id="job_title"
                                                    value="{{ old('job_title', $apl01->job_title) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="position">Jabatan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="position" type="text" class="form-control" id="position"
                                                    value="{{ old('position', $apl01->position) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_address">Alamat Perusahaan
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control @error('note') is-invalid @enderror" style="text-align: left; padding:10px" id="note"
                                                name="note" rows="3" disabled
                                                value="{{ $apl01->comp_address }}">{{ $apl01->comp_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_telp">Telepon Perusahaan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="comp_telp" type="text" class="form-control" id="comp_telp"
                                                    value="{{ old('comp_telp', $apl01->comp_telp) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_email">Email Perusahaan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="comp_email" type="text" class="form-control" id="comp_email"
                                                    value="{{ old('comp_email', $apl01->comp_email) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="comp_fax">Fax Perusahaan
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="comp_fax" type="text" class="form-control" id="comp_fax"
                                                    value="{{ old('comp_fax', $apl01->comp_fax) }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="postal_code">Kode Pos
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="postal_code" type="text" class="form-control"
                                                    id="postal_code"
                                                    value="{{ old('postal_code', $apl01->postal_code) }}" disabled>
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
                        <div class="card-header"  style="border-top: 7px solid  #191970;">
                            <h4 class="font-weight-bold">Data Sertifikasi</h4>
                        </div>

                        <div class="card-body" style="border: none">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="sert_schema">Kemasan Kompetensi
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="sert_schema" type="text" class="form-control"
                                                    id="sert_schema"
                                                    value="{{ old('sert_schema', $apl01->sert_schema) }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label font-weight-bold  "
                                                for="assessment_purpose">Tujuan Sertifikasi
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="assessment_purpose" type="text" class="form-control"
                                                    id="assessment_purpose"
                                                    value="{{ old('assessment_purpose', $apl01->assessment_purpose) }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-10 my-text " for="">Judul
                                                &emsp;&emsp;:&emsp;&emsp;
                                                {{ $assessis->schema_title }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-10  my-text " for="">Nomor
                                                SKKNI&emsp;&emsp;:&emsp;&emsp;
                                                {{ $category->no_skkni }}
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
                                                @foreach ($assessis->unit_schemas as $value)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $value->unit->unit_code }}</td>
                                                        <td>{{ $value->unit->unit_title }}</td>
                                                        <td>{{$value->schema->competency_package}}</td>
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
                        <div class="card-header"  style="border-top: 7px solid  #191970;">
                            <h4 class="font-weight-bold">Data Sertifikasi</h4>
                        </div>
                        <div class="card-body" style="border: none">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label class="font-weight-bold  ">1.&ensp; Ijazah Pendidikan Terakhir (
                                            Minimal SMA)</label>
                                        <div class="input-group mb-3">
                                            <iframe type="application/pdf" src="{{ asset('storage/' . $apl01->ijazah) }}"
                                                width="600" height="400"></iframe>
                                        </div>
                                        <label class="font-weight-bold  ">2.&ensp; Pas Foto Berwarna</label>
                                        <div class="input-group mb-3">
                                            <iframe type="application/pdf" src="{{ asset('storage/' . $apl01->photo) }}"
                                                width="600" height="400"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label class="font-weight-bold  ">3.&ensp; KTP/SIM/Paspor</label>
                                        <div class="input-group mb-3">
                                            <iframe type="application/pdf" src="{{ asset('storage/' . $apl01->ktp) }}"
                                                width="600" height="400"></iframe>
                                        </div>
                                        <label class="font-weight-bold  ">4.&ensp; Transkip Nilai</label>
                                        <div class="input-group mb-3">
                                            <iframe type="application/pdf"
                                                src="{{ asset('storage/' . $apl01->transcript) }}" width="600"
                                                height="400"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="font-weight-bold  ">5.&ensp; Surat Keterangan Pengalaman
                                            Kerja Minimal 1</label>
                                        <div class="input-group mb-3">
                                            <iframe type="application/pdf" src="{{ asset('storage/' . $apl01->work_exper_certif) }}"
                                                width="600" height="400"></iframe>
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
                        <div class="card-header"  style="border-top: 7px solid  #191970;">
                            <h4 class="font-weight-bold ">Halaman Persetujuan</h4>
                        </div>
                        <div class="card-body" style="border: none">
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
                                        <div class="form-group row">
                                            <label class=" font-weight-bold  " for="status">Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status">
                                                    <option value=>- - Pilih - -</option>
                                                    <option value="0"
                                                    @if ($apl01 != null) {{ $apl01->status === '0' ? 'selected' : '' }}@else{{ old('status') == '0' ? 'selected' : '' }} @endif>
                                                   Ditolak</option>
                                                    <option value="1"
                                                    @if ($apl01 != null) {{ $apl01->status === '1' ? 'selected' : '' }} @else {{ old('status') == '1' ? 'selected' : '' }} @endif>
                                                    Diterima</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="my-text">Catatan&emsp;:</label>
                                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="3" value=" {{ $apl01->note, old ('note') }}">{{ $apl01->note }}</textarea>
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
                                                <input type="file"
                                                    class="form-control @error('assessor_signature') is-invalid @enderror"
                                                    value="{{ old('assessor_signature') }}" id="assessor_signature"
                                                    name="assessor_signature">
                                                @error('assessor_signature')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <label class="my-text txt ">TTD Assssor
                                                <span class="text-danger txt">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <div class="input-group mb-3">
                                                <img class="txt"
                                                    src="{{ asset('storage/' . $apl01->assessi_signature) }}" width="200px"
                                                    height="150px">
                                            </div>
                                            <label class="my-text txt ">TTD Assssi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <center><a href="#" class="btn btn-dark">Ke Atas <span class="btn-icon-right"><i class="fa fa-arrow-up"></i></span></a></center>
                            </div> <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
