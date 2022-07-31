<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriprtionFormController extends Controller
{
    public function create()
    {
        $data = DB::select('select * from newspapers');
        $data2 = DB::select('select * from subscriptioncategories');
        return view('subscribe', ['newspapers'=> $data],['subscriptioncategories'=> $data2]);
    }
}
