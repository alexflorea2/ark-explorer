<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class BlocksController extends BaseController
{
    public function list(){
        return view('blocks');
    }

    public function show($id){
        return view('block')->with('id',$id);
    }
}
