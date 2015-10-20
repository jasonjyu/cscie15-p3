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
        // return "The form for generating Random User data.";
        return view("random-user.index");
    }

    /**
     * Displays the generated result of Random User data.
     *
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        // validate request
        $this->validate(
            $request,
            [
                "num_users" => "required|numeric|min:1|max:50"
            ]);

        // print request
//        dd($request->all());

        // parse request
        $num_users = $request["num_users"];

        // generate Random User data
        $users = $this->generateUsers($num_users);

        // return "The generated result of Random User data.";
        return view("random-user.index")->with("users", $users);
    }

    /**
     * Generates an array of Random User data.
     *
     * @example array($user1, $user2, $user3)
     * @param  integer $num_users number of users to generate
     * @return array|string
     */
    protected function generateUsers($num_users)
    {
        // initialize generated Random User data array
        $users = array();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        // generate $num_users Random User data
        for ($u = 0; $u < $num_users; $u++) {
            $users[$u] = $faker->name;
        }

        return $users;
    }
}
