<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('about', ['pageTitle'=>'Over']);
    }
}
