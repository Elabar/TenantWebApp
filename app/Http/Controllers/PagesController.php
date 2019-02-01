<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Mega Mall';
        return view('pages.index')->with('title',$title);
    }

    public function contact(){
        $data = array(
            'title' => 'Contact Us',
            'services' => ['018-9457868','leehoemun@gmail.com','@LeeLhm123']
        );
        return view('pages.contact')->with($data);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }
}
