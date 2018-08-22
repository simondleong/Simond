<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Preference;

class PreferenceController extends Controller
{
    protected $preference, $user;    // dependency injection
    protected $config, $cities, $gender, $sexual_preferences, $personality_type, $age, $date_status;

    /*
     * Constructor
     */
    public function __construct(User $user, Preference $preference) {
        $config = Config::get('constants');
        $this->cities = $config['cities'];
        $this->gender = $config['gender'];
        $this->sexual_preferences = $config['sexual_preferences'];
        $this->personality_type = $config['personality_type'];
        $this->age = $config['age'];
        $this->date_status = $config['date_status'];

        $this->user = $user;
        $this->preference = $preference;
    }

    /*
     * Returns preferences form with data from constants
     */
    public function showPreferencesForm() {
        return view('preferences')->with('data', [
            'personality_type' => $this->personality_type,
            'age' => $this->age
        ]);
    }

    public function update(Request $request) {
        $user = session()->get('user');

        if ($user->preference) {
            // update existing

            $preference = $user->preference;

            $preference->personality_type = $request->personality_type;
            $preference->age = $request->age;

            $preference->save();
            session()->put('preference', $preference);
        } else {
            // insert new data

            $preference = [
                'user_id' => $user->id,
                'personality_type' => $request->personality_type,
                'age' => $request->age
            ];

            $preference = $this->preference->create($preference);
            session()->put('preference', $preference);
        }

        return redirect()->back()->with('flash_success', 'Your preferences have been updated!');
    }
}
