<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exam\ExamGenerateRequest;
use App\Http\Requests\Exam\ExamIndexRequest;
use App\Http\Requests\Exam\ExamShowRequest;
use App\Http\Requests\Exam\ExamStorageRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        $data = [];

        $exam = Exam::create($request->all());

        $data['exam'] = [
            'id' => $exam->id,
            'subject_id' => $exam->subject_id,
            'subject' => Subject::find($exam->subject_id)->name,
            'name' => $exam->name
        ];

        if (!empty($request->questions)) {

            foreach ($request->questions as $new_question) {

                $question = Question::create([
                    'user_id' => $exam->user_id,
                    'subject_id' => $exam->subject_id,
                    'question_type_id' => $new_question['question_type_id'],
                    'description' => $new_question['description'],
                    'options' => $new_question['options'],
                    'answer' => $new_question['answer'],
                    'level' => $new_question['level'],
                ]);

                $exam->questions()->attach($question);

                $data['questions'][] = [
                    'id' => $question->id,
                    'question_type_id' => $question->question_type_id,
                    'description' => $question->description,
                    'options' => $question->options,
                    'answer' => $question->answer,
                    'level' => $question->level,
                ];
            }
        }

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamShowRequest $request)
    {
        $id = (int) $request->input('exam_id');

        $exam = Exam::find($id);

        $questions = $exam->questions()->get();

        $exam['questions'] = $questions;

        return response()->json($exam, 200);
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
    public function generate(ExamGenerateRequest $request)
    {
        $questions = Question::where(['subject_id' => $request->input('subject_id')])->get();
        // foreach ($questions as $question) {
        //     # code...
        // }
        return response()->json($questions);
        // $questions = Question::all();

        // if (empty($questions)) {
        //     return response()->json(['Não existem questões para gerar uma nova prova'], 406);
        // }
    }
}
