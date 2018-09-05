<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Support\Collection as Clt;

class MatchController extends Controller
{
    protected $user;
    protected $config, $city, $gender, $sexual_preference, $personality_type, $age, $date_status;
    protected $questions = [
        'personality_type',
        'age',
        'city'
    ];
    protected $weight = [
        'personality_weight',
        'age_weight',
        'city_weight'
    ];
    protected $borderline = 50;
    protected $totalQuestions = 3;

    /*
     * constructor
     */
    public function __construct(User $user) {
        $this->user = $user;

        $this->config = Config::get('constants');
        $this->city = $this->config['city'];
        $this->gender = $this->config['gender'];
        $this->sexual_preference = $this->config['sexual_preference'];
        $this->personality_type = $this->config['personality_type'];
        $this->age = $this->config['age'];
        $this->date_status = $this->config['date_status'];
    }


    /*
     * Finds Matches
     */
    public function findMatch(Request $request) {
        $user       = session()->get('user');
        $users      = $this->getUsers($user);

        $currArr    = [];
        foreach($users as $u) {
            $percentage = $this->calculate($user, $u);
            if ($percentage > $this->borderline) {
                $curr = $u;
                $curr->setAttribute('percentage', $percentage);
                array_push($currArr, $curr);
            }
        }
        $unsorted   = collect($currArr);
        $sorted     = $unsorted->sortByDesc(function ($item, $key) {
            return $item->percentage;
        })->all();

        $matches    = (new Clt($sorted))->paginate(12);

        return view('match')->with('matches', $matches)->with('gender', $this->gender);
    }


    /*
     * Sort by percentage
     */
    public function sort_by_percentage($a, $b) {
        if ($a->percentage == $b->percentage) { return 0; }
        return ($a->percentage < $b->percentage) ? -1 : 1;
    }


    /*
     * Calculates percentage
     */
    private function calculate($user, $curr) {
        $userCounter = 0;
        $currCounter = 0;
        $userDenominator = ($user->preference->personality_weight + $user->preference->age_weight +
                            $user->preference->city_weight);
        $currDenominator = ($curr->preference->personality_weight + $curr->preference->age_weight +
                            $curr->preference->city_weight);

        // calculate user
        if ($user->preference->personality_type == $curr->personality_type)
            $userCounter += $user->preference->personality_weight;
        if ($user->preference->age == $curr->age)
            $userCounter += $user->preference->age_weight;
        if ($user->preference->city == $curr->city)
            $userCounter += $user->preference->city_weight;

        // calculate curr
        if ($curr->preference->personality_type == $user->personality_type)
            $currCounter += $curr->preference->personality_weight;
        if ($curr->preference->age == $user->age)
            $currCounter += $curr->preference->age_weight;
        if ($curr->preference->city == $user->city)
            $currCounter += $curr->preference->city_weight;

        if (($userCounter == 0) || ($currCounter == 0)) {
            return 0;
        }

        $userScore = $currScore = 1;
        if ($userDenominator > 0)
            $userScore = $userCounter / $userDenominator;
        if ($currDenominator > 0)
            $currScore = $currCounter / $currDenominator;

        return round(pow($userScore * $currScore, 1/$this->totalQuestions)*100);
    }


    /*
     * Return users based on sexual preference and gender
     */
    private function getUsers($user) {
        if ($user->sexual_preference == $this->config['Homosexual']) {
            return $this->user->where('gender', $user->gender)
                                ->where('sexual_preference', '!=', $this->config['Straight'])->get();
        }
        if ($user->sexual_preference == $this->config['Straight']) {
            $opposite = ($user->gender + 1) % 2;
            return $this->user->where('gender', '=', $opposite)
                                ->where('sexual_preference', '!=', $this->config['Homosexual'])->get();
        }
        // where not (same sex and straight)
        $opposite   = ($user->gender + 1) % 2;

        return $this->user
                    ->whereRaw('NOT (gender = ' . $user->gender . ' AND sexual_preference = ' .
                                    $this->config['Straight'] . ')')
                    ->whereRaw('NOT (gender = ' . $opposite . ' AND sexual_preference = '.
                                    $this->config['Homosexual'].')')
                    ->get();
    }
}
