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
        // validate request
        $this->validate(
            $request,
            [
                "min_words" => "required|numeric|min:2|max:9",
                "num_digits" => "required|numeric|min:0|max:3",
                "num_symbols" => "required|numeric|min:0|max:3",
                "min_password_length" => "required|numeric|min:8|max:32",
                "separator" => "string|min:0|max:1",
                "letter_case" => "required|alpha_dash"
            ]);

        // print request
//        dd($request->all());

        return "The generated result of xkcd Passwords.";
    }
}
