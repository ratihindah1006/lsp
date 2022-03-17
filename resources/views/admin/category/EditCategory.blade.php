@extends('layout.main')

@section('container')
<form method="post" action="/category/{{ $category->id }}">
    @method('put')
    @csrf
    <div class="col-lg-8">
        <div class="card-center">
            <div class="row mt-5">
                <div class="col-md-14">
                    <div class="card">
                        <div class="card-header" style="width: 50rem; ">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                        <div class="card-content-center">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="category_title" class="form-label">Judul Kategori</label>
                                    <input type="text" class="form-control @error('category_title') is-invalid @enderror" id="category_title" name="category_title" value="{{ old('category_title', $category->category_title) }}">
                                    @error('category_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="field_title" class="form-label">Judul Bidang</label>
                                    <input type="text" class="form-control @error('field_title') is-invalid @enderror" id="field_title" name="field_title" value="{{ old('field_title', $category->field_title) }}">
                                    @error('field_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <center><button type="submit" class="btn btn-warning mt-4" style="width: 170px">Submit</button></center>
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