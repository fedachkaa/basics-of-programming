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
        $study_sections = StudySection::all()->pluck('title');
        return inertia('Index/Index',
        [
            'studySections'=>$study_sections,
        ]);
    }

    public function rating()
    {
        $users_results = [];
        $users = User::all();
        foreach ($users as $user) {
            $total = 0;
            $questions = 0;
            foreach ($user->study_sections as $study_section)  {
                $total += $study_section->pivot->user_result;
                $questions += Question::where('study_section_id', $study_section->id)->count();
            }
            $users_results[$user->email] = $questions == 0 ? 0 : round(($total / $questions) * 100, 2);
        }
        arsort($users_results);
        return inertia('Index/Rating',
        [
            'users_results'=> $users_results
        ]);
    }

}
