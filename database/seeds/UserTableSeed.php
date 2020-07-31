<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Pablo Sanchez';
        $user->email = 'pablosanchez.pasa@gmail.com';
        $user->password = 'bio_2020';
        $user->save();
    }
}
