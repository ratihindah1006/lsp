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
                <option value="">--Pilih Unit--</option>
                @if ($units)
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_title }}</option>
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
                <option value="">--Pilih Element--</option>
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
                        <input wire:model="no_soal" type="checkbox" name="kuk.{{ $criteria->id }}" class="kuk.{{ $criteria->id }}" id="kuk.{{ $criteria->id }}" value="KUK {{ $loop->iteration.'.'.$criteria->id }}">
                        <label class="kuk.{{ $criteria->id }}" for="kuk.{{ $criteria->id }}">{{ $loop->iteration.'. '.$criteria->criteria_title  }}</label>
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
            <input wire:model="no_soal" type="text" name="no_soal" id="no_soal" 
            value="
            @if (is_array($no_soal) || is_object($no_soal)) 
                @foreach ($no_soal as $no) 
                    {{ $no }} 
                @endforeach 
            @endif" readonly required>
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