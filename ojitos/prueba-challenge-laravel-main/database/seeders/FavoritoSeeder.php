<?php

namespace Database\Seeders;

use App\Models\Favorito;
use Illuminate\Database\Seeder;

class FavoritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorito::factory(150)->create();
    }
}
