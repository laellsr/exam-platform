<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\QuestionIndexRequest;
use App\Http\Requests\Question\QuestionShowRequest;
use App\Http\Requests\Question\QuestionStorageRequest;
use App\Http\Requests\Question\QuestionUpdateRequest;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuestionIndexRequest $request)
    {
        $questions = Question::where('user_id', $request->user_id)
        ->select('id', 'user_id', 'subject_id', 'description', 'options', 'answer', 'level')
        ->with(['subject:id,name', 'user:id,name'])
        ->get();

        // $user = User::where('id', $request->user_id)
        // ->with(['questions'])->get();

        // $user_questions = $user[0]->questions;

        // $grouped_questions = $user_questions->groupBy(function ($question) {
        //     return $question->subject->name;
        // });

        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        throw new HttpResponseException(response()->json([], 501));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionStorageRequest $request)
    {
        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionShowRequest $request)
    {
        $question = Question::find($request->input('question_id'));

        $versions = $question->versions()->get();

        return response()->json([
            "question" => $question,
            "versions" => $versions->all()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        throw new HttpResponseException(response()->json([], 501));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request)
    {
        $question = Question::where('id', $request->input('question_id'))

        ->update($request->except('question_id'));

        return response()->json($question, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        $question = Question::find($id);

        if (!isset($question)) {
           return response()->json([], 404);
        }

        $question->delete();

        return response()->json(['message' => 'Questão excluída com sucesso'], 200);
    }
}
