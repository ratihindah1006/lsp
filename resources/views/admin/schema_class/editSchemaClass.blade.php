@extends('layout.main')

@section('container')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Kelas Skema</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/KelasSkema">Kelas Skema</a></li>
                <li class="breadcrumb-item"><a href="">Edit Kelas Skema</a></li>
            </ol>
        </div>
    </div>
    <form method="post" action="/KelasSkema/{{ $class->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-1">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-content-center">
                                <div class="card-body" style="width: 50rem;">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $class->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="event_id" class="form-label">Nama Event</label>
                                            <select style="width: 100%; height:40px;" name="event_id" id="event_id"  class="form-control maximum-search-length @error('event_id') is-invalid @enderror">
                                                <option value="">Pilih Bidang</option>
                                                @foreach ($event as $events)
                                                <option value="{{ $events->id }}" {{ old('event_id', $class->event_id) == $events->id ? 'selected' : null }} data-time="{{ $events->event_time }}">{{ $events->event_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('event_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="schema_id" class="form-label">Judul Skema</label>
                                            <select style="width: 100%; height:40px;" name="schema_id" id="schema_id"  class="form-control maximum-search-length @error('schema_id') is-invalid @enderror">
                                                <option value="">Pilih Bidang</option>
                                                @foreach ($schema as $schemas)
                                                <option value="{{ $schemas->id }}" {{ old('schema_id', $class->schema_id) == $schemas->id ? 'selected' : null }}>{{ $schemas->schema_title }}</option>
                                                @endforeach
                                            </select>
                                            @error('schema_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="code_id" class="form-label">Kode Soal Esai</label>
                                            <select name="code_id" id="code_id"
                                                class="form-control maximum-search-length @error('code_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kode Soal</option>
                                                <option value="{{ $class->code_id }}" selected>{{ $class->code->code_name }}</option>
                                                @foreach ($codes->where("schema_id", $class->schema_id)->where("id", "!=" ,$class->code_id ) as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->code_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('code_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="code_lisan_id" class="form-label">Kode Soal Lisan</label>
                                            <select name="code_lisan_id" id="code_lisan_id"
                                                class="form-control maximum-search-length @error('code_lisan_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kode Soal</option>
                                                <option value="{{ $class->code_lisan_id }}" selected>{{ $class->code_lisan->code_lisan_name }}</option>
                                                @foreach ($codes_lisan->where("schema_id", $class->schema_id)->where("id", "!=" ,$class->code_lisan_id ) as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->code_lisan_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('code_lisan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="code_praktik_id" class="form-label">Kode Soal Praktik</label>
                                            <select name="code_praktik_id" id="code_praktik_id"
                                                class="form-control maximum-search-length @error('code_praktik_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kode Soal</option>
                                                <option value="{{ $class->code_praktik_id }}" selected>{{ $class->code_praktik->code_praktik_name }}</option>
                                                @foreach ($codes_praktik->where("schema_id", $class->schema_id)->where("id", "!=" ,$class->code_praktik_id ) as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->code_praktik_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('code_praktik_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="date" class="form-label">Tanggal Pelaksanaan &emsp;<input
                                                id="date" disabled style="border: none"></label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                id="date" name="date" value="{{ old('date', $class->date) }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tuk" class="form-label">TUK</label>
                                            <input type="text" class="form-control @error('tuk') is-invalid @enderror"
                                                id="tuk" name="tuk" value="{{ old('tuk', $class->tuk) }}">
                                            @error('tuk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                                id="description" name="description" value="{{ old('description', $class->description) }}">
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                        '<option value="' +schema.id + '">' + schema
                                        .schema_title + '</option>');
                                });
                            } else {
                                $('#schema_id').empty();
                                $('#assessor_id').empty();
                            }
                        }
                    });
                } else {
                    $('#schema_name').empty();
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
                                        '<option value="' + assessor.id + '">' + assessor
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
