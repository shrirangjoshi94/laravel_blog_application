<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller {

    public function index() {

        $blogList = DB::table("blogs")->get();
        $blogList = (isset($blogList) && !empty($blogList)) ? $blogList : array();

        //print_r($blogList);exit;

        return view('listBlogs', [
            "blogList" => $blogList
        ]);
    }

    public function create() {

        return view("createBlog");
    }

    public function store(Request $request) {

        $rules = [
            "title" => "bail|required|unique:blogs|max:255",
            "description" => "required"
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {

            return back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $insertQuery = DB::table("blogs")->insert(
                    [
                        "title" => $request->title,
                        "description" => $request->description,
                        "created_at" => date("Y-m-d h:i:s"),
                        "updated_at" => date("Y-m-d h:i:s"),
                    ]
            );

            if ($insertQuery == 1) {
                $message = "blog post published successfully!!!";
            } else {
                $message = "failed to publish blog post!!!";
            }

            return redirect("blog")->with('message', $message);
        }
    }

    public function show($id) {

        $blogDetails = DB::table('blogs')->where('id', $id)->first();

        $objCommentController = new CommentsController();
        $commentDetails = $objCommentController->index($id);

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
