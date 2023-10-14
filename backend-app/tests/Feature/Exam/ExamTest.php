<?php

namespace Tests\Feature\Exam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExamTest extends TestCase
{
    use WithFaker;
    /**
     * Store an exam and show its details
     */
    // public function test_exam_store_show(): void
    // {
    //     /**
    //      *
    //      *
    //      * Create Exam
    //      *
    //      *
    //      */

    //     $exam_name = 'Exam #' . random_int(100, 500);

    //     $payload = [
    //         'user_id' => 1,             // usuario
    //         'subject_id' => 1,          // disciplina
    //         'name' => $exam_name,       // nome da prova
    //     ];

    //     $payload['questions'] = [
    //         [
    //             'level' => 1,                                // nivel 1-5
    //             'question_type_id' => 1,                     // questão aberta
    //             'description' => 'Question One description', // enunciado
    //         ],
    //         [
    //             'level' => 1,                                          // nivel 1-5
    //             'question_type_id' => 2,                               // questão de múltipla escolha
    //             'description' => 'Question Two description',           // enunciado
    //             'options' => '["Option 1", "Option 2", "Option 3"]',   // opções
	// 			'answer' => 'Option 2',                                // resposta
    //         ]
    //     ];

    //     $response = $this->postJson('/api/exams/store', $payload);

    //     $response->assertStatus(201) // Created https://www.httpstatus.com.br/201/

    //     ->assertJson([
    //         'message' => true,
    //         'exam_id' => true
    //     ]);

    //     /**
    //      *
    //      * Show exam details
    //      *
    //      *
    //      */

    //     $exam_id = $response->json('exam_id');

    //     $payload = [
    //         'user_id' => 1,
    //         'exam_id' => $exam_id
    //     ];

    //     $response = $this->json('GET', '/api/exams/show', $payload);

    //     $response->assertStatus(200); // Ok https://www.httpstatus.com.br/200/

    //     $data = ($response->json());

    //     $expected = [
    //         'id' => $exam_id,
    //         'name' => $exam_name,
    //         'user_id' => 1,
    //         'subject_id' => 1,
    //         'questions' => [
    //             [
    //                 'level' => 1,
    //                 'question_type_id' => 1,
    //                 'description' => 'Question One description'
    //             ],
    //             [
    //                 'level' => 1,
    //                 'question_type_id' => 2,
    //                 'description' => 'Question Two description',
    //                 'options' => '["Option 1", "Option 2", "Option 3"]',
    //                 'answer' => 'Option 2',
    //             ]
    //         ]
    //     ];

    //     foreach ($expected as $key => $value) {
    //         if($key == 'questions') {
    //             foreach ($value as $q_key => $q_value) {
    //                 foreach ($q_value as $Qkey => $Qvalue) {
    //                     $this->assertEquals($Qvalue, $data['questions'][$q_key][$Qkey]);
    //                 }
    //             }
    //         } else {
    //             $this->assertEquals($value, $data[$key]);
    //         }
    //     }

    // }

    /**
     * Generate a new exam by subject
     */
    public function teste_exam_generate_by_subject(): void
    {
        /**
         *
         * Create a new subject
         *
         */
        $subject['name'] = $this->faker->word;

        $response = $this->postJson('/api/subjects/store', [
            'user_id' => 1,
            'name' => $subject['name']
        ]);

        $response->assertStatus(201) // Created https://www.httpstatus.com.br/201/

        ->assertJson([
            'message' => true,
            'subject_id' =>true
        ]);
        /**
         *
         * Creates questions
         *
         */
        $subject['id'] = $response->json('subject_id');

        $questions = [];

        foreach (range(1, 10) as $i){
            $questions[] = [
                'user_id' => 1,
                'subject_id' => $subject['id'],
                'question_type_id' => 1,
                'level' => random_int(1, 5),
                'description' => $this->faker()->sentence()
            ];
        }

        $questions_dict = [];

        foreach ($questions as $question)
        {
            $response = $this->postJson('/api/questions/store', $question);

            $response->assertStatus(201) // Created https://www.httpstatus.com.br/201/
            ->assertJson([
                'message' => true,
                'question_id' => true
            ]);

            $questions_dict[$response->json('question_id')] = $question;
        }

        /**
         *
         * Genarate exam by subject
         *
         */
        $payload = [
            'user_id' => 1,
            'subject_id' => $subject['id'],
            'questions_number' => 5
        ];

        $response = $this->json('GET', '/api/exams/generate', $payload);

        $response->assertStatus(201) // Created https://www.httpstatus.com.br/201/

        ->assertJson([
            'message' => true,
            'id' => true,
            'name' => true
        ]);

        $payload = [
            'user_id' => 1,
            'exam_id' => $response->json('id')
        ];

        $response = $this->json('GET', '/api/exams/show', $payload);

        $response->assertStatus(200) // Ok https://www.httpstatus.com.br/200/

        ->assertJson([
            'subject_id' => true,
            'name' => true,
            'questions' => true
        ]);

        $data = ($response->json());

        $this->assertEquals($subject['id'], $data['subject_id']);
        $this->assertEquals($subject['name'], $data['subject_name']);

        foreach ($data['questions'] as $question) {
            $id = $question['id'];
            $this->assertEquals($questions_dict[$id]['description'], $question['description']);
            $this->assertEquals($questions_dict[$id]['subject_id'], $question['subject_id']);
        }
    }
}
