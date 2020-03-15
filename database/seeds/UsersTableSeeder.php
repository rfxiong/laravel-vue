<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = factory(App\User::class,30)->create();
        $user =$user[0];
        $user->name = '熊瑞峰';
        $user->email ='xrf@gdhfny.com';
        $user->save();
    }
}
