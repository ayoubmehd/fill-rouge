<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$facebookConfig = [
    'app_id' => '537892820719953',
    'app_secret' => '1965ac9ee69aa6dc3bd993b0e294d2d4',

];

Route::get('/', function (Request $request) use ($facebookConfig) {

    $fb = new Facebook\Facebook($facebookConfig);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'user_likes'];
    $loginUrl = $helper->getLoginUrl(\url("/login"), $permissions);
    return "<a href=\"$loginUrl\">Login With Facebook</a>";
});

Route::get('login', function (Request $request) use ($facebookConfig) {
    $fb = new Facebook\Facebook($facebookConfig);
    $helper = $fb->getRedirectLoginHelper();
    $accessToken = $helper->getAccessToken();
    // OAuth 2.0 client handler
    $oAuth2Client = $fb->getOAuth2Client();
    // Exchanges a short-lived access token for a long-lived one
    $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    return $longLivedAccessToken;
});

Route::get('user', function () use ($facebookConfig) {

    $fb = new Facebook\Facebook($facebookConfig);

    $fb->setDefaultAccessToken('EAAHpNe6BmVEBAPjtnv1HcamRoYcGKZAxjZBp4ZA0o0GlyOAOZCbOqZBdpYQItkW2YY6KIKQSBVZCPcZAWnY7q2ZCarIuOkZAd3ZBZBEpD0ecQZBvOzowT8B79eB3ZC1YineEyb4VOPqyXRxhHjsiAbLtdFmZANWaParDrraJXSouVx5kORSAUsioJ0I5l9');
    $response = $fb->get('/me');
    $userNode = $response->getGraphUser();

    return $userNode;
});
