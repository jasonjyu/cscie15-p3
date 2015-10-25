<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller
{
    /** The locale code for Latin. */
    const LATIN_LOCALE = "la_LA";

    /** An array of punctuations for the locale code zh_TW. */
    protected static $zhTwPunct = array('、', '。', '」', '』', '！', '？', 'ー',
        '，', '：', '；');

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
                "num_paragraphs" => "required|numeric|min:1|max:50",
                "num_sentences" => "required|numeric|min:1|max:50",
                "locale" => "required|alpha_dash|size:5"
            ]);

        // print request
//        dd($request->all());

        // parse request
        $num_paragraphs = $request["num_paragraphs"];
        $num_sentences = $request["num_sentences"];
        $locale = $request["locale"];

        // generate Lorem Ipsum or random text depending on the locale code
        $text = $this->generateText($num_paragraphs, $num_sentences, $locale);

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
     * @param  string  $locale         language locale of text to generate
     * @return array|string
     */
    protected function generateText($num_paragraphs, $num_sentences,
        $locale = self::LATIN_LOCALE)
    {
        // initialize generated Lorem Ipsum text array
        $text = array();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create($locale);

        // generate $num_paragraphs paragraphs
        for ($p = 0; $p < $num_paragraphs; $p++) {
            // initialize paragraph string
            $text[$p] = "";

            // generate $num_sentences sentences for each paragraph
            for ($s = 0; $s < $num_sentences; $s++) {
                // if the locale code is Latin, then generate Lorem Ipsum text
                if ($locale == self::LATIN_LOCALE) {
                    $text[$p] .= $faker->sentence() . " ";
                // otherwise, generate random text of the language locale
                } else {
                    $rand_text = $faker->realText(50, 1);

                    // remove all punctuation except for the last one
                    if ($locale == "zh_TW") {
                        $rand_text = trim(str_replace(static::$zhTwPunct, "  ",
                            $rand_text)) . "。";
                    } else {
                        $rand_text = preg_replace("/\p{P}/u", "",
                            substr($rand_text, 0, -1)) . substr($rand_text, -1);
                    }

                    $text[$p] .= $rand_text . " ";
                }
            }
        }

        return $text;
    }
}
