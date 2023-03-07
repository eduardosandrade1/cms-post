<?php

$files = glob(base_path('routes/web/*.php'), GLOB_BRACE);
$files = glob(base_path('routes/admin/*.php'), GLOB_BRACE);

foreach ($files as $file) {
    require $file;
}
