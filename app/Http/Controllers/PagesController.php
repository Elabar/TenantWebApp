<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

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

    public function category()
    {
        //group by category
        $categories = Tenant::selectRaw('count(*) AS cnt, category')->groupBy('category')->orderBy('category','asc')->limit(5)->paginate(50);

        //group by zone
        //$tenants = Tenant::selectRaw('count(*) AS cnt, zone')->groupBy('zone')->orderBy('cnt','desc')->limit(5)->paginate(50);

        //group by floor
        //$tenants = Tenant::selectRaw('count(*) AS cnt, floor')->groupBy('floor')->orderBy('cnt','desc')->limit(5)->paginate(50);
        
        //nothing is group
        //$tenants = Tenant::orderBy('name')->paginate(50);
        $data = array(
            'categories' => $categories,
            'type' => 'category',
        );
        return view('tenants.index')->with($data);
    }

    public function zone()
    {
        //group by category
        //$tenants = Tenant::selectRaw('count(*) AS cnt, category')->groupBy('category')->orderBy('category','asc')->limit(5)->paginate(50);

        //group by zone
        $zones = Tenant::selectRaw('count(*) AS cnt, zone')->groupBy('zone')->orderBy('cnt','asc')->limit(5)->paginate(50);

        //group by floor
        //$tenants = Tenant::selectRaw('count(*) AS cnt, floor')->groupBy('floor')->orderBy('cnt','desc')->limit(5)->paginate(50);
        
        //nothing is group
        //$tenants = Tenant::orderBy('name')->paginate(50);
        $data = array(
            'zones' => $zones,
            'type' => 'zone',
        );
        return view('tenants.index')->with($data);
    }

    public function floor()
    {
        //group by category
        //$tenants = Tenant::selectRaw('count(*) AS cnt, category')->groupBy('category')->orderBy('category','asc')->limit(5)->paginate(50);

        //group by zone
        //$tenants = Tenant::selectRaw('count(*) AS cnt, zone')->groupBy('zone')->orderBy('cnt','desc')->limit(5)->paginate(50);

        //group by floor
        $floors = Tenant::selectRaw('count(*) AS cnt, floor')->groupBy('floor')->orderBy('cnt','asc')->limit(5)->paginate(50);
        
        //nothing is group
        //$tenants = Tenant::orderBy('name')->paginate(50);
        $data = array(
            'floors' => $floors,
            'type' => 'floor',
        );
        return view('tenants.index')->with($data);
    }

    public function floorT($floor)
    {
        $tenants = Tenant::where('floor',$floor)->paginate(50);
        $data = array(
            'tenants' => $tenants,
            'floor' =>$floor,
        );
        return view('floors.index')->with($data);
    }

    public function zoneT($zone)
    {
        $tenants = Tenant::where('zone',$zone)->paginate(50);
        $data = array(
            'tenants' => $tenants,
            'zone' =>$zone,
        );
        return view('zones.index')->with($data);
    }

    public function categoryT($category)
    {
        $tenants = Tenant::where('category',$category)->paginate(50);
        $data = array(
            'tenants' => $tenants,
            'category' =>$category,
        );
        return view('categories.index')->with($data);
    }
}
