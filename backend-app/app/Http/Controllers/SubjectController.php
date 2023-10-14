<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subject\SubjectStoreResquest;
use App\Models\Subject;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Subject::select(['id', 'name'])->get(), 200);
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
    public function store(SubjectStoreResquest $request)
    {
        $subject = Subject::create($request->all());

        return response()->json([
            'message' => 'Disciplina criada com sucesso!',
            'subject_id' => $subject->id
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id)
    {
        $subject = Subject::find($id);

        if (!isset($subject)) {
            throw new HttpResponseException(response()->json([], 404));
        }

        $subject->delete();

        return response()->json([], 200);
    }
}
