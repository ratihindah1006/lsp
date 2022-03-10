@extends('layout.main')

@section('container')
    <form method="post" action="/KelasSkema/{{ $class->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Data Kelas Skema</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

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
                                                <option value="{{ $events->id }}" {{ old('event_id', $class->event_id) == $events->id ? 'selected' : null }}>{{ $events->event_name }}</option>
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
                                        
                                        <div class="col">
                                            <center><button type="submit" class="btn btn-success mt-4"
                                                    style="width: 170px">Submit</button></center>
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
