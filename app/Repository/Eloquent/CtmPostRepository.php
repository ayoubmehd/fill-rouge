<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Facades\Log;
use App\Repository\CtmPostRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\CtmPost;
use App\Providers\PostDeleted;
use App\Providers\PostUpdated;
use App\Repository\FacebookRepositoryInterface;
use Mockery\Matcher\Any;
use Nette\Utils\Json;
use Illuminate\Support\Facades\Auth;

class CtmPostRepository implements CtmPostRepositoryInterface
{

    /**
     * @var CtmPost
     */
    protected $model;

    protected $fb;


    /**
     * CtmPostRepository constructor
     * @param CtmPost $model
     */
    public function __construct(CtmPost $model, FacebookRepositoryInterface $fb)
    {
        $this->model = $model;
        $this->fb = $fb;
    }
    /**
     * @return Collection
     */
    public function paginate()
    {
        return $this->model->select()->with(['post', 'images', 'platforms' => function ($query) {
            $query->withPivot("metadata", "external_id");
        }])->paginate(10);

        // $this->fb->setDefaultAccessToken(Auth::user()->facebook_access_token);

        // return $data->map(function ($post) {
        //     $post  = $post->platforms->map(function ($platform) {
        //         $platforms = [];
        //         switch ($platform->platform) {
        //             case "fb":
        //                 if (empty($platform->pivot)) return;

        //                 if (empty($platform->pivot->metadata)) return;

        //                 $metadata = json_decode($platform->pivot->metadata);
        //                 if (empty($metadata->facebook_page_id)) return;

        //                 if (empty($platform->pivot->external_id)) return;

        //                 // $platforms["fb"] = $this->fb->getPostLikes($metadata->facebook_page_id, $platform->pivot->external_id);
        //                 $platforms["fb"] = $this->fb->getPostLikes($metadata->facebook_page_id, $platform->pivot->external_id);

        //                 break;

        //             default:
        //                 # code...
        //                 break;
        //         }

        //         return $platforms;
        //     });
        //     return $post;
        // });
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

        PostUpdated::dispatch($this->model);
        return true;
    }

    public function destroy($id): bool
    {
        $this->model->findOrFail($id)->delete();

        PostDeletedRoute::dispatch($id);
        return true;
    }

    public function associate(string $relName, Model $rel): void
    {
        $this->model->$relName()->associate($rel);
    }

    public function attach(string $relName, array $ids): void
    {
        $this->model->$relName()->attach($ids);
    }
}
