<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Services\BlogService;
use App\Http\Requests\BlogInsertRequest;
use App\Services\CommentService;

class BlogController extends Controller {

    private $blogService;
    private $commentService;

    public function __construct(BlogService $blogService, CommentService $commentService) {

        $this->blogService = $blogService;
        $this->commentService = $commentService;
    }

    public function index() {

        $blogList = $this->blogService->getAllBlogsService();
        $blogList = (isset($blogList) && !empty($blogList)) ? $blogList : array();

        return view('listBlogs', [
            "blogList" => $blogList
        ]);
    }

    public function create() {

        return view("createBlog");
    }

    public function store(BlogInsertRequest $blogInsertRequest) {

        $addNewBlog = $this->blogService->addNewBlogService($blogInsertRequest);

        if ($addNewBlog == 1) {
            $message = "blog post published successfully!!!";
        } else {
            $message = "failed to publish blog post!!!";
        }

        return redirect("blog")->with('message', $message);
    }

    public function show($id) {

        $blogDetails = $this->blogService->getBlogDetailsService($id);
        $commentDetails = $this->commentService->getCommentsForABlogService($id);

        return view("viewBlogDetails", [
            "blogDetails" => $blogDetails,
            "commentDetails" => $commentDetails,
        ]);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

}
