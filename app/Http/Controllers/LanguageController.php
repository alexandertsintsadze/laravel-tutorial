<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function update(Request $request) {
        App::setLocale($request->lang);
        Session::put('locale', $request->lang);

        return redirect()->back();
    }
}
