@extends('layout.main')

@section('container')
    <form method="post" action="/KelasSkema/{{ $class->id }}/dataAsesi/{{ $assessis->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Data Asesi</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">

                                <div class="col-12">
                                        <div class="form-group">
                                        <label>Nama Asesor</label>
                                          <select style="width: 100%; height:40px;" name="data_assessi_id" id="data_assessi_id" class="form-control maximum-search-length @error('data_assessi_id') is-invalid @enderror">
                                            <option value=""></option>
                                            @foreach ($data_assessi as $assessi)
                                            <option value="{{ $assessi->id }}" {{ old('data_assessi_id', $assessis->data_assessi_id) == $assessi->id ? 'selected' : null }}>{{ $assessi->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('data_assessor_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="assessor_id" class="form-label">Nama Asesor</label>
                                            <select style="width: 100%; height:40px;" name="assessor_id" id="assessor_id" class="form-control maximum-search-length @error('assessor_id') is-invalid @enderror">
                                                <option value=""></option>
                                                @foreach ($assessor as $assessor)
                                                <option value="{{ $assessor->id }}" {{ old('assessor_id', $assessis->assessor_id) == $assessor->id ? 'selected' : null }}>{{ $assessor->data_assessor->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('assessor_id')
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
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
    </script>
@endsection
