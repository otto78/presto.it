<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $categories=[
            0=>['Veicoli'],
            1=>['Immobili'],
            2=>['Elettrodomestici'],
            3=>['Elettronica'],
            4=>['Sport'],
            5=>['Attrezzatura da lavoro'],
            6=>['Libri e riviste'],
            7=>['Strumenti musicali'],
            8=>['Giardinaggio'],
            9=>['Videogiochi e console'],

        ];
        
        foreach($categories as $category){

            DB::table('categories')->insert([
                'category'=> $category[0]

            ]);
        }
    
    }
}
