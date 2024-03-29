<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tenant;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name')->paginate(50);

        return view('categories.index')->with('categories',$categories);
        //return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
            'description' => 'required'
        ]);
        
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/home')->with('success','Category Created');
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
        //$tenants = Tenant::where('categoryID',$id)->orderBy('name')->paginate(50);

        $categoryName = Category::find($id)->name;

        $data = [
            'tenants' => Tenant::where('categoryID',$id)->orderBy('name')->paginate(50),
            'title' => 'Tenants in ' . $categoryName
        ];

        return view('tenants.index')->with($data);
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
    }
}
