<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_types')->insert([
            ['name' => 'Aberta'],
            ['name' => 'Múltipla Escolha'],
            ['name' => 'Verdadeiro ou Falso']
        ]);
    }
}
