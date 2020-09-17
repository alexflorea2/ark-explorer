<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class TransactionsController extends BaseController
{
    public function list(){
        return view('transactions');
    }

    public function show($id){
        return view('transaction')->with('id',$id);
    }
}
