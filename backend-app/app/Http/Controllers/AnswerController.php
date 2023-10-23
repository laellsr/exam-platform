<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\AnswerIndexRequest;
use App\Http\Requests\Answer\AnswerShowRequest;
use App\Http\Requests\Answer\AnswerStorageRequest;
use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnswerIndexRequest $request)
    {
        $where['user_id'] = $request->user_id;

        if (!empty($request->exam_id))
        {
            $where['exam_id'] = $request->exam_id;
        }

        $answers = Answer::where($where)->get();

        foreach ($answers as $key => $value) {
            // $answers[$key]['question_name'] = $value->question->description;
            $value->question->description;
            // var_dump();
        }

        return response()->json($answers, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerStorageRequest $request)
    {

        $exam = Exam::find($request->exam_id);

        $questions = $exam->questions()->get();

        if ($questions->count() == 0)
        {
            return response()->json(['message' => 'Prova sem questões'], 400);
        }

        $questions_answers_dict = [];

        foreach ($request->answers as $answer)
        {
            $questions_answers_dict[ $answer['question_id'] ] =  $answer['answer'];
        }

        // Filters and validations
        foreach ($questions as $question)
        {
            if(!isset($questions_answers_dict[ $question->id ]))
            {
                return response()->json(['message' => 'Questão não existe na prova.'], 400);
            }

            $answer = Answer::where([
                'user_id' => $request->user_id,
                'exam_id' => $request->exam_id,
                'question_id' => (int) $question->id,
            ])->get();

            if(!$answer->isEmpty())
            {
                return response()->json(['message' => 'Não é permitido ter mais de uma resposta para uma questão de mesma prova.'], 406);
            }
        }

        foreach ($questions_answers_dict as $question_id => $answer)
        {
            Answer::create([
                'user_id' => $request->user_id,
                'exam_id' => $request->exam_id,
                'question_id' => (int) $question_id,
                'answer' => $answer
            ]);
        }

        return response()->json([
            'message' => 'Prova respondida com sucesso.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AnswerShowRequest $request)
    {
        $answer = Answer::where([
            'user_id' => $request->user_id,
            'exam_id' => $request->exam_id,
            'question_id' => $request->question_id,
        ])->get();

        $answer[0]->question->description;

        return response()->json($answer[0], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
