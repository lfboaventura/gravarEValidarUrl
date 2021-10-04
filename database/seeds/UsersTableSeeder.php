<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'email'             => 'lucio.finan@gmail.com',
            ],
            [
                'name'              => 'Lúcio Flávio Boaventura',
                'password'          => bcrypt('123456'),
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
        
            ]
        );
    }
}
