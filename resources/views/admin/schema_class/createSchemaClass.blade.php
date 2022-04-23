@extends('layout.main')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Tambah Kelas Skema</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/KelasSkema">Kelas Skema</a></li>
                    <li class="breadcrumb-item"><a href="">Tambah Kelas Skema</a></li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8">
            <form method="post" action="/KelasSkema">
                @csrf
                <div class="card-center-assessi">
                    <div class="row mt-1">
                        <div class="col-md-14">
                            <div class="card">
                                <div class="card-content-center">
                                    <div class="card-body" style="width: 50rem; ">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Nama</label>
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Judul Event</label>
                                                <select style="width: 100%; height:40px; " name="event_id" id="event_id"
                                                    class=" maximum-search-length form-control @error('event_id') is-invalid @enderror">
                                                    <option value="">Pilih Event</option>
                                                    @foreach ($event as $events)
                                                        <option value="{{ $events->id }}"
                                                            {{ old('event_id') == $events->id ? 'selected' : null }}
                                                            data-time="{{ $events->event_time }}">
                                                            {{ $events->event_name }} </option>
                                                    @endforeach
                                                </select>
                                                @error('event_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="schema_id" class="form-label">Judul Skema</label>
                                                <select name="schema_id" id="schema_id"
                                                    class="form-control maximum-search-length  @error('schema_id') is-invalid @enderror">
                                                    <option value="">Pilih Skema</option>
                                                    @foreach ($schema as $schemas)
                                                        <option value="{{ $schemas->id }}">{{ $schemas->schema_title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('schema_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="code_id" class="form-label">Kode Soal</label>
                                                <select name="code_id" id="code_id"
                                                    class="form-control maximum-search-length @error('code_id') is-invalid @enderror" required>
                                                    <option value="">Pilih Kode Soal</option>
                                                </select>
                                                @error('code_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="date" class="form-label">Tanggal Pelaksanaan &emsp;<input
                                                        id="date" disabled style="border: none"></label>
                                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                    id="date" name="date" value="{{ old('date') }}">
                                                @error('date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tuk" class="form-label">TUK</label>
                                                <input type="text" class="form-control @error('tuk') is-invalid @enderror"
                                                    id="tuk" name="tuk" value="{{ old('tuk') }}">
                                                @error('tuk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea name="description" type="text"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    id="description" value="{{ old('description') }}">{{old('description')}}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="card-footer mb-3">
                                            <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                                                    class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                            <a href="/KelasSkema" class="btn btn-outline-primary float-right mr-2">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('#event_id').on('change', function() {
                    const selected = $(this).find('option:selected');
                    const eventTime = selected.data('time');

                    $("#date").val(eventTime);
                });
            });
        </script>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#field_id').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/schemaAssessi/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#schema_id').empty();
                                $('#assessor_id').empty();
                                $('#schema_id').append(
                                    '<option hidden>Pilih Skema</option>');
                                $.each(data, function(key, schema) {
                                    $('select[name="schema_id"]').append(
                                        '<option value="' + schema.id + '">' +
                                        schema
                                        .schema_title + '</option>');
                                });
                            } else {
                                $('#schema_id').empty();
                                $('#assessor_id').empty();
                            }
                        }
                    });
                } else {
                    $('#schema_id').empty();
                    $('#assessor_id').empty();
                }
            });
        });

        $(document).ready(function() {
            $('#schema_id').on('change', function() {
                var schemaID = $(this).val();
                if (schemaID) {
                    $.ajax({
                        url: '/assessorAssessi/' + schemaID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#assessor_id').empty();
                                $('#assessor_id').append(
                                    '<option hidden>Pilih Asesor</option>');
                                $.each(data, function(key, assessor) {
                                    $('select[name="assessor_id"]').append(
                                        '<option value="' + assessor.id + '">' +
                                        assessor
                                        .name + '</option>');
                                });
                            } else {
                                $('#assessor_id').empty();
                            }
                        }
                    });
                } else {
                    $('#assessor_id').empty();
                }
            });
        });
    </script> --}}
    @endsection
