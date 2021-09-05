<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    public function index()
    {
       

        Gate::authorize('Admin');
        $languages = Language::all();
        $default_lang = Businesssetting::where('name', 'default_language')->first();
        return view('managment.languages.index', compact('languages', 'default_lang'));
    }
    public function update_default(Request $request)
    {
        Gate::authorize('Admin');
        Businesssetting::where('name', 'default_language')->first()->update([
            'value' => $request->value,
        ]);
        return back()->with('success', 'the default language is updated');
    }
    public function language_edit($language,$id)
    {
        Gate::authorize('Admin');
        $language = Language::find(decrypt($id));
        $words = Translation::orderBy('updated_at', 'asc')->where('lang', $language->key)->paginate(20);
        return view('managment.languages.edit', compact('language', 'words'));
    }

    public function language_changer($language,$key)
    {
        $url = url()->previous();
        $route = collect(\Route::getRoutes())->first(function ($route) use ($url) {
            return $route->matches(request()->create($url));
        });
        App::setlocale($key);
        $cookie = Cookie::make('user_lang', $key, 60 * 24 * 365);
        if(\Route::has($route->getAction()['as'])){
           
            return redirect()->route($route->getAction()['as'], app()->getLocale())->cookie($cookie);
        }else{
            return redirect()->route('home', app()->getLocale())->cookie($cookie);

        }
    }
}
