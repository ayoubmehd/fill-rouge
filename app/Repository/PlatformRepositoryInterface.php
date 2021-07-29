<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface PlatformRepositoryInterface
{
    public function findOrCreate($platform);
}
