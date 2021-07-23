<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FacebookRepositoryInterface;

class FacebookPostController extends Controller
{


    protected $facebookRepository;


    public function __construct(FacebookRepositoryInterface $facebookRepository)
    {
        $this->facebookRepository = $facebookRepository;
    }
    /**
     * Get the login url.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUrl()
    {
        $fb = new Facebook([
            'default_graph_version' => 'v2.10',
            'persistent_data_handler' => new \App\Classes\FacebookSession()
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'user_likes'];
        $loginUrl = $helper->getLoginUrl(\url("/login"), $permissions);
        return \response()->json(['url' => (string)$loginUrl], 200);
    }

    public function getPages()
    {
        return \response()->json([
            $this->facebookRepository->getPages()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAcessToken(Request $request)
    {
        Auth::user()->update([
            "facebook_access_token" => $request->input("access_token")
        ]);

        return \response()->json(['status' => 'ok'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
