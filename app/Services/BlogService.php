<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService {

    private $blogRepository;

    public function __construct(BlogRepository $blogRepository) {
        $this->blogRepository = $blogRepository;
    }

    public function getAllBlogsService() {

        return $this->blogRepository->getAllBlogsRepository();
    }

    public function addNewBlogService($blogInsertRequest) {

        return $this->blogRepository->addNewBlogRepository($blogInsertRequest);
    }

    public function getBlogDetailsService($id) {

        return $this->blogRepository->getBlogDetailsRepository($id);
    }

}
