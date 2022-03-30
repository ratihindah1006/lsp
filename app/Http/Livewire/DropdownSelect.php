<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitModel;
use App\Models\SchemaModel;
use App\Models\CodeQuestion;
use App\Models\ElementModel;
use Illuminate\Http\Request;
use App\Models\CriteriaModel;

class DropdownSelect extends Component
{
    public $schemas;
    public $units;
    public $elements;
    public $criterias;
    public $no_soal = [];
    public $codes;

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
        $this->selectedElement = $selectedElement;

    }

    public function render()
    {
        return view('livewire.dropdown-select');
    }

    public function updatedSelectedSchema($skema)
    {
        $this->units = UnitModel::where('schema_id', $skema)->get();
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
            $this->elements = ElementModel::where('unit_id', $unit)->get();
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
