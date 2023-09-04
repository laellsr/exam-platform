<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

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

        return redirect()->route('questions.index')->with('success', 'Pergunta criada com sucesso.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

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

        return redirect()->route('questions.index')->with('success', 'Pergunta atualizada com sucesso.');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pergunta excluída com sucesso.');
    }
}
