<?php

namespace App\Http\Controllers;

use Arcanedev\Localization\Entities\Locale;
use Arcanedev\Localization\Facades\Localization;
use App\Locale as LocaleModel;

class LocalizationController
{

    public function index()
    {
        return view('locale.index')->with('locales', LocaleModel::all());
    }

    public function create()
    {
        return view('locale.create')->with('locales', Localization::getAllLocales()->all());
    }

    public function store()
    {
        $locale = new LocaleModel();
        $locale->fill(request()->only($locale->getFillable()))->save();
    }

    public function upload()
    {
        $files = request()->file();
        
        foreach($files as $region => $fileSet) {
            $po = $fileSet['po'];
            $mo = $fileSet['mo'];

            $po->storeAs($region . '/LC_MESSAGES', 'messages.po', 'lang');
            $mo->storeAs($region . '/LC_MESSAGES', 'messages.mo', 'lang');
        }
        dd('stop');
        
    }
    
    public function getPotFile()
    {
        $file = \Illuminate\Support\Facades\Storage::disk('lang')->url('en_US/LC_MESSAGES/messages.pot');


        return response()->download($file);
    }
    // enable/disable locales
    // download pot file
    // upload po/mo files to correct locales
    // show locales without translations
}
