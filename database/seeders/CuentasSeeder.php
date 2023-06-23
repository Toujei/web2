<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
           // ['user' => 'Toueji', 'password' => Hash::make('1234'),'nombre' => 'Nicolas', 'apellido' => 'Ojeda', 'perfil_id'=>1],
            ['user' => 'Jordano', 'password' => Hash::make('5678'),'nombre' => 'Jordan', 'apellido' => '23', 'perfil_id'=>1],

        ]);
    }
}
