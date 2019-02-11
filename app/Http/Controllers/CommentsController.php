<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Services\CommentService;
use App\Http\Requests\CommentInsertRequest;

class CommentsController extends Controller {

    private $commentService;

    public function __construct(CommentService $commentService) {

        $this->commentService = $commentService;
    }

    public function index($blogId) {
//        
    }

    public function create() {
//
    }

    public function store(CommentInsertRequest $commentInsertRequest) {

        $addComments = $this->commentService->addCommentService($commentInsertRequest);
        
        
        print_r($addComments);exit;
        
        $insertQuery = DB::table("blog_comments")->insert(
                [
                    "comment" => $request->comment,
                    "blog_id" => $request->id,
                    "created_at" => date("Y-m-d h:i:s"),
                    "updated_at" => date("Y-m-d h:i:s"),
                ]
        );





        if ($insertQuery == 1) {
            $message = "comment added successfully!!!";
        } else {
            $message = "failed to add comment!!!";
        }

        return back()->with('message', $message);
    }

    public function show($id) {
        //
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
