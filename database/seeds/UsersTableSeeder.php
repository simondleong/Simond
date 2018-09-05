<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UsersTableSeeder extends Seeder
{
    protected $arr, $config, $max;
    protected $fields = [
        'city',
        'gender',
        'sexual_preference',
        'personality_type',
        'age'
    ];

    public function __construct() {
        $this->config   = Config::get('constants');
        $this->max      = count($this->fields);
        $this->arr      = [];
        for ($i = 0; $i < count($this->fields); $i++) {
            $this->arr[$this->fields[$i]] = 0;
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->combination(0);
    }

    private function combination($num) {
        if ($num == $this->max) {
            if ($this->config['gender'][$this->arr['gender']] == 'Male') {
                factory(App\Models\User::class, 'male', 50)->create($this->arr)->each(function($u) {
                    $u->preference()->save(factory(App\Models\Preference::class)->make());
                });
            } else if ($this->config['gender'][$this->arr['gender']] == 'Female') {
                factory(App\Models\User::class, 'female', 50)->create($this->arr)->each(function($u) {
                    $u->preference()->save(factory(App\Models\Preference::class)->make());
                });
            } else {
                factory(App\Models\User::class, 50)->create($this->arr)->each(function($u) {
                    $u->preference()->save(factory(App\Models\Preference::class)->make());
                });
            }
        } else {
            $curr   = $this->config[$this->fields[$num]];
            $count  = count($curr);
            for ($j = 0; $j < $count; $j++) {
                $this->arr[$this->fields[$num]] = $j;
                $this->combination($num+1);
            }
        }
    }
}
