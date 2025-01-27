<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name'=> 'Administrador', 'slug'=>'admin'],
            ['name'=> 'Pessoa jurídica', 'slug'=>'cnpj'],
            ['name'=> 'Pessoa física', 'slug'=>'cpf']
        ];
        foreach($data as $item) {
            Permission::updateOrCreate($item);
        }
    }
}
