<?php

namespace App\Http\Controllers;

class LocateController extends Controller
{
   
    public function locate($locale){
        if (!in_array($locale, ['en', 'vi'])) {
            abort(400);
        }
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
// session()->put('locale', $locale);
//   return view('register', compact('city'));
