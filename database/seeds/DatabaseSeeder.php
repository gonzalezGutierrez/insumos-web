<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DepartamentoSeeder::class,
            //ProductSeeder::class,
            UserTableSeed::class
        ]);

        /*factory(\App\Models\Departament::class)->times(30)->create();
        factory(\App\Models\Product::class)->times(100)->create();
        factory(\App\Models\Entrega::class)->times(30)->create();
        factory(\App\Models\ProductoEntrega::class)->times(400)->create();*/


    }
}
