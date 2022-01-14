@extends('layout.main')

@section('container')
    <div class="col-lg-8">
        <form method="post" action="/event/{{ $event->id }}">
            @method('put')
            @csrf <div class="card-center-assessi">
                <div class="row mt-5">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="card-header" style="width: 50rem; ">
                                <h2 class="card-title">Edit Event</h2>
                            </div>
                            <div class="card-content-center">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="event_code" class="form-label">Kode Event</label>
                                            <input type="text" class="form-control @error('event_code') is-invalid @enderror"
                                                id="event_code" name="event_code" value="{{ old('event_code', $event->code) }}">
                                            @error('event_code')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="event_start" class="form-label">Event Dimulai</label>
                                            <input name="event_start" type="date"
                                                class="form-control @error('event_start') is-invalid @enderror" id="event_start"
                                                value="{{ old('event_start', $event->event_start) }}">
                                            @error('event_start')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="event_ends" class="form-label">Event Berakhir</label>
                                            <input type="date" class="form-control @error('event_ends') is-invalid @enderror"
                                                id="event_ends" name="event_ends" value="{{ old('event_ends', $event->event_ends) }}">
                                            @error('event_ends')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="event_name" class="form-label">Nama Event</label>
                                            <input type="text" class="form-control @error('event_name') is-invalid @enderror"
                                                id="event_name" name="event_name" value="{{ old('event_nama', $event->event_nama) }}">
                                            @error('event_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Tipe Event</label>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type"
                                                name="type" value="{{ old('type', $event->type) }}">
                                                <option value="Online">Online</option>
                                                <option value="Offline">Offline</option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <input type="text" class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status" value="{{ old('status', $event->status) }}">
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div><br><br>

                                        <center><button type="submit" class="btn btn-primary">Submit</button></center>
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
