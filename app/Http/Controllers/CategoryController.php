<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;


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
            'admin_percent' => 'required|max:100',
            ]); 
            
        $fileName = time().'_'.$request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('categories', $fileName, 'public');

        $fileName = time().'_'.$request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('categories', $fileName, 'public');
        $data=getimagesize('storage/'.$filePath);
        if($data[0] != 132 || $data[1] != 132){
            $img = Image::make('storage/'.$filePath);
            $img->resize(132,132)->save('storage/'.$filePath,100);
        }
        
        $category=new Category();

        if($request->parent_id == 0){
            $category->create([
                'name'=>$request->name,
                'description'=>$request->description,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
                'admin_percent'=>$request->admin_percent,
            ]);
        }else{
            $category->create([
                'name'=>$request->name,
                'description'=>$request->description,
                'parent_id'=>$request->parent_id,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
                'admin_percent'=>$request->admin_percent,
            ]);
        }
           
      
        return redirect()->Route('category.index',app()->getLocale())->with('success','La Categorie: <strong>'.$category->name.'</strong> est ajoutée!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($language,$id)
    {
        $parent_categories=Category::all();
        $category=Category::find(decrypt($id));
        
        return view('managment.categories.edit',compact('parent_categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if( !in_array( "category.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $category=Category::FindOrFail(decrypt($request->category_id));

        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:300000',
            ]); 
            
            $filePath=$request->old_logo;

            if($request->logo != null){
                $fileName = time().'_'.$request->logo->getClientOriginalName();
                $filePath = $request->file('logo')->storeAs('categories', $fileName, 'public');
        
                $fileName = time().'_'.$request->logo->getClientOriginalName();
                $filePath = $request->file('logo')->storeAs('categories', $fileName, 'public');
                $data=getimagesize('storage/'.$filePath);
                if($data[0] != 132 || $data[1] != 132){
                    $img = Image::make('storage/'.$filePath);
                    $img->resize(132,132)->save('storage/'.$filePath,100);
                }
            }

        if($request->parent_id == 0){
            $category->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
            ]);
        }else{
            $category->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'parent_id'=>$request->parent_id,
                'slug'=>Str::slug($request->name),
                'picture'=>$filePath,
            ]);
        }
        return redirect()->Route('category.index',app()->getLocale())->with('success',translate('Category updated successfully'));
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
