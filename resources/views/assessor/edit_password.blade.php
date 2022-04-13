@extends('layout.assessor')

@section('container')
    <form action="/ubah_password" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="card text-dark mt-5 pt-4">
                            <center><h4>Ubah Password</h4></center>
                        &emsp;&emsp;
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Password Sekarang</label>
                            <div class="input-group col-lg-8" id="show_hide_password">
                                <input type="password" class="form-control  @error('current_password') is-invalid @enderror"
                                    name="current_password" id="current_password">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Password Baru</label>
                            <div class="input-group col-lg-8" id="show_hide_new_password">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                    name="password" id="password">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="ml-4 col-lg-3  font-weight-bold tmy-text">Konfirmasi Password Baru</label>
                            <div class="input-group col-lg-8" id="show_hide_confirmation_password">
                                <input type="password"
                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-outline-secondary"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span class="btn-icon-right"><i
                                        class="fa fa-save"></i></span></button>
                            <a href="/beranda" class="btn btn-outline-primary float-right mr-2">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_password i').addClass( "bi bi-eye" );
        }
    });
    });
</script>
<script>
    $(document).ready(function() {
    $("#show_hide_new_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_new_password input').attr("type") == "text"){
            $('#show_hide_new_password input').attr('type', 'password');
            $('#show_hide_new_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_new_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_new_password input').attr("type") == "password"){
            $('#show_hide_new_password input').attr('type', 'text');
            $('#show_hide_new_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_new_password i').addClass( "bi bi-eye" );
        }
    });
    });
</script>
<script>
    $(document).ready(function() {
    $("#show_hide_confirmation_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_confirmation_password input').attr("type") == "text"){
            $('#show_hide_confirmation_password input').attr('type', 'password');
            $('#show_hide_confirmation_password i').addClass( "bi bi-eye-slash" );
            $('#show_hide_confirmation_password i').removeClass( "bi bi-eye" );
        }else if($('#show_hide_confirmation_password input').attr("type") == "password"){
            $('#show_hide_confirmation_password input').attr('type', 'text');
            $('#show_hide_confirmation_password i').removeClass( "bi bi-eye-slash" );
            $('#show_hide_confirmation_password i').addClass( "bi bi-eye" );
        }
    });
    });
</script>
@endsection
