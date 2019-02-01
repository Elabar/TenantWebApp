<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::orderBy('name','asc')->paginate(50);
        return view('tenants.index')->with('tenants',$tenants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'zone' => 'required',
            'floor' => 'required',
            'lot_num' => 'required',
            'category' => 'required',
        ]);

        
        $tenant = new Tenant;
        $tenant->name = $request->input('name');
        $tenant->zone = $request->input('zone');
        $tenant->floor = $request->input('floor');
        $tenant->lot_num = $request->input('lot_num');
        $tenant->category = $request->input('category');
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
        $tenant = Tenant::find($id);
        return view('tenants.show')->with('tenant',$tenant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('tenants.edit')->with('tenant',$tenant);
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
        $this->validate($request, [
            'name' => 'required',
            'zone' => 'required',
            'floor' => 'required',
            'lot_num' => 'required',
            'category' => 'required',
        ]);

        
        $tenant = Tenant::find($id);
        $tenant->name = $request->input('name');
        $tenant->zone = $request->input('zone');
        $tenant->floor = $request->input('floor');
        $tenant->lot_num = $request->input('lot_num');
        $tenant->category = $request->input('category');
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
        $tenant = Tenant::find($id);
        $tenant->delete();

        return redirect('/tenants')->with('success','Tenant deleted');
    }
}
