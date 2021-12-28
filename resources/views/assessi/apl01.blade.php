@extends('layout.assessi')

@section('container')
<form  action="/beranda" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <h2 align="center">Data Diri</h2>
            <div class="cards">
                    <div class="card-header">
                        <button type="submit" style="margin-left: 51rem; " class="btn btn-whatsapp">Simpan <span
                                class="btn-icon-right"><i class="fa fa-check"></i></span>
                        </button>
                        {{-- <button type="submit" class="btn btn-reddit">Batal <span class="btn-icon-right"><i
                                    class="fa fa-close"></i></span>
                        </button> --}}
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h4 class="card-title">Data Pribadi</h4><br>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="name">Nama Lengkap
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nik">NIK <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" id="nik" name="nik">
                                            @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="gender">Jenis Kelamin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control @error('gender') is-invalid @enderror"  id="gender" name="gender">
                                                <option value="">- - Pilih - -</option>
                                                <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Laki-Laki</option>
                                                <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="place_of_birth">Tempat Lahir <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" value="{{ old('place_of_birth') }}" id="place_of_birth"
                                                name="place_of_birth">
                                                @error('place_of_birth')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="date_of_birth">Tanggal Lahir <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}" id="date_of_birth"
                                                name="date_of_birth">
                                                @error('date_of_birth')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="domicile">Kota Domisili
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('domicile') is-invalid @enderror" value="{{ old('domicile') }}" id="domicile" name="domicile">
                                            @error('domicile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="address">Alamat <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="address" name="address" rows="5"
                                                placeholder="Tuliskan alamat lengkap">
                                                @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="no_hp">Nomor Ponsel
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" id="no_hp" name="no_hp">
                                            @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="email">Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="last_education">Pendidikan Terakhir
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control @error('last_education') is-invalid @enderror" id="last_education" name="last_education">
                                                <option value="">- - Pilih - -</option>
                                                <option value="sma" {{ old('last_education')=='sma' ? 'selected' : ''}}>SMA</option>
                                                <option value="s1"{{ old('last_education')=='s1' ? 'selected' : ''}}>S1</option>
                                                <option value="s2"{{ old('last_education')=='s2' ? 'selected' : ''}}>S2</option>
                                            </select>
                                            @error('last_education')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nationality">Kebangsaan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality">
                                                <option value="">- - Pilih - -</option>
                                                <option value="wni"{{ old('nationality')=='wni' ? 'selected' : ''}}>WNI</option>
                                                <option value="wna"{{ old('nationality')=='wna' ? 'selected' : ''}}>WNA</option>
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
                                    <h4 class="card-title">Data Pekerjaan</h4><br>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="comp_name">Nama Perusahaan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('comp_name') is-invalid @enderror" value="{{ old('comp_name') }}" id="comp_name" name="comp_name">
                                            @error('comp_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="job_title">Pekerjaan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('job_title') is-invalid @enderror" value="{{ old('job_title') }}" id="job_title" name="job_title">
                                            @error('job_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="position">Jabatan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" id="position" name="position">
                                            @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="comp_address">Alamat Kantor<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input class="form-control @error('comp_address') is-invalid @enderror" value="{{ old('comp_address') }}" id="comp_address" name="comp_address" rows="5"
                                                placeholder="Tuliskan alamat kantor">
                                                @error('comp_address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="comp_telp">Telepon Kantor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('comp_telp') is-invalid @enderror" value="{{ old('comp_telp') }}" id="comp_telp" name="comp_telp"
                                                placeholder="212-999-0000">
                                                @error('comp_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="comp_email">Email Kantor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control @error('comp_email') is-invalid @enderror" value="{{ old('comp_email') }}" id="comp_email" name="comp_email"
                                                placeholder="xxxx@mail.com">
                                                @error('comp_email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="comp_fax">Fax Kantor
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('comp_fax') is-invalid @enderror" value="{{ old('comp_fax') }}" id="comp_fax" name="comp_fax">
                                            @error('comp_fax')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="postal_code">Kode Pos
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" id="postal_code" name="postal_code">
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
        <div class="col-lg-12">
            <div class="cards">
                <div class="card-header">
                    <h4 class="card-title">Data Sertifikasi</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="sert_schema">Skema Sertifikasi
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('sert_schema') is-invalid @enderror"  id="sert_schema" name="sert_schema">
                                            <option value="">- - Pilih - -</option>
                                            <option value="kkni"{{ old('sert_schema')=='kkni' ? 'selected' : ''}}>KKNI</option>
                                            <option value="klaster"{{ old('sert_schema')=='klaster' ? 'selected' : ''}}>Klaster</option>
                                            <option value="okupasi"{{ old('sert_schema')=='okupasi' ? 'selected' : ''}}>Okupasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="assessment_purpose">Tujuan Assessment
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control @error('assessment_purpose') is-invalid @enderror"  id="assessment_purpose" name="assessment_purpose">
                                            <option value="">- - Pilih - -</option>
                                            <option value="newSert"{{ old('assessment_purpose')=='newSert' ? 'selected' : ''}}>Sertifikasi Ulang</option>
                                            <option value="reSert"{{ old('assessment_purpose')=='reSert' ? 'selected' : ''}}>Sertifikasi Baru</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-10 my-text" for="">Skema Sertifikasi &emsp;&emsp;:&emsp;&emsp;
                                        {{ $assessis->schema_title }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-lg-10  my-text" for="">Nomor Skema&emsp;&emsp;:&emsp;&emsp;
                                        {{ $assessis->reference_number }}
                                    </label>
                                </div>
                            </div>
                            <div class="table-responsive my-text">
                                <table class="table table-bordered ">
                                    <thead class="thead-bg">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Unit</th>
                                            <th>Judul Unit</th>
                                            <th>Jenis Standar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assessis->units as $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->unit_code }}</td>
                                                <td>{{ $value->unit_title }}</td>
                                                <td></td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="cards">
                <div class="card-header">
                    <h4 class="card-title">Berkas Kelengkapan Pemohon </h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            <div class="col-xl-6">
                                <label class="my-text">1.&ensp; Ijazah Pendidikan Terakhir ( Minimal SMA)
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ijazah" name="ijazah">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <label class="my-text">2.&ensp; Pas Foto Berwarna
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo" name="photo">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <label class="my-text">3.&ensp; KTP/SIM/Paspor
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <label class="my-text">4.&ensp; Transkip Nilai
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="transcript" name="transcript">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <label class="my-text">5.&ensp; Surat Keterangan Pengalaman Kerja Minimal 1 Tahun
                                    (Jika Ada)
                                </label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="work_exper_certifs"
                                            name="work_exper_certifs">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</form>


    @endsection
