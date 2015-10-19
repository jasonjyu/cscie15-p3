<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RandomUserController extends Controller
{
    /**
     * Displays the form for generating Random User data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //return "The form for generating Random User data.";
        return view('random-user.index');
    }

    /**
     * Displays the generated result of Random User data.
     *
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        dd($request->all());
        //
        return "The generated result of Random User data.";
    }
}
