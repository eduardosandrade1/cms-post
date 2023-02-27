<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{

    public $autofocus;

    public $name;

    public $disabled;

    public $type;

    public $value;

    public $formtarget;

    public $formnovalidate;

    public $formenctype;

    public $formaction;

    public $form;

    public $formmethod;

    public function render()
    {

        return view('livewire.button', [
            'autofocus' => $this->autofocus,
            'name' => $this->name,
            'disabled' => $this->disabled,
            'type' => $this->type,
            'value' => $this->value,
            'formtarget' => $this->formtarget,
            'formnovalidate' => $this->formnovalidate,
            'formenctype' => $this->formenctype,
            'formaction' => $this->formaction,
            'formmethod' => $this->formmethod,
            'form' => $this->form,
        ]);
    }
}
