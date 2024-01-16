<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Descoperiri Recente în Astronomie',
                'author_id' => 1,
                'content' => 'Conținutul articolului despre astronomie...',
                'category' => 'Știință',
                'status_message' => 'Articolul este în așteptare.'
            ],
            [
                'title' => 'Tendințe Actuale în Tehnologia Informației',
                'author_id' => 1,
                'content' => 'Conținutul articolului despre IT...',
                'category' => 'IT',
                'status_message' => 'Articolul este în așteptare.'
            ],
            [
                'title' => 'Rezultate Surprinzătoare în Liga Sportivă',
                'author_id' => 1,
                'content' => 'Conținutul articolului despre sport...',
                'category' => 'Sport',
                'status_message' => 'Articolul este în așteptare.'
            ],
            [
                'title' => 'Impactul Schimbărilor Climatice',
                'author_id' => 1,
                'content' => 'Conținutul articolului despre mediu...',
                'category' => 'Mediu',
                'status_message' => 'Articolul este în așteptare.'
            ]
        ]);
    }
}

