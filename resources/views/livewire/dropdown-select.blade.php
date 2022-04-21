<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="form-group">
            <label for="skema" class="form-label">Skema</label>
            <select class="form-control" wire:model="selectedSchema" 
                name="skema" id="skema" required>
                <option value="" selected>--Pilih Skema--</option>
                @if ($schemas)
                    @foreach ($schemas as $schema)
                        <option value="{{ $schema->id }}">{{ $schema->schema_title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-xl-12 col-xxl-12">
        <div class="form-group">
            <label for="kode_soal" class="form-label">Kode Soal</label>
            <select class="form-control" wire:model="selectedCode" 
                name="kode_soal" id="kode_soal" required>
                <option value="" selected>--Pilih Kode Soal--</option>
                @if ($codes)
                    @foreach ($codes as $code)
                        <option value="{{ $code->id }}">{{ $code->code_name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-xl-12 col-xxl-12">
        <div class="form-group">
            <label for="unit" class="form-label">Unit</label>
            <select wire:model="selectedUnit" class="form-control"
                name="unit" id="unit" required>
                <option value="" selected>--Pilih Unit--</option>
                @if ($units)
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit->unit_title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-xl-12 col-xxl-12">
        <div class="form-group">
            <label for="element" class="form-label">Element</label>
            <select wire:model="selectedElement" class="form-control"
                name="element" id="element" required>
                <option value="" selected>--Pilih Element--</option>
                @if ($elements)
                    @foreach($elements as $element)
                        <option value="{{ $element->id }}">{{ $element->element_title }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-xl-12 col-xxl-12 mt-3">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">KUK</h4>
          </div>
          <div class="card-body">
                  @if ($criterias)
                  @foreach ($criterias as $criteria)
                    <div class="form-group m-0">
                        <div class="form-check">
                            <input wire:model="no_soal" type="checkbox" name="kuk.{{ $criteria->id }}" class="kuk.{{ $criteria->id }}" id="kuk.{{ $criteria->id }}" value=" KUK {{ $criteria->element->no_element.'.'.$criteria->no_criteria }}"
                            @if (DB::table('question')->where('code_id', $code_id)->where('unit_id', $aunit->id)->where('no_soal','LIKE', '%'.$criteria->element->no_element.'.'.$criteria->no_criteria.'%')->count() > 0)
                                disabled
                            @endif
                            >
                        <label class="kuk.{{ $criteria->id }}" for="kuk.{{ $criteria->id }}">{{ $criteria->element->no_element.'.'.$criteria->no_criteria.' '.$criteria->criteria_title  }}</label>
                        </div>
                    </div>
                    @endforeach
                  @endif
          </div>
      </div>
    </div>

    <div class="col-xl-12 col-xxl-12 mt-3">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">No Soal</h4>
          </div>
          <div class="card-body">
            <input wire:model="no_soal" type="text" name="no_soal" id="no_soal" class = "form-control" value="" readonly required>
          </div>
      </div>
    </div>

    <div wire:ignore class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pertanyaan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea class="summernote form-control @error('question') is-invalid @enderror" name="question" required></textarea>
                    @error('question')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore class="col-xl-12 col-xxl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kunci Jawaban</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea class="summernote form-control @error('key_answer') is-invalid @enderror" name="key_answer" required></textarea>
                    @error('key_answer')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mx-auto mb-3">Submit</button>

</div>