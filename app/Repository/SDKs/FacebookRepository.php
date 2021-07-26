<?php

namespace App\Repository\SDKs;

use App\Repository\FacebookRepositoryInterface;
use Facebook\Facebook;

class FacebookRepository implements FacebookRepositoryInterface
{

    protected $fb;

    public function __construct(Facebook $fb)
    {
        $this->fb = $fb;

        $this->fb->setDefaultAccessToken('EAAHpNe6BmVEBAHuXSpFCwlZC9qMre1PlZAvZC9Ja4ZBe92eFLBhemh1j3LQfrxfEslgX7GZBpKq2KKKatSvsYO49NFSms8uSfC6K1Fz0X8rhG5GOWop5iFUZB3uU3I1AjffW5pcYfe9vUKZAv72unCV444vB3HzVSy2IgEjwTLcTqPuweqBmA7S');
        // $linkData = [
        //     'link' => 'https://github.com/facebookarchive/php-graph-sdk/blob/master/docs/examples/post_links.md',
        //     'message' => 'This message is posted using the facebook PHP SDK',
        // ];

        // try {
        //     $response = $fb->post('/me/feed', $linkData);
        // } catch (Facebook\Exception\ResponseException $e) {
        //     return 'Graph returned an error: ' . $e->getMessage();
        //     exit;
        // } catch (Facebook\Exception\SDKException $e) {
        //     return 'Facebook SDK returned an error: ' . $e->getMessage();
        //     exit;
        // }

        // $graphNode = $response->getGraphNode();

        // return $graphNode['id'];
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
}
