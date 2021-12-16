@extends('layout.main')

@section('container')
<div class="col-lg-8">
    <form method="post" action="/dashboard">
        @csrf
      <div class="mb-3">
        <label for="mulai" class="form-label">Event Dimulai</label>
        <input name="mulai" type="date" class="form-control @error('mulai') is-invalid @enderror" id="mulai" value="{{ old('mulai') }}">
        @error('mulai')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="akhir" class="form-label">Event Berakhir</label>
        <input type="date" class="form-control @error('akhir') is-invalid @enderror" id="akhir" name="akhir" value="{{ old('akhir') }}">
        @error('akhir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama Event</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="tempat" class="form-label">Tempat</label>
        <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" value="{{ old('tempat') }}">
        @error('tempat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="tipe" class="form-label">Tipe Event</label>
        <select class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe') }}">
            <option value="Online">Online</option>
            <option value="Offline">Offline</option>
        </select>
        @error('tipe')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div><br><br>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>
@endsection