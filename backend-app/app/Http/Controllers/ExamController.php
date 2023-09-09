<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamIndexRequest;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\ExamStorageRequest;
use App\Http\Requests\ExamUpdateRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExamIndexRequest $request)
    {
        $exams = Exam::where('user_id', $request->input('user_id'))->get();

        return response()->json($exams, 200);
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
    public function store(ExamStorageRequest $request)
    {
        $exam = Exam::create($request->all());

        return response()->json($exam, 201);
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
        throw new HttpResponseException(response()->json([], 501));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExamUpdateRequest $request)
    {
        $exam = Exam::where('id', $request->input('exam_id'))

        ->update($request->except('exam_id'));

        return response()->json($exam, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        $exam = Exam::find($id);

        if (!isset($exam)) {
            throw new HttpResponseException(response()->json([], 404));
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
