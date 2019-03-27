<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home(){
        $title = 'Mega Mall';
        return view('pages.index')->with('title',$title);
    }
}
