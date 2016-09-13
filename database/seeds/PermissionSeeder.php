<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(App\Models\Permission::class, 3)->create();
        // factory(App\User::class, 3)->create();
    }
}
