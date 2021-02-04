<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        for ($i=0; $i < 300; $i++) { 
        	Role::create([
	        	"code" 			=> 	"arro6s5z{$i}",
	        	"name" 			=> 	"Root{$i}",
	        	"display_name" 	=> 	"Administrador{$i}",
	        	"url" 			=> 	"root{$i}",
	        	"note" 			=> 	"Administrador de todo el sitio web con privilegios de super usuario",
	        	"note" 			=> 	"N/A",
	        ]);
        }
    }
}
