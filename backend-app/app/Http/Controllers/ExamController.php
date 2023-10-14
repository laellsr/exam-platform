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

use function PHPUnit\Framework\isEmpty;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ExamIndexRequest $request)
    {
        $exams = Exam::
        select('id', 'user_id', 'subject_id', 'name', 'created_at')
        ->where('user_id', $request->input('user_id'))
        ->get();

        return response()->json($exams, 200);

        $questions = Question::join('subjects', 'questions.subject_id', '=', 'subjects.id')
        ->where('questions.user_id', $request->user_id)
        ->select('questions.id', 'subjects.nome as nome_do_assunto', 'questions.description', 'questions.options', 'questions.answer', 'questions.level')
        ->get();

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

        if (!empty($request->questions)) {

            foreach ($request->questions as $new_question)
            {
                $new_question['user_id'] = $exam->user_id;
                $new_question['subject_id'] = $exam->subject_id;

                if(empty($new_question['options'])) {
                    $new_question['options'] = '[]';
                    $new_question['answer'] = '';
                }

                $question = Question::create($new_question);

                $exam->questions()->attach($question);
            }
        }
        // return response()->json($data, 201);
        return response()->json([
            'message' => 'Prova criada com sucesso!',
            'exam_id' => $exam->id
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamShowRequest $request)
    {
        $id = (int) $request->input('exam_id');

        $exam = Exam::find($id);

        $questions = $exam->questions()->get();

        $exam['user_name'] = $exam->user->name;
        $exam['subject_name'] = $exam->subject->name;
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
        $questions = Question::where([
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id
        ]) ->inRandomOrder()->take($request->questions_number)->get();

        $exam = Exam::create([
            'user_id' => $request->user_id,
            'subject_id' => $request->subject_id,
            'name' => 'Prova gerada para disciplina #' . $questions[0]->subject->name
        ]);

        $exam->questions()->attach($questions);

        $exam['user_name'] = $exam->user->name;
        $exam['subject_name'] = $exam->subject->name;
        $exam['questions'] = $questions;

        return response()->json($exam, 201);
    }
}
