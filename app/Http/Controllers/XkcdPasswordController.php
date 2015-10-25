<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class XkcdPasswordController extends Controller
{
    /** The minimum length of a word to use in the generated password. */
    const MIN_WORD_LENGTH = 2;

    /** The maximum length of a word to use in the generated password. */
    const MAX_WORD_LENGTH = 6;

    /**
     * Displays the form for generating xkcd Passwords.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // return "The form for generating xkcd Passwords.";
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
                "letter_case" => "required|function"
            ]);

        // print request
//        dd($request->all());

        // load words from file 'words'
        $words = $this->loadWords(asset("assets/words"));
//        dd($words);

        // generate an xkcd password using words from the file 'words' and
        // options from the $request object
        $password = $this->generatePassword($words, $request);

        // return "The generated result of xkcd Passwords.";
        return view("xkcd-password.index")->with("password", $password);
    }

    /**
     * Loads words read from $filename into an array and returns the array.
     *
     * @example array($word1, $word2, $word3)
     * @param  string $filename filename to read words from
     * @return array|string
     */
    protected function loadWords($filename)
    {
        $words = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return $words;
    }

    /**
     * Generates an xkcd password from the array $words that meets the criteria
     * specified in $options.
     *
     * @example $password
     * @param  array|string words    array of words to use in generated password
     * @param  array|string $options array of criteria options for password
     * @return string
     */
    protected function generatePassword($words, $options)
    {
        // form the password (words -> digits -> symbols)
        $password = "";

        // append words to the password until the min_words and
        // min_password_length (account for length added by digits and symbols)
        // criteria are met
        $i = 0;
        while ($i < $options["min_words"] ||
               strlen($password) < $options["min_password_length"] -
                                   $options["num_digits"] -
                                   $options["num_symbols"])
        {
            // append a separator if not the first word
            if ($i != 0)
            {
                $password .= $options["separator"];
            }

            // append word
            $password .= $this->generateWord($words, $options);

            // iterate to next word
            $i++;
        }

        // append num_digits digits to the password
        for ($i = 0; $i < $options["num_digits"]; $i++)
        {
            $password .= $this->generateDigit();
        }

        // append num_symbols symbols to the password
        for ($i = 0; $i < $options["num_symbols"]; $i++)
        {
            $password .= $this->generateSymbol();
        }

        return $password;
    }

     /**
      * Selects a random word from the array $words that meets the criteria
      * specified in $options.
      *
      * @example $word
      * @param  array|string words    array of words to selct from
      * @param  array|string $options array of criteria options for word
      * @return string
      */
    protected function generateWord($words, $options)
    {
        $word = "";

        // while criteria is not met, keep selecting random words
        $is_criteria_met = FALSE;
        while (!$is_criteria_met)
        {
            // select a random word from the array $words
            $word = $words[array_rand($words)];

            // check if the word meets the criteria
            $is_criteria_met =
                // check min_word_length
                strlen($word) >= self::MIN_WORD_LENGTH &&
                // check max_word_length
                strlen($word) <= self::MAX_WORD_LENGTH;
        }

        // apply the letter_case function to the word
        $word = $options["letter_case"]($word);

        return $word;
    }

     /**
      * Selects a random digit in the range 0-9.
      *
      * @example 8
      * @return integer
      */
    function generateDigit()
    {
        return rand(0, 9);
    }

     /**
      * Selects a special character symbol.
      *
      * @example 8
      * @return string
      */
    protected function generateSymbol()
    {
        static $symbols = "!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";

        return $symbols[rand(0, strlen($symbols) - 1)];
    }
}
