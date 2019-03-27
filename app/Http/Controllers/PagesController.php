<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

class PagesController extends Controller
{
    //

    public function home(){
        $title = 'Mega Mall';
        return view('pages.index')->with('title',$title);
    }

    public function contact(){
        $data = [
            'title' => 'Contact',
            'contacts' => ['018-9457868','leehoemun@gmail.com','@LeeLhm123']
        ];
        
        return view('pages.contact')->with($data);
    }

    public function about(){
        $title = 'Mega Mall';
        return view('pages.about')->with('title',$title);
    }

    public function dashboard(){

        $data = [
            'tenants' => Tenant::orderBy('name')->paginate(50),
            'title' => "All Tenants"
        ];
        return view('home')->with($data);
    }
}
