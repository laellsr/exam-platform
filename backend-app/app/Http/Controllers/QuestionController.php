<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Question::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->all());

        return response()->json(['message' => 'Pergunta criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $id)
    {
        $question = Question::find($id);

        if (!isset($question)) {
            return response()->json([], 404);
        }

        return response()->json($question, 200) : ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        // return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string|int $id, QuestionRequest $request)
    {

        $question = Question::find($id);

        if (!isset($question)) {
           return response()->json([], 404);
        }

        $question->update($request->all());

        return response()->json(['message' => 'Questão atualizada com sucesso'], 200);
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
