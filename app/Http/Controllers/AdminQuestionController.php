<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminQuestionController extends Controller
{

    public function index($id = 1)
    {
        $questions = Question::where('study_section_id', $id)->get();

        foreach ($questions as $item){
            $id = $item->study_section_id;
            $item->study_section_id = StudySection::where('id', $id)->first()->title;
        }

        return inertia('Admin/Question/Index', [
            'questions' => $questions,
            'studySections'=>StudySection::all()
        ]);
    }


    public function create()
    {
        return inertia('Admin/Question/Create', [
            'studySections' => StudySection::all(),
        ]);
    }


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


    public function edit(string $id)
    {
        $question = Question::where('id', $id)->first();
        $studySections = StudySection::all();
        return inertia('Admin/Question/Edit', [
            'question'=>$question,
            'studySections'=>$studySections,
        ]);
    }


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


    public function destroy(string $id)
    {
        Question::where('id', $id)->delete();

        return redirect()->route('questions.index')->with('success', 'Питання успішно видалена!');

    }
}
