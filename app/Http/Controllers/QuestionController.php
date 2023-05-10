<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use App\Models\User;
use App\Notifications\StudySectionPassed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class QuestionController extends Controller
{
    public function index($study_section_id){

        return inertia('Question/Index', [
            'questions' => Question::where('study_section_id', $study_section_id)->get(),
            'studySection' => StudySection::where('id', $study_section_id)->first()
        ]);
    }

    public function store($study_section_id, Request $request)
    {
        $user = Auth::user();
        $answers = $request['answers'];
        $questions = Question::where('study_section_id', $study_section_id)->get();

        for ($i = 0; $i < count($questions); $i++) {

            $result = $answers[$i] === $questions[$i]->answer ? 1 : 0;

            if (User::isResultExists($study_section_id, $questions[$i]->id)) {
                $user->userResults()
                    ->wherePivot('question_id', $questions[$i]->id)
                    ->updateExistingPivot($study_section_id, ['user_result' => $result]);

            } else {
                $user->userResults()
                    ->attach($study_section_id,
                        [
                            'question_id' => $questions[$i]->id,
                            'user_result' => $result
                        ]);
            }
        }

        return redirect()->route('result', ['id' => $study_section_id]);
    }



    public function result($study_section_id){
        $user_result = Auth::user()->userResults()->where('study_section_id', $study_section_id)->get();
        $result = [];
        foreach ($user_result as $res){
            $result[$res->pivot->question_id] = $res->pivot->user_result;
        }
        $total = array_sum(array_values($result));

        /*
        $study_section = StudySection::where('id', $study_section_id)->first();
        Auth::user()->notify(new StudySectionPassed($study_section));
        */
        return inertia('Question/Result',
            [
                'result' => $result,
                'total' => $total
            ]);
    }



}
