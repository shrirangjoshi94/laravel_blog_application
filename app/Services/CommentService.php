<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService {

    private $commentRepository;

    public function __construct(CommentRepository $commentRepository) {

        $this->commentRepository = $commentRepository;
    }

    public function getCommentsForABlogService($blogId) {
        return $this->commentRepository->getCommentsForABlogRepository($blogId);
    }

    public function addCommentService($commentInsertRequest)
    {
        return $this->commentRepository->addCommentRepository($commentInsertRequest);
    }
}
