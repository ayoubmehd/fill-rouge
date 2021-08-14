<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\FacebookRepositoryInterface;
use Facebook\Authentication\AccessToken;

class SetAccessTokens
{
    protected $facebookRepository;

    function __construct(FacebookRepositoryInterface $facebookRepository)
    {
        $this->facebookRepository = $facebookRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            $this->facebookRepository->setDefaultAccessToken($request->user()->facebook_access_token);
            $accessToken = new AccessToken($request->user()->facebook_access_token);
            $request->attributes->add(['access_token' => (string)$accessToken]);
            if ($accessToken->isExpired()) {
                $longLivedAccessToken = $this->facebookRepository->refreshAccessToken();
                $request->user()->facebook_access_token = (string)$longLivedAccessToken;
                $request->user()->update();
            }
        }

        return $next($request);
    }
}
