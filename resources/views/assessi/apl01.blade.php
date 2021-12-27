@extends('layout.assessi')

@section('container')
{{-- <section id="multiple-column-form">
    <h2 align="center">Data Diri</h2>
    <div class="row match-height">
        <div  class="col-10">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">Data Pribadi</h5>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="Nama Lengkap" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" class="form-control"
                                            placeholder="NIK" name="nik">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="pob">Tempat Lahir</label>
                                        <input type="text" id="pob" class="form-control" placeholder="Tempat Lahir"
                                            name="pob">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="dob">Tanggal Lahir</label>
                                        <input type="date" id="dob" class="form-control"
                                            name="dob" placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group col-md-4">
                                        <label for="gender">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male">
                                            <label class="form-check-label" for="male">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                checked>
                                            <label class="form-check-label" for="female">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <div >
                                            <label for="domicile">Kota Domisili</label>
                                            <div class="form-group">
                                                <select class="choices form-select">
                                                    <option value="lampung">Lampung</option>
                                                    <option value="jakarta">Jakarta</option>
                                                    <option value="bandung">Bandung</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <div >
                                            <label for="nasionality">Kebangsaan</label>
                                            <div class="form-group">
                                                <select class="choices form-select">
                                                    <option value="wni">WNI</option>
                                                    <option value="wna">WNA</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <div >
                                            <label for="lastEdu">Pendidikan Terakhir</label>
                                            <div class="form-group">
                                                <select class="choices form-select">
                                                    <option value="sma">SMA</option>
                                                    <option value="s1">S1</option>
                                                    <option value="s2">S2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group ">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="Email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No. Hp</label>
                                        <input type="text" id="nohp" class="form-control" placeholder="Nomor Handphone"
                                            name="nohp">
                                    </div>
                                </div>
                                </div>
                                &ensp; &ensp;
                                <div class=" col-12">
                                    <div class="row">
                                        <div class="card-header">
                                            <h5 class="card-title">Data Pekerjaan</h5>
                                        </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="compName">Nama Perusahan</label>
                                        <input type="text" id="compName" class="form-control"
                                            placeholder="Nama Perusahan" name="compName">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="position">Jabatan</label>
                                        <input type="text" id="position" class="form-control"
                                            placeholder="Jabatan" name="position">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="job">Pekerjaan</label>
                                        <input type="text" id="job" class="form-control"
                                            placeholder="Pekerjaan" name="job">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group ">
                                        <label for="compAddress" class="form-label">Alamat Kantor</label>
                                        <textarea class="form-control" id="compAddress" name="compAddress" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group ">
                                        <label for="compTelp">Telp Kantor</label>
                                        <input type="text" id="compTelp" class="form-control" placeholder="Telepon Kantor"
                                            name="compTelp">
                                    </div>
                                    <div class="form-group ">
                                        <label for="posCode">Kode Pos</label>
                                        <input type="text" id="posCode" class="form-control" placeholder="Kode Pos"
                                            name="posCode">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="compFax">Fax Kantor</label>
                                        <input type="text" id="compFax" class="form-control" placeholder="Fax Kantor"
                                            name="compFax">
                                    </div>
                                    <div class="form-group ">
                                        <label for="compEmail">Email Kantor</label>
                                        <input type="text" id="compEmail" class="form-control" placeholder="Email Kantor"
                                            name="compEmail">
                                    </div>
                                </div>
                               
                                <div class="col-md-6 col-12">
                                    <br/><br/>
                                    <div class="form-group ">
                                        <label for="sertSchema">Skema Sertifikasi :</label><br/>
                                        <div >
                                        <div class="form-check">
                                            <input type="radio" name="kkni" value="kkni"/>&ensp;KKNI
                                            &ensp;&ensp;
                                            <input type="radio" name="klaster" value="klaster"/>&ensp;Klaster
                                            &ensp;&ensp;
                                            <input type="radio" name="okupasi" value="okupasi"/>&ensp;Okupasi
                                            <br />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <br/><br/>
                                    <div class="form-group ">
                                        <label for="gender">Tujuan Asesment :</label><br/>
                                        <div class="form-check">
                                            <input type="radio" name="reSert" value="reSert"/>&ensp;Sertifikasi Ulang
                                            &ensp;&ensp;
                                            <input type="radio" name="newSert" value="newSert"/>&ensp;Sertifikasi Baru
                                        </div>
                                    </div>
                                </div>
                                &ensp;
                                <div >
                                    <table  class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Unit</th>
                                                <th>Judul Unit</th>
                                                <th>Jenis Standar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                &ensp;
                                <h6>a. Bukti Kelengkapan Pemohon (Wajib)</h6>
                                <div  class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="ijazah" class="form-label">Ijazah Terakhir (Minimal SMA/Sederajat)</label>
                                        <input class="form-control" type="file" name="ijazah" id="ijazah">
                                    </div>
                                </div>
                                <div  class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="photo">Pas Foto Berwarna</label>
                                        <input class="form-control" type="file" name="photo" id="photo">
                                    </div>
                                </div>
                                <div  class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="ktp" class="form-label">KTP/SIM/Paspor</label>
                                        <input class="form-control" type="file" name="ktp" id="ktp">
                                    </div>
                                </div>
                                <div  class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="transcript" class="form-label">Transkip Nilai</label>
                                        <input class="form-control" type="file" name="transcript" id="transcript">
                                    </div>
                                </div>
                                &ensp;
                                <h6>a. Bukti Leterangan Pengalaman Kerja Minimal 1 Tahun</h6>
                                <div  class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="transcript" class="form-label">Bukti Pengalaman Kerja</label>
                                        <input class="form-control" type="file" name="transcript" id="transcript">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<div class="row">
    <div class="col-lg-12">
        <h2 align="center">Data Diri</h2>
        <div class="card">
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="row">
                            <div class="col-xl-6">
                                <h4 class="card-title">Data Pribadi</h4><br>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="name">Nama Lengkap
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="name" name="name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nik">NIK <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nik" name="nik" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="gender">Jenis Kelamin
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">- - Pilih - -</option>
                                            <option value="male">Laki-Laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="place_of_birth">Tempat Lahir <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="date_of_birth">Tanggal Lahir <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="domicile">Kota Domisili
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="domicile" name="domicile" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="address">Alamat <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="address" name="address" rows="5" placeholder="Tuliskan alamat lengkap"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="no.hp">Nomor Ponsel
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text"  class="form-control" id="no.hp" name="no.hp" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="email" name="email" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="last_education">Pendidikan Terakhir
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="last_education" name="last_education">
                                            <option value="">- - Pilih - -</option>
                                            <option value="sma">SMA</option>
                                            <option value="s1">S1</option>
                                            <option value="s2">S2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nationality">Kebangsaan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="nationality" name="nationality">
                                            <option value="">- - Pilih - -</option>
                                            <option value="wni">WNI</option>
                                            <option value="wna">WNA</option>
                                        </select>
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
                                        <input type="text" class="form-control" id="comp_name" name="comp_name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="job_title">Pekerjaan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="job_title" name="job_title" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="position">Jabatan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="position" name="position" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="comp_address">Alamat Kantor<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" id="comp_address" name="comp_address" rows="5" placeholder="Tuliskan alamat kantor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="comp_telp">Telepon Kantor
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="comp_telp" name="comp_telp" placeholder="212-999-0000">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="comp_email">Email Kantor 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="email" class="form-control" id="comp_email" name="comp_email" placeholder="xxxx@mail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="comp_fax">Fax Kantor
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="comp_fax" name="comp_fax" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="postal_code">Kode Pos
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="postal_code" name="postal_code" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Sertifikasi</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form class="form-valide-with-icon" action="#" method="post">
                        <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="sert_schema">Skema Sertifikasi
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="sert_schema" name="sert_schema">
                                        <option value="">- - Pilih - -</option>
                                        <option value="kkni">KKNI</option>
                                        <option value="klaster">Klaster</option>
                                        <option value="okupasi">Okupasi</option>
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
                                    <select class="form-control" id="assessment_purpose" name="assessment_purpose">
                                        <option value="">- - Pilih - -</option>
                                        <option value="newSert">Sertifikasi Ulang</option>
                                        <option value="reSert">Sertifikasi Baru</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection