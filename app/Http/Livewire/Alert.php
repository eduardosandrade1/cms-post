<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{

    public $status;

    public $message;

    public $align = 'center';


    public function render()
    {
        return view('livewire.alert', [
            'status' => $this->status,
            'message' => $this->message,
            'align' => $this->align,
        ]);
    }
}
