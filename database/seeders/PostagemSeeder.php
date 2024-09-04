<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('postagens')->insert([
            'user_id' => 1,
            'titulo'  => 'Minha primeira postagem',
            'conteudo' => 'Conteúdo da minha primeira postagem'
        ]);

        DB::table('postagens')->insert([
            'user_id' => 1,
            'titulo'  => 'Minha segunda postagem',
            'conteudo' => 'Conteúdo da minha segunda postagem'
        ]);

        DB::table('postagens')->insert([
            'user_id' => 1,
            'titulo'  => 'Minha terceira postagem',
            'conteudo' => 'Conteúdo da minha terceira postagem'
        ]);
    }
}
