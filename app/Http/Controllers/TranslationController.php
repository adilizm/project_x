<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function update(Request $request){
        $counter=0;
        foreach($request->keys as $key){
            $translation = Translation::where('lang',$request->lang_key)->where('lang_key',$key)->first();
            $translation->update([
                'lang_value'=>$request->words[$counter],
            ]);
            $counter++;
        }
        return back()->with('success',translate('the traduction is updated successfuly'));
    }
}
