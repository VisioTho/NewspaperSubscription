<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriprtionFormController extends Controller
{
    public function create()
    {
        return view('subscribe');
    }
}
