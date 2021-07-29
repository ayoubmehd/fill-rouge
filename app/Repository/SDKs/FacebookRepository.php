<?php

namespace App\Repository\SDKs;

use App\Repository\FacebookRepositoryInterface;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;

class FacebookRepository implements FacebookRepositoryInterface
{

    protected $fb;

    public function __construct(Facebook $fb)
    {
        $this->fb = $fb;
        // }
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
}
