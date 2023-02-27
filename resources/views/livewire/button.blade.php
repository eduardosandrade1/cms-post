<button class="btn btn-secondary"

type="{{ $type ?? 'button' }}"

{{ $name ? 'name='.$name : '' }}

{{ $formtarget ? 'formtarget='.$formtarget : '' }}

{{ $formnovalidate ? 'formnovalidate='.$formnovalidate : '' }}

{{ $formmethod ? 'formmethod='.$formmethod : '' }}

{{ $formenctype ? 'formenctype='.$formenctype : '' }}

{{ $formaction ? 'formaction='.$formaction : '' }}

{{ $form ? 'form='.$form : '' }}

{{ $disabled ? 'disabled' : '' }}

{{ $autofocus ? 'autofocus' : '' }}>

    {{ $value }}
</button>
