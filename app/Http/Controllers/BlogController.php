<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller {

    public function index() {

        $blogList = DB::table("blog")->get();

        return view('listBlogs', [
            "blogList" => $blogList
        ]);
    }

    public function create() {

        return view("createBlog");
    }

    public function store(Request $request) {

        $rules = [
            "title" => "required",
            "description" => "required"
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            
            return back()
            ->withErrors($validator)
            ->withInput();
        } else {
            
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
