<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SchemaModel;
use App\Models\ElementModel;
use App\Models\CriteriaModel;
use App\Models\PertanyaanLisan;
use App\Models\UnitSchemaModel;
use App\Models\CodeQuestionLisan;

class DropDownSelectLisan extends Component
{
    public $schemas;
    public $units;
    public $elements;
    public $criterias;
    public $no_soal = [];
    public $codes;
    public $aunit;
    public $questions;
    public $code_id;

    public $selectedSchema = null;
    public $selectedUnit = null;
    public $selectedElement = null;
    public $selectedCode = null;

    public function mount($selectedElement = null)
    {
        $this->schemas = SchemaModel::all();
        $this->questions = PertanyaanLisan::all();
        $this->units = collect();
        $this->elements = collect();
        $this->criterias = collect();
        $this->codes = collect();
        $this->unitss = collect();
        $this->selectedElement = $selectedElement;
        $this->code = collect();
    }

    public function render()
    {
        return view('livewire.drop-down-select-lisan');
    }

    public function updatedSelectedCode($code)
    {
        $this->code_id = $code;
        $this->no_soal = [];
        $this->selectedUnit = NULL;
        $this->selectedElement = NULL;
        $this->elements = NULL;
        $this->criterias = NULL;
    }

    public function updatedSelectedSchema($skema)
    {
        $this->units = UnitSchemaModel::where('schema_id', $skema)->get();
        $this->codes = CodeQuestionLisan::where('schema_id', $skema)->get();
        $this->selectedUnit = NULL;
        $this->selectedElement = NULL;
        $this->elements = NULL;
        $this->selectedCode = NULL;
        $this->criterias = NULL;
        $this->no_soal = [];
    }

    public function updatedSelectedUnit($unit)
    {
        if (!is_null($unit)) {
            $this->aunit = UnitSchemaModel::where('id', $unit)->first();
            if (!is_null($this->aunit)) {
                $this->elements = ElementModel::where('unit_id', $this->aunit['unit_id'])->get();
            }
        }
        $this->selectedElement = "";
        $this->criterias = NULL;
        $this->no_soal = [];
    }

    public function updatedSelectedElement($element)
    {
        if (!is_null($element)) {
            $this->criterias = CriteriaModel::where('element_id', $element)->get();
        }
        $this->no_soal = [];
    }
}
