<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function test()
    {
        $xyz = DB::table("users")->get();
        print_r($xyz);exit;
        
    }
}
