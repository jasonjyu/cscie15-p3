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
                "num_users" => "required|numeric|min:1|max:50",
                "locale" => "required|alpha_dash|size:5",
                "data_options" => "array"
            ]);

        // print request
//        dd($request->all());

        // parse request
        $num_users = $request["num_users"];
        $locale = $request["locale"];
        $data_options = $request["data_options"];

        // generate Random User data
        $users = $this->generateUsers($num_users, $locale, $data_options);

        // return "The generated result of Random User data.";
        return view("random-user.index")->with("users", $users);
    }

    /**
     * Generates an array of Random User data.
     *
     * @example array($user1, $user2, $user3)
     * @param  integer $num_users number of users to generate
     * @param  string  $locale language locale of user data to generate
     * @param  array   $data_options user data fields to generate
     * @return array|associative array
     */
    protected function generateUsers($num_users, $locale, $data_options)
    {
        // initialize generated Random User data array
        $users = array();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create($locale);

        // generate $num_users Random User data
        for ($u = 0; $u < $num_users; $u++) {
            // initialize user data associative array
            $user = array();

            // generate user name
            $user["name"] = $faker->name;
            
            // generate optional user data fields
            if (isset($data_options) && is_array($data_options)) {
                if (in_array("address", $data_options)) {
                    $user["address"] = $faker->address;
                }

                if (in_array("phoneNumber", $data_options)) {
                    $user["phoneNumber"] = $faker->phoneNumber;
                }

                if (in_array("email", $data_options)) {
                    $user["email"] = $faker->email;
                }

                if (in_array("birthdate", $data_options)) {
                    // make user's birthdate between 18 and 50 years ago
                    $user["birthdate"] = $faker->dateTimeBetween("-50 years",
                        "-18 years")->format("Y-m-d");
                }
            }

            // add user data
            $users[$u] = $user;
        }

        return $users;
    }
}
