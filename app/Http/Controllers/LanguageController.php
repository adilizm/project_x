<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class LanguageController extends Controller
{
    public function index(){
        Gate::authorize('Admin');
        $languages=Language::all();
        $default_lang=Businesssetting::where('name','default_language')->first();
        return view('managment.languages.index',compact('languages','default_lang'));
    }
    public function update_default(Request $request){
        Gate::authorize('Admin');
        Businesssetting::where('name','default_language')->first()->update([
            'value' => $request->value,
        ]);
        return back()->with('success','the default language is updated');
    }
    public function language_edit($id){
        Gate::authorize('Admin');
        $language = Language::find(decrypt($id));
        $words = Translation::orderBy('updated_at', 'asc')->where('lang_key',$language->key)->paginate(20);
        return view('managment.languages.edit',compact('language','words'));
    }
}
