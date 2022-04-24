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
                            <div class="form-group">
                                <label>Judul Kategori</label>
                                <select class="multi-select" style="width: 100%; height:40px;" name="category_id[]" id="category_id" multiple="multiple" onchange="getUnit(this)">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @for($i=0; $i<count($units); $i++) @if($units[$i]->category_id == $category->id) selected @break @endif @endfor>{{ $category->category_title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="input-checkbox-unit">
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

@section("myscript")
<script>
    function getUnit(select) {
        let result = [];
        let options = select && select.options;
        let opt;

        for (let i=0; i<options.length; i++) {
            opt = options[i];

            if (opt.selected) {
                result.push(opt.value || opt.text);
            }
        }
        $.ajax({ 
            type: 'GET', 
            url: '{{ route("api.units") }}', 
            data: {
                category_id : result,
                schema_id : '{{ $schema }}',
            }, 
            dataType: 'json',
            success: function (data) { 
                let input = ""
                for(const unit of data.data.units){
                    let isChecked = false;
                    for(const schema_unit of data.data.schema_units){
                        if(schema_unit === unit.id){
                            isChecked = true;
                            break;
                        }
                    }
                    input += `<div class="form-group m-0">
                                    <div class="form-check">
                                        <div class="input-checkbox-unit">
                                            <input type="checkbox" name="unit[]" value="${unit.id}-${unit.category_id}" ${isChecked ? 'checked' : ''} class="unit" id="unit${unit.id}">
                                            <label for="unit${unit.id}">${unit.unit_code} - ${unit.unit_title}</label>
                                        </div>
                                    </div>
                                </div>`
                }
                
                $(".input-checkbox-unit").html(input)
            }
        });

    }
    $( document ).ready(function() {
        const select = document.getElementById("category_id");
        if(select.value.length !== 0){
            getUnit(select);
        }
    });
</script>
@endsection