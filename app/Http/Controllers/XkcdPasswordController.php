<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class XkcdPasswordController extends Controller
{
    /**
     * Displays the form for generating xkcd Passwords.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //return "The form for generating xkcd Passwords.";
        return view('xkcd-password.index');
    }

    /**
     * Displays the generated result of xkcd Passwords.
     *
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        dd($request->all());
        //
        return "The generated result of xkcd Passwords.";
    }
}
