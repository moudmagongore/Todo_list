<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $admin = User::create([
        	'name' => 'Administrateur',
        	'email' => 'administrateur@gmail.com',
        	'password' => Hash::make('00000000')
        ]);

        //On recuperer les roles dans la table roles
        $adminRole = Role::where('nom', 'Administrateur')->first();

        //on attache les roles à nos utilisateur créer en hauts
        $admin->roles()->attach($adminRole);
    }
}
