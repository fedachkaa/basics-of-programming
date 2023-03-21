<?php

namespace App\Http\Controllers;

use App\Models\StudySection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $study_sections = User::find($user_id)->study_sections()->get();
        /*
        foreach ($user->study_sections as $study_section) {
            dd( $study_section->pivot->user_result);
        }*/

        return inertia(
            'UserAccount/Index',
            [
                'user'=> $user,
                'study_sections'=>$study_sections
            ]
        );
    }
}
