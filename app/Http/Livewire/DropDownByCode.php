<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CodeQuestion;
use App\Models\ElementModel;
use App\Models\CriteriaModel;
use App\Models\UnitSchemaModel;

class DropDownByCode extends Component
{
    public $units;
    public $elements;
    public $criterias;
    public $no_soal = [];
    public $aunit;
    public $codeQuestion;
    public $code_id;

    public $selectedUnit = null;
    public $selectedElement = null;

    public function mount($selectedElement = null, $codeQuestion)
    {
        $this->code_id = $codeQuestion->id;
        $this->codeQuestion = $codeQuestion->schema->id;
        $this->units = UnitSchemaModel::where('schema_id', $this->codeQuestion)->get();
        $this->elements = collect();
        $this->criterias = collect();
        $this->selectedElement = $selectedElement;
    }

    public function render()
    {
        return view('livewire.drop-down-by-code');
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
