<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        foreach ($questions as $item){
            $id = $item->study_section_id;
            $item->study_section_id = StudySection::where('id', $id)->first()->title;
        }

        return inertia('Admin/Question/Index', [
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Question/Create', [
            'studySections' => StudySection::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Question::create( $request->validate([
            'study_section_id'=>'required',
            'question'=>'required|string',
            'variant_1'=>'required',
            'variant_2'=>'required',
            'variant_3'=>'required',
            'variant_4'=>'required',
            'answer'=>'required',
        ]));

        return redirect()->route('questions.index')->with('success', 'Питання створено!');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::where('id', $id)->first();
        $studySections = StudySection::all();
        return inertia('Admin/Question/Edit', [
            'question'=>$question,
            'studySections'=>$studySections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'study_section_id' => 'required',
            'question' => 'required|string',
            'variant_1' => 'required',
            'variant_2' => 'required',
            'variant_3' => 'required',
            'variant_4' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('questions.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        Question::where('id', $id)
            ->update([
                'study_section_id' => $validated['study_section_id'],
                'question' => $validated['question'],
                'variant_1' => $validated['variant_1'],
                'variant_2' => $validated['variant_2'],
                'variant_3' => $validated['variant_3'],
                'variant_4' => $validated['variant_4'],
                'answer' => $validated['answer']
            ]);

        return redirect()->route('questions.index')->with('success', 'Питання змінено!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::where('id', $id)->delete();

        return redirect()->route('questions.index')->with('success', 'Питання успішно видалена!');

    }
}
