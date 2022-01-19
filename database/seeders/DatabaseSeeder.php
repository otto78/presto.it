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
            0=>['Veicoli', '/img/img-cat/Veicoli.png'],
            1=>['Immobili', '/img/img-cat/Immobili.png'],
            2=>['Elettrodomestici', '/img/img-cat/elettrodomestici.png'],
            3=>['Elettronica','/img/img-cat/elettronica.png'],
            4=>['Sport', '/img/img-cat/Sport.png'],
            5=>['Attrezzatura da lavoro', '/img/img-cat/Strumenti-da-lavoro.png'],
            6=>['Libri e riviste', '/img/img-cat/libri-e-riviste.png'],
            7=>['Strumenti musicali', '/img/img-cat/Strumenti-musicali.png'],
            8=>['Giardinaggio', '/img/img-cat/Giordinaggio.png'],
            9=>['Videogiochi e console', '/img/img-cat/Videogiochi.png'],

        ];
        
        foreach($categories as $category){

            DB::table('categories')->insert([
                'category'=> $category[0],
                'image'=> $category[1]

            ]);
        }
    
    }
}
