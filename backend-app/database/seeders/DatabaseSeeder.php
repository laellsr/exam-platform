<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Exam;
use App\Models\Expertise;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            QuestionTypeSeeder::class
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => 'password'
        ]);

        Subject::create([
            'name' => 'Programação I'
        ]);

        Subject::create([
            'name' => 'Programação II'
        ]);

        Expertise::upsert([
            ['name' => 'Computação'],
            ['name' => 'Programação'],
        ], ['name']);

        // Exam::create([
        //     'user_id' => 1,
        //     'subject_id' => 1,
        //     'name' => 'Programação I - AB1'
        // ]);

        // Question::create([
        //     'user_id' => 1,
        //     'subject_id' => 1,
        //     'name' => 'Trabalhando com vetores'
        // ]);

        // QuestionVersion::create([
        //     'question_id' => 1,
        //     'question_type_id' => 2,
        //     'version_option_id' => null,
        //     'level' => 2,
        //     'description' => 'Como é declarado um vetor de inteiros na linguagem C?'
        // ]);

        // VersionOption::insert([
        //     ['question_version_id' => 1,
        //     'option' => 'vetor[]'],
        //     ['question_version_id' => 1,
        //     'option' => 'int vetor[] = {100, 50, 10}']
        // ]);

        // QuestionVersion::where('id', 1)->update(['version_option_id' => 2]);

        // ExamQuestionVersion::create([
        //     'exam_id' => 1,
        //     'question_id' => 1,
        //     'question_version_id' => 1,
        // ]);

        // // Exam 2

        // Exam::create([
        //     'user_id' => 1,
        //     'subject_id' => 1,
        //     'name' => 'Programação I - AB2'
        // ]);

        // Question::create([
        //     'user_id' => 1,
        //     'subject_id' => 1,
        //     'name' => 'Trabalhando com funções'
        // ]);

        // QuestionVersion::create([
        //     'question_id' => 2,
        //     'question_type_id' => 2,
        //     'version_option_id' => null,
        //     'level' => 1,
        //     'description' => 'Como é declarado uma função na linguagem C?'
        // ]);

        // VersionOption::insert([
        //     ['question_version_id' => 2,
        //     'option' => 'vetor[]'],
        // ]);

        // QuestionVersion::where('id', 2)->update(['version_option_id' => 3]);

        // ExamQuestionVersion::create([
        //     'exam_id' => 2,
        //     'question_id' => 2,
        //     'question_version_id' => 2,
        // ]);




        // DB::table('exam_question_version')->insert([
        //     'exam_id' => 1,
        //     'question_id' => 1,
        //     'question_version_id' => 1,
        // ]);
    }
}
