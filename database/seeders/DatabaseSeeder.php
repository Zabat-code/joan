<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\InsuranceModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        UserModel::factory()->create([
            'name' => 'Adalberto turby',
            'email' => 'adalbertoturby@gmail.com',
            'password' =>   Hash::make('123'),
        ]);

         $insurances = [
            ['name' => 'SENASA', 'state' => 1],
            ['name' => 'Primera ARS Humano', 'state' => 1],
            ['name' => 'ARS Universal', 'state' => 1],
            ['name' => 'MAPFRE Salud ARS', 'state' => 1],
            ['name' => 'ARS Monumental', 'state' => 1],
            ['name' => 'ARS Futuro', 'state' => 1],
            ['name' => 'ARS Renacer', 'state' => 1],
            ['name' => 'ARS Reservas', 'state' => 1],
            ['name' => 'ARS SEMMA', 'state' => 1],
            ['name' => 'ARS APS', 'state' => 1],
            ['name' => 'ARS CMD (Colegio Médico Dominicano)', 'state' => 1],
            ['name' => 'ARS Meta-Salud SINATRAE', 'state' => 1],
            ['name' => 'ARS Dr. Yunen', 'state' => 1],
            ['name' => 'ARS Simag', 'state' => 1],
            ['name' => 'Grupo Médico Asociado (GMA)', 'state' => 1],
        ];

        foreach ($insurances as $insurance) {
            InsuranceModel::create($insurance);
        }
    }
}
