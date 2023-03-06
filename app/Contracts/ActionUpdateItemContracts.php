<?php

namespace App\Contracts;

use App\Models\ItemLayout;

interface ActionUpdateItemContracts
{

    public function __construct($parameters);

    public function execute(): void;
}
