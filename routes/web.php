<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Classes\FacebookSession;
use App\Http\Controllers\FacebookPostController;

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

Route::get('/facebook', function (Request $request) {

    $fb = new Facebook\Facebook(['persistent_data_handler' => new FacebookSession]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'user_likes', 'pages_manage_posts',  'pages_read_engagement', 'pages_show_list'];
    $loginUrl = $helper->getLoginUrl(\url("/login"), $permissions);
    return "<a href=\"$loginUrl\">Login With Facebook</a>";
});

Route::prefix("facebook")->group(function () {
    Route::get("set-access-token", [FacebookPostController::class, "setAccessToken"]);
});

// Route::get('login', function (Request $request) {
//     $fb = new Facebook\Facebook(['persistent_data_handler' => new FacebookSession]);
//     $helper = $fb->getRedirectLoginHelper();
//     $accessToken = $helper->getAccessToken();
//     // OAuth 2.0 client handler
//     $oAuth2Client = $fb->getOAuth2Client();
//     // Exchanges a short-lived access token for a long-lived one
//     $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
//     return $longLivedAccessToken;
// });

// Route::get('user', function () {

//     $fb = new Facebook\Facebook();

//     $fb->setDefaultAccessToken('EAAHpNe6BmVEBAPjtnv1HcamRoYcGKZAxjZBp4ZA0o0GlyOAOZCbOqZBdpYQItkW2YY6KIKQSBVZCPcZAWnY7q2ZCarIuOkZAd3ZBZBEpD0ecQZBvOzowT8B79eB3ZC1YineEyb4VOPqyXRxhHjsiAbLtdFmZANWaParDrraJXSouVx5kORSAUsioJ0I5l9');
//     $response = $fb->get('/me');
//     $userNode = $response->getGraphUser();

//     return $userNode;
// });

Route::get("/{any?}", function () {
    return view("welcome");
})->where("any", "[\/\w\.-]*");
