<?php

namespace Tests\Feature\Exam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExamTest extends TestCase
{
    /**
     * Store an exam and show its details
     */
    public function test_exam_store_show(): void
    {
        /**
         *
         *
         * Create Exam
         *
         *
         */

        $exam_name = 'Exam #' . random_int(100, 500);

        $payload = [
            'user_id' => 1,             // usuario
            'subject_id' => 1,          // disciplina
            'name' => $exam_name,       // nome da prova
        ];

        $payload['questions'] = [
            [
                'level' => 1,                                // nivel 1-5
                'question_type_id' => 1,                     // questão aberta
                'description' => 'Question One description', // enunciado
            ],
            [
                'level' => 1,                                          // nivel 1-5
                'question_type_id' => 2,                               // questão de múltipla escolha
                'description' => 'Question Two description',           // enunciado
                'options' => '["Option 1", "Option 2", "Option 3"]',   // opções
				'answer' => 'Option 2',                                // resposta
            ]
        ];

        $response = $this->postJson('/api/exams/store', $payload);

        $response->assertStatus(201); // Created https://www.httpstatus.com.br/201/

        $response->assertJson([
            'message' => true,
            'exam_id' => true
        ]);

        /**
         *
         * Show exam details
         *
         *
         */

        $exam_id = $response->json('exam_id');

        $payload = [
            'user_id' => 1,
            'exam_id' => $exam_id
        ];

        $response = $this->json('GET', '/api/exams/show', $payload);

        $response->assertStatus(200); // Ok https://www.httpstatus.com.br/200/

        $data = ($response->json());

        $expected = [
            'id' => $exam_id,
            'name' => $exam_name,
            'user_id' => 1,
            'subject_id' => 1,
            'questions' => [
                [
                    'level' => 1,
                    'question_type_id' => 1,
                    'description' => 'Question One description'
                ],
                [
                    'level' => 1,
                    'question_type_id' => 2,
                    'description' => 'Question Two description',
                    'options' => '["Option 1", "Option 2", "Option 3"]',
                    'answer' => 'Option 2',
                ]
            ]
        ];

        foreach ($expected as $key => $value) {
            if($key == 'questions') {
                foreach ($value as $q_key => $q_value) {
                    foreach ($q_value as $Qkey => $Qvalue) {
                        $this->assertEquals($Qvalue, $data['questions'][$q_key][$Qkey]);
                    }
                }
            } else {
                $this->assertEquals($value, $data[$key]);
            }
        }

    }
}
