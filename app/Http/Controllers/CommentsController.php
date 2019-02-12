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

    /*
     * Functin to store the comments on a blog in DB
     */
    public function store(CommentInsertRequest $commentInsertRequest) {

        $addComments = $this->commentService->addCommentService($commentInsertRequest);

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
