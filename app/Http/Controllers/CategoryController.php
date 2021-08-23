<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !in_array( "category.index", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
       
        $categories=Category::All();
       
        return view('managment.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !in_array( "category.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $parent_categories=Category::all();
        return view('managment.categories.create',compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !in_array( "category.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|max:50',
            'description' => 'required|max:300000',
            ]); 
            
        $fileName = time().'_'.$request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('categories', $fileName, 'public');

        $category=new Category();

        if($request->parent_id == 0){
            $category->create([
                'name'=>$request->name,
                'description'=>$request->description,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
            ]);
        }else{
            $category->create([
                'name'=>$request->name,
                'description'=>$request->description,
                'parent_id'=>$request->parent_id,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
            ]);
        }
           
      
        return redirect()->Route('category.index')->with('success','La Categorie: <strong>'.$category->name.'</strong> est ajoutée!');

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
