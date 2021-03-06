@extends('layout.main')

@section('container')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Tambah Event</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/event">Event</a></li>
                    <li class="breadcrumb-item"><a href="">Tambah Event</a></li>
                </ol>
            </div>
        </div>
        <form method="post" action="/event">
            @csrf
            <div class="card">
                <div class="col-md-14">
                        <div class="card-content-center">
                            <div class="card-body" style="width: auto; ">
                                <div class="col-xl-12 col-xxl-12">
                                            <div class="form-group">
                                                <label for="event_name" class="form-label">Nama Event </label>
                                                <input name="event_name" type="text"
                                                    class="form-control @error('event_name') is-invalid @enderror"
                                                    id="event_name" value="{{ old('event_name') }}">
                                                @error('event_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="event_time" class="form-label">Waktu Event</label>
                                                <input
                                                    class="form-control input-daterange-datepicker @error('event_time') is-invalid @enderror"
                                                    type="text" name="event_time" id="event_time"
                                                    value="{{ old('event_time') }}">
                                                @error('event_time')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                    id="status" name="status" value="{{ old('status') }}">
                                                    <option value="">--pilih--</option>
                                                    <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>
                                                        Open</option>
                                                    <option value="Close"
                                                        {{ old('status') == 'Close' ? 'selected' : '' }}>Close</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="type" class="form-label">Tipe Event</label>
                                                <select class="form-control @error('type') is-invalid @enderror" id="type"
                                                    name="type" value="{{ old('type') }}">
                                                    <option value="">--pilih--</option>
                                                    <option value="Online"
                                                        {{ old('type') == 'Online' ? 'selected' : '' }}>Online</option>
                                                    <option value="Offline"
                                                        {{ old('type') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                                </select>
                                                @error('type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="card-footer mb-3">
                                                <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span
                                                        class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                                <a href="/event" class="btn btn-outline-primary float-right mr-2">Batal</a>
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
