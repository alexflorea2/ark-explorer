<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class WalletsController extends BaseController
{
    public function show($id){
        return view('wallet')->with('id',$id);
    }
}
