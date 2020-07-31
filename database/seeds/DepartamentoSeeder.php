<?php

use Illuminate\Database\Seeder;
use App\Models\Departament;
class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create([
            'area'=>'UCIN',
            'responsable'=>'Daniel Mendoza'
        ]);

        Departament::create([
            'area'=>'UTIP',
            'responsable'=>'Daniel Mendoza'
        ]);

        Departament::create([
            'area'=>'UTIN',
            'responsable'=>'Daniel Mendoza'
        ]);

        Departament::create([
            'area'=>'Quirófano',
            'responsable'=>'Daniel Mendoza'
        ]);
    }
}
