<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class MarketingController extends Controller
{
    public function index(){
        if( !in_array( "Admin", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        /* top barr annonce */
        $disktop_top_annonce = Businesssetting::where('name','disktop_top_annonce')->first();
        $tablet_top_annonce = Businesssetting::where('name','tablet_top_annonce')->first();
        $phone_top_annonce = Businesssetting::where('name','phone_top_annonce')->first();

        /* sliders */
        $sliders= Slider::all();

        return view('managment.marketing.index',compact('disktop_top_annonce','tablet_top_annonce','phone_top_annonce','sliders'));
    }
    public function set_top_annonces(Request $request){
        if( !in_array( "Admin", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'value'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required'
        ]);
        $setting=Businesssetting::where('name',$request->name)->first();
        
        $filePath=$request->old_image;
        if($request->value != null){
            $fileName = time() .'top_barr'. '.' . $request['value']->guessExtension();
            $filePath = $request->file('value')->storeAs('top_anonces_barrs', $fileName, 'public');
        }

        $from=null;
        if($request->from != null){
           $from=$request->from;
        }

        $to=null;
        if($request->to != null){
           $to=$request->to;
        }
        $link=null;
        if($request->link != null){
           $link=$request->link;
        }

        $setting->update([
            'value'=>$filePath,
            'from'=>$from,
            'to'=>$to,
            'link'=>$link,
        ]);

        return back()->with('success','well done');
    }
    public function create_new_slider(Request $request){
        if( !in_array( "Admin", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'picture_pc'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'=>'required',
        ]);

        $fileName = time() .'laptop_path'. '.' . $request['picture_pc']->guessExtension();
        $laptop_path = $request->file('picture_pc')->storeAs('sliders_pc', $fileName, 'public');

        /* resize the slider image if not with recomanded size */
        $data=getimagesize('storage/'.$laptop_path);
        if($data[0] != 712 || $data[1] != 384){
            $img = Image::make('storage/'.$laptop_path);
            $img->resize(712,384)->save('storage/'.$laptop_path,100);
        }

        $slider= new Slider();
        $slider->create([
            'laptop_path'=>$laptop_path,
            'link'=>$request->link,
            'click_counter'=>0,
        ]);
        return redirect()->route('marketing.index')->with('success','le curseur est créé avec succès');
    }
    public function update_slider(Request $request){
        if( !in_array( "Admin", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }

        $slider= Slider::find($request->slider_id);

        $link=$request->link;
        
        $laptop_path=$request->old_picture_pc;
        if($request->picture_pc != null){
            $fileName = time() .'laptop_path'. '.' . $request['picture_pc']->guessExtension();
            $laptop_path = $request->file('picture_pc')->storeAs('sliders_pc', $fileName, 'public');
            $data=getimagesize('storage/'.$laptop_path);
            if($data[0] != 712 || $data[1] != 384){
                $img = Image::make('storage/'.$laptop_path);
                $img->resize(712,384)->save('storage/'.$laptop_path,100);
            }
        }

        $slider->update([
            'laptop_path'=>$laptop_path,
            'link'=>$link,
        ]);   
        return redirect()->route('marketing.index')->with('success','le curseur est met à jour');
     
    }
}
