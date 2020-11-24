<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $administrator = new \App\User;
        $administrator->name = "admin";
        $administrator->email = "admin@admin";
        $administrator->password = \Hash::make("12345678");

        $administrator->save();
        $administrator->assignRole('admin');
        $this->command->info("User Admin berhasil diinsert");
    }
}
