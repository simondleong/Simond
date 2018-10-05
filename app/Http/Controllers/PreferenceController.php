<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Preference;

class PreferenceController extends Controller
{
    protected $preference, $user;    // dependency injection
    protected $config, $city, $gender, $sexual_preference, $personality_type, $age,
                $importance, $importance_value, $date_status;

    /*
     * Constructor
     */
    public function __construct(User $user, Preference $preference) {
        $config = Config::get('constants');
        $this->city = $config['city'];
        $this->gender = $config['gender'];
        $this->sexual_preference = $config['sexual_preference'];
        $this->personality_type = $config['personality_type'];
        $this->age = $config['age'];
        $this->date_status = $config['date_status'];
        $this->importance = $config['importance'];
        $this->importance_value = $config['importance_value'];

        $this->user = $user;
        $this->preference = $preference;
    }


    /*
     * Returns preferences form with data from constants
     */
    public function showPreferencesForm() {
        return view('preferences')->with('data', [
            'gender'            => $this->gender,
            'sexual_preference' => $this->sexual_preference,
            'personality_type'  => $this->personality_type,
            'age'               => $this->age,
            'city'              => $this->city,
            'importance'        => $this->importance,
            'imp_value'         => $this->importance_value
        ]);
    }


    /*
     * Handles Preference update
     */
    public function update(Request $request) {
        $user = session()->get('user');



        $this->validate($request, [
            'gender'            => 'required|integer',
            'sexual_preference' => 'required|integer',
            'personality_type'  => 'required|integer',
            'age'               => 'required|integer',
            'city'              => 'required|integer',
            'gender_weight'     => 'required|integer',
            'sexual_weight'     => 'required|integer',
            'personality_weight'=> 'required|integer',
            'age_weight'        => 'required|integer',
            'city_weight'       => 'required|integer',
        ]);

        if ($user->preference) {
            // update existing

            $preference = $user->preference;
            $preference = $this->setAttributes($preference, $request);

            $preference = $preference->save();
        } else {
            // insert new data

            $preference = $this->createInstance($user, $request);

            $preference = $preference->save();
        }

        $this->updateUserInfo($user);
        return redirect()->back()->with('flash_success', 'Your preferences have been updated!');
    }


    /*
     * create instance of 'preference'
     */
    private function createInstance($user, $request) {
        $preference = new Preference();

        $preference->user_id = $user->id;
        $preference = $this->setAttributes($preference, $request);

        return $preference;
    }


    /*
     *
     */
    private function setAttributes($preference, $request) {
        $preference->gender             = $request->gender;
        $preference->gender_weight      = $request->gender_weight;
        $preference->sexual_preference  = $request->sexual_preference;
        $preference->sexual_weight      = $request->sexual_weight;
        $preference->personality_type   = $request->personality_type;
        $preference->personality_weight = $request->personality_weight;
        $preference->age                = $request->age;
        $preference->age_weight         = $request->age_weight;
        $preference->city               = $request->city;
        $preference->city_weight        = $request->city_weight;

        return $preference;
    }


    /*
     * replace user info in session with new one
     */
    private function updateUserInfo($user) {
        $user   = $this->user->find($user->id);
        session()->put('user', $user);
    }
}
