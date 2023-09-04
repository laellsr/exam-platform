<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Exam::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:300'
        ]);

        $data = $request->all();

        Exam::create($data);

        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $id)
    {
        $exam = Exam::find($id);

        return (isset($exam)) ? response()->json($exam, 200) : response()->json([], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string|int $id, Request $request)
    {
        $exam = Exam::find($id);

        if (!isset($exam)) {
           return response()->json([], 404);
        }

        $exam->update($request->only([
            'name'
        ]));

        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        $exam = Exam::find($id);

        if (!isset($exam)) {
           return response()->json([], 404);
        }

        $exam->delete();

        return response()->json([], 200);
    }

    /**
     * Generate a random exam
     */
    public function generate()
    {
        $questions = Question::all();

        if (empty($questions)) {
            return response()->json(['Não existem questões para gerar uma nova prova'], 406);
        }
    }
}
