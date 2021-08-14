<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FacebookRepositoryInterface;

class CommentController extends Controller
{


    protected $facebookRepository;


    public function __construct(FacebookRepositoryInterface $facebookRepository)
    {
        $this->facebookRepository = $facebookRepository;
    }

    public function getFacebookPostComments(Request $request, $page_id, $post_id)
    {
        $this->facebookRepository->setDefaultAccessToken($request->user()->facebook_access_token);

        return response()->json($this->facebookRepository->getPostComments($page_id, $post_id));
    }

    public function store(Request $request, $page_id, $post_id)
    {
        $this->facebookRepository->setDefaultAccessToken($request->user()->facebook_access_token);

        return response()->json($this->facebookRepository->createComment($page_id, $post_id, $request->comment));
    }

    public function reply(Request $request, $page_id, $comment_id)
    {
        $this->facebookRepository->setDefaultAccessToken($request->user()->facebook_access_token);

        return response()->json($this->facebookRepository->replyToComment($page_id, $comment_id, $request->comment));
    }
}
