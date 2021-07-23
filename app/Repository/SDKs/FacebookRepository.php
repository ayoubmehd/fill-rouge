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

        $this->fb->setDefaultAccessToken('EAAHpNe6BmVEBACvA90Kt2ZAGmZAjgtvI3MJMRM6ufqotVrUDzDW0urYnEd2Aw4wB7ax9znyjbJXrshutiNEqPcLCwytSLdOuzR3vSrcLRj8YyKpTkJYxD9rPd51NpXjY3A4c0GelZBxByqBZAsL5PZB4WZA9FOkwezlhKPyxZCZB5QZDZD');
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

    public function createPost($payload): object
    {
    }

    public function updatePost($id, $payload): object
    {
    }

    public function deletePost($id): bool
    {
    }
}
