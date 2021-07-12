<?php

namespace App\Repository\Eloquent;

use App\Repository\CtmPostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\CtmPost;

class CtmPostRepository implements CtmPostRepositoryInterface
{

    /**
     * @var CtmPost
     */
    protected $model;


    /**
     * CtmPostRepository constructor
     * @param CtmPost $model
     */
    public function __construct(CtmPost $model)
    {
        $this->model = $model;
    }
    /**
     * @return Collection
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->model->select()->with(['post', 'images'])->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $payload
     * @return App\Models\CtmPost
     */
    public function store(array $payload): Model
    {
        foreach ($payload as $key => $value) {
            $this->model->$key = $value;
        }
        $this->model->push();
        return $this->model;
    }

    public function show($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $payload): bool
    {
        $this->model->findOrFail($id)
            ->update($payload);

        return true;
    }

    public function destroy($id): bool
    {
        $this->model->findOrFail($id)->delete();

        return true;
    }

    public function associate(string $relName, Model $rel): void
    {
        $this->model->$relName()->associate($rel);
    }
}
