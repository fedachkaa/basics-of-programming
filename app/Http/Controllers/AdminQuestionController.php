<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminQuestionController extends Controller
{

    public function index()
    {
        return inertia('Admin/Question/Index', [
            'questions' => Question::all(),
            'studySections' => StudySection::all()
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
        $count = Question::where('study_section_id', $request['study_section_id'])->count();

        $question = new Question;
        $question->id = $count + 1;
        $question->fill(
            $request->validate([
            'study_section_id'=>'required',
            'question'=>'required|string',
            'variant_1'=>'required',
            'variant_2'=>'required',
            'variant_3'=>'required',
            'variant_4'=>'required',
            'answer'=>'required',
        ]));

        $question->save();
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
        Question::where('id', $id)->update(
            $request->validate([
                'study_section_id'=>'required',
                'question'=>'required|string',
                'variant_1'=>'required',
                'variant_2'=>'required',
                'variant_3'=>'required',
                'variant_4'=>'required',
                'answer'=>'required'
            ])
        );

        return redirect()->route('questions.index')->with('success', 'Питання змінено!');
    }


    public function destroy(string $id)
    {
        Question::where('id', $id)->delete();
        DB::table('user_results')->where('question_id', $id)->delete();

        return redirect()->route('questions.index')->with('success', 'Питання успішно видалена!');

    }
}
