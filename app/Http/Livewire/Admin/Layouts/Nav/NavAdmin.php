<?php

namespace App\Http\Livewire\Admin\Layouts\Nav;

use Livewire\Component;

class NavAdmin extends Component
{
    public $active;

    public function render()
    {
        return view('livewire.admin.layouts.nav.nav-admin');
    }
}
