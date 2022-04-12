@extends('layout.main')

@section('container')

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah / Edit Data Unit</h4>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-dark">
                <div class="card-body">
                    <div class="my-text">
                        <form method="post" action="/skema/{{ $schema }}/unit">
                            @csrf
                            <div class="card-header" style="width: 60rem; ">
                                <h4 class="card-title">Tambah / Edit Unit</h4>
                            </div>
                            <div class="col-xl-12 col-xxl-12 mt-3">

                                @if ($units)
                                @foreach ($units as $unit)
                                <div class="form-group m-0">
                                    <div class="form-check">
                                        <input type="checkbox" name="unit[]" class="unit[]" id="unit[]" @if ($unit !=null) value="{{ $unit->id }}" @else value="{{ old('$unit->id') }}" @endif @foreach($un as $id) @if($id==$unit->id) checked @endif @endforeach
                                        >
                                        <label for="unit[]">{{ $unit->unit_code }} - {{ $unit->unit_title   }}</label>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>

                            <div class="card-footer mb-3">
                                <button type="submit" class="btn btn-primary float-right mr-3">Simpan <span class="btn-icon-right"><i class="fa fa-save"></i></span></button>
                                <a href="/skema/{{ $schema }}/unit" class="btn btn-outline-primary float-right mr-2">Batal</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection