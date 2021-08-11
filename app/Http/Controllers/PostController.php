<?php

namespace App\Http\Controllers;

use App\Events\PostAdded;
use App\Models\CtmPost;
use App\Models\Post;
use App\Models\User;
use App\Repository\CtmPostRepositoryInterface;
use App\Repository\PlatformRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * @var CtmPostRepositoryInterface
     */
    protected $postRepository;
    protected $platformRepository;

    /**
     * PostController Constructor
     * 
     * @param CtmPostRepositoryInterface $postRepository
     * @param PlatformRepositoryInterface $platformRepository
     */
    public function __construct(CtmPostRepositoryInterface $postRepository, PlatformRepositoryInterface $platformRepository)
    {
        $this->postRepository = $postRepository;
        $this->platformRepository = $platformRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return \response()->json(Post::select('id', 'comment_count', 'ctm_post_id')->with(['ctmPost' => function ($query) {
        //     $query->select('id', 'content', 'platform', 'like_count')->with(['images' => function ($query) {
        //         $query->select('id', 'img_name', 'ctm_post_id');
        //     }]);
        // }])->paginate(10));

        return \response()->json($this->postRepository->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();

        $user = Auth::user();


        $this->postRepository->associate('user', $user);
        $post = $this->postRepository->store([
            'content' => $request->content
        ]);

        $platforms = [];
        foreach ($request->platforms as $platform) {
            $platform = $this->platformRepository->findOrCreate($platform);
            $platforms[] = $platform->id;
        }
        $this->postRepository->attach("platforms", $platforms);

        // Emmit add event
        PostAdded::dispatch($post, [
            "facebook" => [
                "page" => $request->fbPage,
            ],
        ]);

        return \response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return \response()->json(Post::select('id', 'comment_count', 'ctm_post_id')->with(['ctmPost' => function ($query) {
        //     $query->select('id', 'content', 'platform', 'like_count')->with(['images' => function ($query) {
        //         $query->select('id', 'img_name', 'ctm_post_id');
        //     }]);
        // }])->findOrFail($id));

        return $this->postRepository->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $post = Post::findOrFail($id);

        // // $user = User::find(1);

        // $post->ctmPost->content = $request->content;
        // $post->ctmPost->platform = $request->platform;

        // $post->push();
        $post = $this->postRepository->update($id, [
            'content' => $request->content,
            'platform' => $request->platform
        ]);

        return \response()->json($post, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return \response()->json([], 202);
    }
}
