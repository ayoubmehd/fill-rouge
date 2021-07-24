<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Facades\Log;
use App\Events\PostAdded;
use App\Repository\PlatformRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformRepository implements PlatformRepositoryInterface
{

    /**
     * @var Platform
     */
    protected $model;


    /**
     * CtmPostRepository constructor
     * @param CtmPost $model
     */
    public function __construct(Platform $model)
    {
        $this->model = $model;
    }

    public function findOrCreate($platform)
    {
        $res = $this->model->where("platform", $platform)->first();

        if ($res) {
            return $res;
        }

        return $this->model->create(["platform" => $platform]);
    }
}
