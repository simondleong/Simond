<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    protected $user;    // dependency injection
    protected $config, $cities, $gender, $sexual_preferences, $personality_type, $age, $date_status;

    /*
     * Constructor
     */
    public function __construct(User $user) {
        $config = Config::get('constants');
        $this->cities = $config['cities'];
        $this->gender = $config['gender'];
        $this->sexual_preferences = $config['sexual_preferences'];
        $this->personality_type = $config['personality_type'];
        $this->age = $config['age'];
        $this->date_status = $config['date_status'];

        $this->user = $user;
    }

    /*
     * Returns registration form with data from constants
     */
    public function showRegisterForm() {
        return view('register')->with('data', [
            'cities' => $this->cities,
            'gender' => $this->gender,
            'sexual_preferences' => $this->sexual_preferences,
            'personality_type' => $this->personality_type,
            'age' => $this->age
        ]);
    }

    /*
     * Returns profile form with data from constants
     */
    public function showProfileForm() {
        return view('editProfile')->with('data', [
            'cities' => $this->cities,
            'gender' => $this->gender,
            'sexual_preferences' => $this->sexual_preferences,
            'personality_type' => $this->personality_type,
            'age' => $this->age
        ]);
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

    /*
     * Processes registration
     */
    public function register(Request $request) {
        $pw = $request->password;
        $cpw = $request->confirm_password;

        if ($pw != $cpw) {
            return redirect()->back()->with('flash_error', 'Password and Repeat Password do not match!');
        }

        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required|numeric',
            'sexual_preference' => 'required|numeric',
            'personality_type' => 'required|numeric',
            'age' => 'required|numeric',
            'city' => 'required|numeric'
        ]);

        $user = [
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "gender" => $request->gender,
            "sexual_preference" => $request->sexual_preference,
            "personality_type" => $request->personality_type,
            "age" => $request->age,
            "city" => $request->city
        ];

        try {
            $user = $this->user->create($user);
        } catch (QueryException $e) {
            session()->flash('flash_error', 'Registration Failed. Please contact our hotline if error persists.');
            return back();
        }

        session()->put('user', $user);

        return view('homepage');
    }
}
