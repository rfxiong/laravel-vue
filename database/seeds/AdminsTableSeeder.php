<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\Admin\Admin::class,30)->create();
        $user =$user[0];
        $user->name = 'rfxiong';
        $user->email ='rfxiong@126.com';
        $user->save();
        Spatie\Permission\Models\Role::create([
            'title' => '管理员',
            'name' => 'admin',
            'guard_name' => 'admin'
        ]);
        $user->assignRole('admin');

    }
}
