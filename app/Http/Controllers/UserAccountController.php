<?php

namespace App\Http\Controllers;

use App\Models\StudySection;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $total = [];
        for($i = 1; $i <= StudySection::all()->count(); $i++){
            $title = StudySection::where('id', $i)->first()->title;
            $res = Auth::user()->userResults()->where('study_section_id', $i)->sum('user_result');
            $total[$i] = [$title => $res];
        }

        return inertia(
            'UserAccount/Index',
            [
                'user' => $user,
                'user_results' => $total
            ]
        );
    }
}
