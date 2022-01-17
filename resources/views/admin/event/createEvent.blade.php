@extends('layout.main')

@section('container')
    <form method="post" action="/event">
        @csrf
        <div class="col-lg-8">
            <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                              <h2 class="card-title">Input Event</h2>
                            </div>
                                    <div class="card-content-center">
                                        <div class="card-body">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="event_code" class="form-label">Kode Event </label>
                                                    <input name="event_code" type="text"
                                                        class="form-control @error('event_code') is-invalid @enderror" id="event_code"
                                                        value="{{ old('event_code') }}">
                                                    @error('event_code')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="event_name" class="form-label">Nama Event </label>
                                                    <input name="event_name" type="text"
                                                        class="form-control @error('event_name') is-invalid @enderror" id="event_name"
                                                        value="{{ old('event_name') }}">
                                                    @error('event_name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="event_starts" class="form-label">Event Dimulai</label>
                                                    <input name="event_starts" type="date"
                                                        class="form-control @error('event_starts') is-invalid @enderror" id="event_starts"
                                                        value="{{ old('event_starts') }}">
                                                    @error('event_starts')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="event_ends" class="form-label">Event Berakhir</label>
                                                    <input type="date"
                                                        class="form-control @error('event_ends') is-invalid @enderror" id="event_ends"
                                                        name="event_ends" value="{{ old('event_ends') }}">
                                                    @error('event_ends')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <input type="text"
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        id="status" name="status" value="{{ old('status') }}">
                                                    @error('status')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="type" class="form-label">Tipe Event</label>
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        id="type" name="type" value="{{ old('type') }}">
                                                        <option value="">--pilih--</option>
                                                        <option value="Online"{{ old('type') == 'Online' ? 'selected' : '' }}>Online</option>
                                                        <option value="Offline"{{ old('type') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                                    </select>
                                                    @error('type')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div><br><br>
                                               <center><button type="submit" class="btn btn-primary">Submit</button></center>
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
