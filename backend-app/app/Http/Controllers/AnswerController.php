<?php

namespace App\Http\Controllers;

use App\Http\Requests\Answer\AnswerIndexRequest;
use App\Http\Requests\Answer\AnswerShowRequest;
use App\Http\Requests\Answer\AnswerStorageRequest;
use App\Models\Answer;
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



        $answer = Answer::where([
            'user_id' => $request->user_id,
            'exam_id' => $request->exam_id,
            'question_id' => $request->question_id,
        ])->get();

        if(!$answer->isEmpty()) {
            return response()->json(['message' => 'Não é permitido ter mais de uma resposta para uma questão de mesma prova.'], 406);
        }

        $answer = Answer::create($request->all());

        return response()->json( [
            'message' => 'Questão respondida com sucesso.'
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

        return response()->json($answer, 200);
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
