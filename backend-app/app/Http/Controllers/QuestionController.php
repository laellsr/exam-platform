<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required',
            'options' => 'required|array',
            'correctAnswer' => 'required|string',
            'difficulty' => 'required|string',
            'category' => 'required|string',
            'score' => 'required|numeric',
        ]);

        Question::create($validatedData);

        return response()->json(['message' => 'Pergunta criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        // return view('questions.show', compact('question'));
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
    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'text' => 'required',
            'options' => 'required|array',
            'correctAnswer' => 'required|string',
            'difficulty' => 'required|string',
            'category' => 'required|string',
            'score' => 'required|numeric',
        ]);

        $question->update($validatedData);

        return response()->json(['message' => 'Pergunta atualizada com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json(['message' => 'Pergunta excluída com sucesso'], 200);
    }
}
