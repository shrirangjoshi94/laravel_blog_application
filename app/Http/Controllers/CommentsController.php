<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller {

    public function index($id) {

        $getComments = DB::table("blog_comments")
                ->where("blog_id", "=", $id)
                ->get();

        return $getComments;
    }

    public function create() {
//
    }

    public function store(Request $request) {

        $rules = [
            "comment" => "required"
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
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
