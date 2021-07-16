<?php

namespace App\Repository;

interface FacebookRepositoryInterface
{

    public function createPost($payload): Object;
    public function updatePost($id, $payload): Object;
    public function deletePost($id): bool;

    // public function createComment($payload): Object;
    // public function updateComment($id, $payload): Object;
    // public function deleteComment($id): bool;

    // public function createMessage($payload): Object;
    // public function updateMessage($id, $payload): Object;
    // public function deleteMessage($id): bool;
}
