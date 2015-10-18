<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller
{
    /**
     * Display the form for generating Lorem Ipsum text.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        //return "The form for generating Lorem Ipsum text.";
        return view('lorem-ipsum.index');
    }

    /**
     * Display the generated result of Lorem Ipsum text.
     *
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        dd($request);
        //
        return "The generated result of Lorem Ipsum text.";
    }
}
