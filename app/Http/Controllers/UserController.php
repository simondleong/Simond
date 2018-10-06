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
    protected $city, $gender, $sexual_preference, $personality_type, $age, $date_status;

    /*
     * Constructor
     */
    public function __construct(User $user) {
        $config = Config::get('constants');
        $this->city = $config['city'];
        $this->gender = $config['gender'];
        $this->sexual_preference = $config['sexual_preference'];
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
            'city' => $this->city,
            'gender' => $this->gender,
            'sexual_preference' => $this->sexual_preference,
            'personality_type' => $this->personality_type,
            'age' => $this->age
        ]);
    }


    /*
     * Returns profile form with data from constants
     */
    public function showProfileForm() {
        return view('editProfile')->with('data', [
            'city' => $this->city,
            'gender' => $this->gender,
            'sexual_preference' => $this->sexual_preference,
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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
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
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
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
            if ($e->getCode() == Config::get('constants.duplicate_email')) {
                session()->flash('flash_error', 'Email has been used. Please use another email.');
            } else {
                session()->flash('flash_error', 'Registration Failed. Please contact our hotline if error persists.');
            }
            return back();
        }

        session()->put('user', $user);

        session()->flash('flash_success', 'You have successfully registered. Please enter your preferences.');

        return redirect('/preferences');
    }

    /*
     * Processes Login Request
     */
    public function login(Request $request) {

        // make validator
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        // validate input
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('email'));
        }

        // get user data
        $user = $this->attempt($request->email);

        if ($user) {
            // compare password
            if (Hash::check($request->password, $user->password)) {
                if (Hash::needsRehash($user->password)) {
                    $user->password = $this->hash($request->password);
                    $user = $this->update($user);
                }

                session()->put('user', $user);

                if ($user->preference) {
                    return redirect('/');
                }

                session()->flash('flash_success', 'Please enter your preferences.');
                return redirect('/preferences');
            }

            session()->flash('flash_error', 'Incorrect Email/Password');
            return redirect()->back()->withInput($request->only('email'));
        }

        session()->flash('flash_error', 'User not found');
        return redirect()->back();
    }

    /*
     * Update user's password
     */
    public function updatePassword(Request $request) {
        $user = session()->get('user');
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
        $confirmPassword = $request->confirm_password;

        if (Hash::check($oldPassword, $user->password)) {
            if ($newPassword == $confirmPassword) {
                $user->password = $this->hash($newPassword);
                $user = $this->update($user);

                session()->put('user', $user);

                return redirect()->back()->with('flash_success', 'Your password has been updated!');
            }

            return redirect()->back()->with('flash_error', 'New and Confirm Password Do Not Match!');
        }

        return redirect()->back()->with('flash_error', 'Invalid old password');
    }

    /*
     * Update User's Profile
     */
    public function updateProfile(Request $request) {
        $user = session()->get('user');

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required|numeric',
            'sexual_preference' => 'required|numeric',
            'personality_type' => 'required|numeric',
            'age' => 'required|numeric',
            'city' => 'required|numeric'
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->sexual_preference = $request->sexual_preference;
        $user->personality_type = $request->personality_type;
        $user->age = $request->age;
        $user->city = $request->city;

        $user = $this->update($user);

        session()->put('user', $user);

        return redirect()->back()->with('flash_success', 'Your profile has been updated!');
    }

    /*
     * Logs out and clears session
     */
    public function logout() {
        session()->flush();

        return redirect('/');
    }

    /*
     * Hash password
     */
    private function hash($password) {
        return Hash::make($password);
    }

    /*
     * Attempt to find user data
     */
    private function attempt($email) {
        $user = $this->user->where('email', '=', $email)->first();

        return $user;
    }

    /*
     * Update user
     */
    private function update($user) {
        $user->save();

        return $user;
    }
}
