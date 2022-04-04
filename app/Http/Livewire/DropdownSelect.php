<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitModel;
use App\Models\SchemaModel;
use App\Models\CodeQuestion;
use App\Models\ElementModel;
use Illuminate\Http\Request;
use App\Models\CriteriaModel;
use App\Models\UnitSchemaModel;

class DropdownSelect extends Component
{
    public $schemas;
    public $units;
    public $elements;
    public $criterias;
    public $no_soal = [];
    public $codes;
    public $aunit;

    public $selectedSchema = null;
    public $selectedUnit = null;
    public $selectedElement = null;
    public $selectedCode = null;

    public function mount($selectedElement = null)
    {
        $this->schemas = SchemaModel::all();
        $this->units = collect();
        $this->elements = collect();
        $this->criterias = collect();
        $this->codes = collect();
        $this->unitss = collect();
        $this->selectedElement = $selectedElement;

    }

    public function render()
    {
        return view('livewire.dropdown-select');
    }

    public function updatedSelectedSchema($skema)
    {
        $this->units = UnitSchemaModel::where('schema_id', $skema)->get();
        $this->codes = CodeQuestion::where('schema_id', $skema)->get();
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
            $aunit = UnitSchemaModel::where('id', $unit)->first();
            $this->elements = ElementModel::where('unit_id', $aunit['unit_id'])->get();
        }
        $this->selectedElement = NULL;
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
