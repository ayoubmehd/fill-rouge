<?php

namespace App\Repository\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Http\Request;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor
     * @param $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * 
     */
    public function paginate(): LengthAwarePaginator
    {
        // return \response()->json(Post::select('id', 'comment_count', 'ctm_post_id')->with(['ctmPost' => function ($query) {
        //     $query->select('id', 'content', 'platform', 'like_count')->with(['images' => function ($query) {
        //         $query->select('id', 'img_name', 'ctm_post_id');
        //     }]);
        // }])->paginate(10));

        return $this->model->select()->with(['post', 'images']);
    }

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
