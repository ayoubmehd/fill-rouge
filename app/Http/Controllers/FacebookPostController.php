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

    protected function saveAccessToken($longLivedAccessToken)
    {
        Auth::user()->facebook_access_token = (string)$longLivedAccessToken;
        Auth::user()->update();
    }

    public function setAccessToken()
    {
        $longLivedAccessToken = $this->facebookRepository->generateAccessToken();
        $this->saveAccessToken($longLivedAccessToken);
        return redirect('/');
    }
    /**
     * Get the login url.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUrl(Request $request)
    {
        $this->facebookRepository->setDefaultAccessToken($request->get('access_token'));

        $loginUrl = $this->facebookRepository->getLoginUrl();
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
