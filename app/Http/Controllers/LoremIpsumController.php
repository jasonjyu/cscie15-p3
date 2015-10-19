<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller
{
    /**
     * Displays the form for generating Lorem Ipsum text.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // return "The form for generating Lorem Ipsum text.";
        return view("lorem-ipsum.index");
    }

    /**
     * Displays the generated result of Lorem Ipsum text.
     *
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        // validate request
        $this->validate(
            $request,
            [
                "num_paragraphs" => "required|numeric|min:1|max:99",
                "num_sentences" => "required|numeric|min:1|max:99",
                "num_words" => "required|numeric|min:1|max:99"
            ]);

        // print request
//        dd($request->all());

        // parse request
        $num_paragraphs = $request["num_paragraphs"];
        $num_sentences = $request["num_sentences"];
        $num_words = $request["num_words"];

        // generate Lorem Ipsum text
        $text = $this->generateText($num_paragraphs,
            $num_sentences,
            $num_words);

        // return "The generated result of Lorem Ipsum text.";
        return view("lorem-ipsum.index")->with("text", $text);
    }

    /**
     * Generates an array of Lorem Ipsum text paragraphs.
     *
     * @example array($paragraph1, $paragraph2, $paragraph3)
     * @param  integer $num_paragraphs number of paragraphs to generate
     * @param  integer $num_sentences  number of sentences to generate per
     *                                 paragraph
     * @param  integer $num_words      number of words to generate per sentence
     * @return array|string
     */
    protected function generateText($num_paragraphs, $num_sentences, $num_words)
    {
        // initialize generated Lorem Ipsum text array
        $text = array();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        // generate $num_paragraphs paragraphs
        for ($p = 0; $p < $num_paragraphs; $p++) {
            // initialize paragraph string
            $text[$p] = "";

            // generate $num_sentences sentences for each paragraph
            for ($s = 0; $s < $num_sentences; $s++) {
                // generate $num_words words per sentence
                $text[$p] .= $faker->sentence($num_words, false) . " ";
            }
        }
        // $text = $faker->paragraphs($num_paragraphs);

        return $text;
    }
}
