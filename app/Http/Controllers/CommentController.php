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
}
