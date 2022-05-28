<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=> 'Administrador', 'slug'=>'admin'],
            ['name'=> 'Pessoa jurídica', 'slug'=>'cnpj'],
            ['name'=> 'Pessoa física', 'slug'=>'cpf']
        ];
        foreach($data as $item) {
            Permissions::updateOrCreate($item);
        }
    }
}
