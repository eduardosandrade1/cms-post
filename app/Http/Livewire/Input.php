<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $min;
    public $max;
    public $placeholder;
    public $autofocus;
    public $value;
    public $disabled;
    public $alt;
    public $readonly;

    public function render()
    {
        return view('livewire.input', [
                'type' => $this->type,
                'name' => $this->name,
                'label' => $this->label,
                'min' => $this->min,
                'max' => $this->max,
                'placeholder' => $this->placeholder,
                'autofocus' => $this->autofocus,
                'value' => $this->value,
                'disabled' => $this->disabled,
                'alt' => $this->alt,
                'readonly' => $this->readonly,
            ]);

    }
}
