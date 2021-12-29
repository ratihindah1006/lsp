@extends('layout.assessi')

@section('container')
<form action="/beranda" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <h2 align="center">Data Diri</h2>
            <div class="cards">
                <div class="card-header">
                    <button type="submit" class="btn btn-whatsapp button-right">Simpan <span class="btn-icon-right"><i class="fa fa-check"></i></span>
                    </button>&nbsp;
                    <a href="/beranda" type="submit" class="btn btn-reddit ">Batal <span class="btn-icon-right"><i class="fa fa-close"></i></span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-6">
                                <h4 class="card-title">Data Pribadi</h4><br>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label font-weight-bold text-success" for="name">Nama
                                        Lengkap
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $apl01->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label font-weight-bold text-success" for="nik">NIK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $apl01->nik) }}" id="nik" name="nik">
                                        @error('nik')
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
</form>



@endsection