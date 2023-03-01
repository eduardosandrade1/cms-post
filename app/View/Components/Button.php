<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

    const CSS_STYLE_DISABLED = 'disabled';

    public $type;

    public $disabled;

    public $class;

    public $text;


    // 'type',
    // 'name',
    // 'formtarget',
    // 'formnovalidate',
    // 'formmethod',
    // 'formenctype',
    // 'formaction',
    // 'form',
    // 'disabled',
    // 'autofocus',
    // 'value',
    // 'type',

    public function __construct(string $type, string $class = '', string $text = '', bool $disabled = false)
    {
        $this->disabled = $disabled;
        $this->type = $type;

        if ( $this->disabled ) {
            $class .= " disabled ";
        }
        $this->class = $class;
        $this->text = $text;
    }


    public function render()
    {
        return view('components.button', [
            'type' => $this->type,
            'disabled' => $this->disabled,
            'class' => $this->class,
            'text' => $this->text,
        ]);
    }
}
