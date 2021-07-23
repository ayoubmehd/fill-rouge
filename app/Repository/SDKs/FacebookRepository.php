<?php

namespace App\Repository\SDKs;

use App\Repository\FacebookRepositoryInterface;
use Facebook\Facebook;

class FacebookRepository implements FacebookRepositoryInterface
{

    protected $fb;

    public function __construct()
    {
        $this->fb = new Facebook(["default_graph_version" => "v2.10"]);

        $this->fb->setDefaultAccessToken('EAAHpNe6BmVEBAPjtnv1HcamRoYcGKZAxjZBp4ZA0o0GlyOAOZCbOqZBdpYQItkW2YY6KIKQSBVZCPcZAWnY7q2ZCarIuOkZAd3ZBZBEpD0ecQZBvOzowT8B79eB3ZC1YineEyb4VOPqyXRxhHjsiAbLtdFmZANWaParDrraJXSouVx5kORSAUsioJ0I5l9');
        $linkData = [
            'link' => 'https://github.com/facebookarchive/php-graph-sdk/blob/master/docs/examples/post_links.md',
            'message' => 'This message is posted using the facebook PHP SDK',
        ];

        try {
            $response = $fb->post('/me/feed', $linkData);
        } catch (Facebook\Exception\ResponseException $e) {
            return 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exception\SDKException $e) {
            return 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $graphNode = $response->getGraphNode();

        return $graphNode['id'];
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
