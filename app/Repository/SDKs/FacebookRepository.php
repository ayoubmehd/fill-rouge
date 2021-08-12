<?php

namespace App\Repository\SDKs;

use App\Repository\FacebookRepositoryInterface;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;

class FacebookRepository implements FacebookRepositoryInterface
{

    protected $fb;
    protected $permissions = ['email', 'user_likes', 'pages_manage_posts',  'pages_read_engagement', 'pages_show_list'];

    public function __construct(Facebook $fb)
    {
        $this->fb = $fb;
    }

    public function getPages()
    {

        $facebook_user_id = $this->fb->get("/me?fields=id")->getGraphUser()["id"];
        $response = $this->fb->get(
            '/' . $facebook_user_id . '/accounts'
        );
        return  collect($response->getDecodedBody()['data'])->map(function ($page) {
            return [
                "id" => $page["id"],
                "name" => $page["name"]
            ];
        });
    }

    public function createPost($payload)
    {

        $page_id = $payload["page_id"];

        $page_access_token = $this->getPageAccessToken($page_id);

        $content = $payload["post"]->content;
        $response = $this->fb->post(
            "/$page_id/feed",
            [
                'message' => $content,
            ],
            $page_access_token
        );

        return $response->getDecodedBody();
    }

    public function updatePost($id, $payload): object
    {
    }

    public function deletePost($id): bool
    {
    }

    protected function getPageAccessToken($page_id)
    {
        return collect(
            $this->fb->get(
                "/me/accounts?fields=access_token"
            )->getDecodedBody()["data"]
        )->first(function ($page) use ($page_id) {
            return $page["id"] === $page_id;
        })["access_token"];
    }

    public function setDefaultAccessToken($access_token)
    {
        $this->fb->setDefaultAccessToken($access_token);
    }

    public function generateAccessToken(): string
    {
        $helper = $this->fb->getRedirectLoginHelper();
        $accessToken = $helper->getAccessToken();
        // OAuth 2.0 client handler
        $oAuth2Client = $this->fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

        return  (string)$longLivedAccessToken;
    }

    public function refreshAccessToken()
    {
        $params = [
            "client_id" => env("FACEBOOK_APP_ID"),
            "client_secret" => env("FACEBOOK_APP_SECRET"),
            "grant_type" => "fb_exchange_token",
            "fb_exchange_token" => $this->fb->getDefaultAccessToken()->getValue()
        ];
        $query_params = http_build_query($params);
        return $this->fb->get("oauth/access_token?$query_params")->getDecodedBody()["access_token"];
    }

    public function getLoginUrl()
    {

        $helper = $this->fb->getRedirectLoginHelper();

        $loginUrl = $helper->getLoginUrl(\url("/facebook/set-access-token"), $this->permissions);

        return $loginUrl;
    }

    public function getPostData($page_id, $post_id)
    {
        $response = $this->fb->get(
            "/" . $page_id . "_$post_id/"
        );


        return (array)$response->getDecodedBody();
    }
    public function getPostLikes($page_id, $post_id)
    {
        $response = $this->fb->get(
            "/" . $page_id . "_$post_id/likes"
        );


        return (array)$response->getDecodedBody();
    }
}
