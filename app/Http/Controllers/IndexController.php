<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\StudySection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->is_admin){
            return redirect()->route('admin');
        }

        $study_sections = StudySection::all()->pluck('title');
        return inertia('Index/Index',
        [
            'studySections'=>$study_sections,
        ]);
    }

    public function rating()
    {
        $users_results = [];
        $users = User::where('is_admin', 0)->get();
        foreach ($users as $user) {
            $total = 0;
            $passed_study_section = [];

            foreach ($user->userResults as $user_result)  {
                $total += $user_result->pivot->user_result;
                $study_section = $user_result->pivot->study_section_id;
                if(!array_key_exists($study_section, $passed_study_section))
                    $passed_study_section[$study_section] = Question::where('study_section_id', $study_section)->count();
            }

            $count = count($passed_study_section);
            $questions = array_sum($passed_study_section);
            $users_results["{$user->name} {$user->surname}"] = $questions == 0 ? 0 : round(($total / $questions) * 100, 2) * $count;
        }
        arsort($users_results);
        $result = [];
        foreach (array_slice($users_results,0,3) as $key => $value){
            $result[] = [
                'user' => $key,
                'rating' => $value
            ];
        }

        return inertia('Index/Rating',
        [
            'users_results'=> $result
        ]);

    }
}
