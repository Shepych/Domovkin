<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'Сколько стоит построить дом ?',
            'Как будет проходить процесс строительства ?',
            'Что необходимо учесть перед строительством ?'
        ];
        foreach($questions as $question) {
            DB::table('questions')->insert([
                'question' => $question,
                'content' => ''
            ]);
        }
    }
}
