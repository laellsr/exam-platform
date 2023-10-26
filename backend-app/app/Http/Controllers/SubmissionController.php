<?php

namespace App\Http\Controllers;

use App\Http\Requests\Submission\SubmissionIndexRequest;
use App\Http\Requests\Submission\SubmissionStorageRequest;
use App\Models\NonUserAnswer;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubmissionIndexRequest $request)
    {
        $submissions = Submission::where([
            'exam_id' => $request->exam_id
        ])->get();

        foreach ($submissions as $key => $value) {
            $answers = NonUserAnswer::where([
                'submission_id' => $value->id,
                'exam_id' => $request->exam_id
            ])->get();
            foreach ($answers as $answer) {
                $answer->question->description;
            }
            $submissions[$key]['answers'] = $answers;
        }

        return response()->json($submissions, 200);
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
    public function store(SubmissionStorageRequest $request)
    {
        $submission = Submission::where([
            'register' => $request->register,
            'exam_id' => $request->exam_id,
        ])->get();


        if(!$submission->isEmpty()) {
            return response()->json(['message' => 'Já existe uma submissão para este número de matrícula.'], 401);
        }

        // if($submission->count() > 0) {
        //     return response()->json(['message' => 'Já existe uma submissão para este número de matrícula.'], 401);
        // }

        $submission = Submission::create($request->all());

        foreach ($request->questions as $question) {
            NonUserAnswer::create([
                'submission_id' => $submission->id,
                'exam_id' => $request->exam_id,
                'question_id' => $question['id'],
                'answer' => $question['answer'],
                'assert' => $question['assert'],
            ]);
        }

        return response()->json(['message' => 'Submissão realizada com sucesso!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
