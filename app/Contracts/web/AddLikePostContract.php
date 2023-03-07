<?php

namespace App\Contracts\Web;

interface AddLikePostContract
{

    public function execute(int $idPost, int $userId);

}
