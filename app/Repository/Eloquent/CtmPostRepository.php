<?php

namespace App\Repository\Eloquent;

use App\Repository\CtmPostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CtmPostRepository implements CtmPostRepositoryInterface
{


    /**
     * @return Collection
     */
    public function paginate(): Collection
    {
        return $this->model->select()->with(['post', 'images']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $payload
     * @return App\Models\CtmPost
     */
    public function store(Request $request, array $payload): Model
    {
        $this->model->ctmPost($payload);

        return $this->model;
    }

    public function show($id): Model
    {
        $this->model->findOrFail($id);

        return $this->model;
    }

    public function update(Request $request, $id, array $payload): bool
    {
        $this->model->findOrFial($id);

        $this->model->update($payload);

        return $this->model;
    }

    public function destroy($id): bool
    {
        $this->model->findOrFail($id)->delete();
    }
}
