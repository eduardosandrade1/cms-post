<?php

namespace App\Contracts;

use App\Models\ItemLayout;

interface ActionItemContracts
{

    public function __construct($parameters, $post);

    public function execute(): void;
}
