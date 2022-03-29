<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name'=> 'Administrador',
            'email'=> 'administracao.curriculos@gmail.com',
            'password' => Hash::make('curriculos@2022'),
            'permission_id'=> 1
        ]);
    }
}
