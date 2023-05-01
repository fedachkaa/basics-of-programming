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
        $study_sections = StudySection::all();
        foreach ($study_sections as $study_section) {
            $title = $study_section->title;
            $id = $study_section->id;
            $res = Auth::user()->userResults()->where('study_section_id', $id)->sum('user_result');
            $total[$id] = [$title => $res];
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
