<?php

use App\Models\Translation;
use Illuminate\Support\Facades\App;

function translate($key, $lang = null){
    if($lang == null){
        $lang = App::getLocale();
    }

    $translation_def = Translation::where('lang','en')->where('lang_key', $key)->first();
    if($translation_def == null){
        $translation_def = new Translation();
        $translation_def->lang = 'en';
        $translation_def->lang_key = $key;
        $translation_def->lang_value = $key;
        $translation_def->save();
    }

    //Check for session lang
    $translation_locale = Translation::where('lang_key', $key)->where('lang', $lang)->first();
    if($translation_locale != null && $translation_locale->lang_value != null){
        return $translation_locale->lang_value;
    }
    elseif($translation_def->lang_value != null){
        return $translation_def->lang_value;
    }
    else{
        return $key;
    }
}