<?php

namespace App\Http\Controllers;

use App\Models\StudySection;
use Illuminate\Http\Request;

class StudySectionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        return inertia('StudySection/Index',
        [
            'studySections' => StudySection::all()
        ]);
    }


    public function show($id){
        return inertia('StudySection/Show',
            [
                'studySection' => StudySection::where('id', $id)->first()
            ]);

    }

}
