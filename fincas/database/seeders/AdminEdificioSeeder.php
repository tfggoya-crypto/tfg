<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Edificio;

class AdminEdificioSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();
        $edificios = Edificio::all();

        foreach ($edificios as $edificio) {
            $admin->edificiosAdmin()->attach($edificio->id);
        }
    }
}