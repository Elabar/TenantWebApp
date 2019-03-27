<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\Zone;
use App\Floor;
use App\Category;

class TenantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'create', 'destroy', 'update' , 'edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'tenants' => Tenant::orderBy('name')->paginate(50),
            'title' => "All Tenants"
        ];

        return view('tenants.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $data = [
            'zones' => Zone::orderBy('name')->get(),
            'floors' => Floor::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get()
        ];
        

        //$data = Zone::orderBy('name')->get();
        return view('tenants.create')->with($data);
        //return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'lotNumber' => 'required',
            'description' => 'required'
        ]);
        
        $tenant = new Tenant;
        $tenant->name = $request->input('name');
        $tenant->zoneID = $request->input('zoneID');
        $tenant->floorID = $request->input('floorID');
        $tenant->lotNumber = $request->input('lotNumber');
        $tenant->categoryID = $request->input('categoryID');
        $tenant->description = $request->input('description');
        $tenant->save();

        return redirect('/tenants')->with('success','Tenant Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tenant = Tenant::find($id);
        $data = [
            'tenant' => Tenant::find($id),
            'zoneName' => Zone::find($tenant->zoneID)->name,
            'floorName' => Floor::find($tenant->floorID)->name,
            'categoryName' => Category::find($tenant->categoryID)->name
        ];
        return view('tenants.show')->with($data);
        //return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tenant = Tenant::find($id);

        $data = [
            'tenant' => Tenant::find($id),
            'zones' => Zone::orderBy('name')->get(),
            'floors' => Floor::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get()
        ];
        return view('tenants.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'lotNumber' => 'required',
            'description' => 'required'
        ]);
        
        $tenant = Tenant::find($id);
        $tenant->name = $request->input('name');
        $tenant->zoneID = $request->input('zoneID');
        $tenant->floorID = $request->input('floorID');
        $tenant->lotNumber = $request->input('lotNumber');
        $tenant->categoryID = $request->input('categoryID');
        $tenant->description = $request->input('description');
        $tenant->save();

        return redirect('/tenants')->with('success','Tenant details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect('/tenants')->with('success','Tenant deleted');
    }

    /*
     * Specialy craft function for destroy in dashboard so
     * it will redirect back to dashboard
    */
    public function destroyInDashboard($id)
    {
        //
        $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect('/home')->with('success','Tenant deleted');
    }
}
