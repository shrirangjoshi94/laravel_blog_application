<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Comment;

class CommentRepository {

    private $commentModel;

    public function __construct(Comment $commentModel) {
        $this->commentModel = $commentModel;
    }

    public function getCommentsForABlogRepository($blogId) {

        return $this->commentModel::where("blog_id", $blogId)
                        ->get();
    }

    public function addCommentRepository($commentInsertRequest) {

        $this->commentModel->comment = $commentInsertRequest->comment;
        $this->commentModel->blog_id = $commentInsertRequest->id;
        return $this->commentModel->save();
    }

}
