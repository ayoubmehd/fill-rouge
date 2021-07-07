<?php

namespace App\Http\Controllers;

use App\Models\CtmPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \response()->json(Post::select('id', 'comment_count', 'ctm_post_id')->with(['ctmPost' => function ($query) {
            $query->select('id', 'content', 'platform', 'like_count')->with(['images' => function ($query) {
                $query->select('id', 'img_name', 'ctm_post_id');
            }]);
        }])->paginate(10));
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

        $user = User::find(1);

        $ctmPost = new  CtmPost([
            'content' => $request->content,
            'platform' => $request->platform,
        ]);

        $ctmPost->user()->associate($user);

        $post->ctmPost()->associate($ctmPost);

        $post->push();

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
        return \response()->json(Post::select('id', 'comment_count', 'ctm_post_id')->with(['ctmPost' => function ($query) {
            $query->select('id', 'content', 'platform', 'like_count')->with(['images' => function ($query) {
                $query->select('id', 'img_name', 'ctm_post_id');
            }]);
        }])->findOrFail($id));
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
        $post = Post::findOrFail($id);

        // $user = User::find(1);

        $post->ctmPost->content = $request->content;
        $post->ctmPost->platform = $request->platform;

        $post->push();

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
        Post::findOrFail($id)->delete();

        return \response()->json([], 202);
    }
}
