<?php

namespace App\Http\Controllers;

use App\Models\Autorisation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !in_array( "role.index", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $roles=[];
        $rolestemp=Role::All();
        foreach($rolestemp as $role){
            $number_user_with_that_role= User::where('role_id',$role->id)->count();
            $role['number_user_with_that_role']=$number_user_with_that_role;
             array_push($roles,$role);
        }
        
        return view('managment.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !in_array( "role.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $auths=[];
        $autorisation_parents= Autorisation::where('is_parent','1')->get();
            foreach($autorisation_parents as $auth_parent){
                $auth_childs= Autorisation::where('parent_id',$auth_parent->id)->get();
                $auth_parent['childs']=$auth_childs;
                array_push($auths,$auth_parent);
            }           
        return view('managment.role.create',compact('auths') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !in_array( "role.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $role= new Role();
        $role->name= $request->name;
        $permitions= [];
        foreach($request->permissions as $permition){
            array_push($permitions,$permition);
        }
        $role->permissions=json_encode($permitions);
        $role->save();
        return redirect()->Route('roles.index')->with('success','le Role: <strong>'.$role->name.'</strong> a été enregistré !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        if( !in_array( "role.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $role=Role::find(decrypt($id));
        $auths=[];
        $autorisation_parents= Autorisation::where('is_parent','1')->get();
            foreach($autorisation_parents as $auth_parent){
                $auth_childs= Autorisation::where('parent_id',$auth_parent->id)->get();
                $auth_parent['childs']=$auth_childs;
                array_push($auths,$auth_parent);
            }   
        return view('managment.role.edit',compact('role','auths'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if( !in_array( "role.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $role=Role::find(decrypt($id));
        $role->name= $request->name;
        $permitions= [];
        if( $request->permissions!= null){
            foreach($request->permissions as $permition){
                array_push($permitions,$permition);
            }
        } 
        $role->permissions=json_encode($permitions);
        $role->save();
        return redirect()->Route('roles.index')->with('success','le Role: <strong>'.$role->name.'</strong> a été modifier!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !in_array( "role.destroy", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $role=Role::find(decrypt($id));

        $users_with_role= User::where('role_id',$role->id)->get();
        foreach($users_with_role as $user){
            $user->update(['role_id'=>5]);            
        }
        $role->destroy($role->id);
        return  redirect()->route('roles.index')->with('success','le Role: <strong>'.$role->name.'</strong> est supprimer!');
    }
}
