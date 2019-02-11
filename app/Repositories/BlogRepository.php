<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Blog;

class BlogRepository {

    private $blogModel;

    public function __construct(Blog $blogModel) {
        $this->blogModel = $blogModel;
    }

    public function getAllBlogsRepository() {

        return $this->blogModel::all();
    }

    public function addNewBlogRepository($blogInsertRequest) {

        $this->blogModel->title = $blogInsertRequest->title;
        $this->blogModel->description = $blogInsertRequest->description;
        return $this->blogModel->save();
    }

    public function getBlogDetailsRepository($id) {

        return $this->blogModel::where("id", $id)
                        ->first();
    }

}
