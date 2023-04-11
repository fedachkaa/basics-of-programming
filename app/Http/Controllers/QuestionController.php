<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use App\Models\User;
use App\Notifications\StudySectionPassed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index($study_section_id, $question_id){

        $study_section = StudySection::where('id', $study_section_id)->first();

        if (Question::where('study_section_id', $study_section_id)
            ->where('id', $question_id )
            ->exists()) {
                return inertia('Question/Index',
                  [
                      'question'=> Question::where('study_section_id', $study_section_id)
                          ->where('id', $question_id )->first(),
                      'studySection'=> $study_section
                ]);
        }
        else return redirect()->route('result', ['study_section_id'=>$study_section_id]);
    }

    public function store(Request $request)
    {
        $study_section_id = $request['question']['study_section_id'];
        $question_id = $request['question']['id'];
        $user_result = $request['picked'] === $request['question']['answer'] ? 1 : 0;

        $user = Auth::user();

        if ($user->userResults()
            ->where('study_section_id', $study_section_id)
            ->wherePivot('question_id', $question_id)
            ->exists())
        {
            Auth::user()
                ->userResults()
                ->wherePivot('question_id', $question_id)
                ->updateExistingPivot($study_section_id, ['user_result'=> $user_result]);
        }
        else{
            $user->userResults()
                ->attach($study_section_id,
                [
                    'question_id'=>$question_id,
                    'user_result'=> $user_result
                ]);
        }
        return redirect()->route('testing', ['id' => $study_section_id, 'question_id' => $question_id + 1]);
    }

    public function result($study_section_id){
        $user_result = Auth::user()->userResults()->where('study_section_id', $study_section_id)->get();
        $result = [];
        foreach ($user_result as $res){
            $result[$res->pivot->question_id] = $res->pivot->user_result;
        }
        $total = array_sum(array_values($result));

        $study_section = StudySection::where('id', $study_section_id)->first();
        Auth::user()->notify(new StudySectionPassed($study_section));

        return inertia('Question/Result',
            [
                'result' => $result,
                'total' => $total
            ]);
    }



}
