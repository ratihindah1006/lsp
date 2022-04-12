@extends('layout.assessor')

@section('container')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-dark">
                <div class="card-body">
                    <div class="my-text">

                        <h4 class="card-title">&ensp; Daftar Unit Kompetensi Yang Harus Dikuasai</h4><br>

                        <div class="col-xl-12 col-xxl-12 mt-3">

                            @foreach ($unit as $unit)
                            <div class="form-group m-0">
                                <label>{{ $unit->unit->unit_code }} - {{ $unit->unit->unit_title }} </label>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection