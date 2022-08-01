<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Show()
    {
        $data = DB::select('select * from users');
        return view('admin',['users'=> $data]);
    }
}
