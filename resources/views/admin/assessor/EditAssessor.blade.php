@extends('layout.main')

@section('container')
    <form method="post" action="/dataAssessor/{{ $assessor->id }}">
        @method('put')
        @csrf
        <div class="col-lg-8">
            <div class="card-center">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h4 class="card-title">Edit Data Asesor</h4>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name', $assessor->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email', $assessor->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="text"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                value="{{ old('password', $assessor->password) }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                            <div class="form-group">
                                            <label for="field_id" class="form-label">Judul Bidang</label>
                                            <select style="width: 100%; height:40px;" name="field_id" id="field_id" class="form control select2">
                                                <option value="">Pilih Bidang</option>
                                                @foreach ($field as $categories)
                                                <option value="{{ $categories->id }}" {{ old('field_id', $assessor->field_id) == $categories->id ? 'selected' : null }}>{{ $categories->field_title }}</option>
                                                @endforeach
                                            </select>
                                            @error('field_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            
                                        <div class="form-group">
                                            <label>Judul Skema</label>
                                            <select class="form-control select2" placeholder="Select Schema"
                                                id="schema_id" name="schema_id">
                                                <option value="">Pilih Bidang</option>
                                                <option value="{{ $schemaSelected->id }}" selected>{{ $schemaSelected->schema_title }}</option>
                                            </select>
                                        </div>
                                    
                                        <div class="col">
                                            <center><button type="submit" class="btn btn-success mt-4"
                                                    style="width: 170px">Submit</button>
                                            </center>
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
        </div>
    </form>
    </div>

@endsection

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
                        url: '/schemaAssessor/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#schema_id').empty();
                                $('#schema_id').append(
                                    '<option hidden>Pilih Skema</option>');
                                $.each(data, function(key, sA) {
                                    $('select[name="schema_id"]').append(
                                        '<option value="' +sA.id + '">' + sA
                                        .schema_title + '</option>');
                                });
                            } else {
                                $('#schema_id').empty();
                            }
                        }
                    });
                } else {
                    $('#schema_name').empty();
                }
            });
        });
    </script>
