<?php

namespace App\Http\Controllers;

use App\Models\StudySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminStudySectionController extends Controller
{

    public function index()
    {
        return inertia('Admin/StudySection/Index', [
            'studySections'=>StudySection::all(),
        ]);
    }


    public function create()
    {
        return inertia('Admin/StudySection/Create');
    }


    public function store(Request $request)
    {
        StudySection::create( $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]));

        return redirect()->route('study.index')->with('success', 'Тему створено!');

    }


    public function show(string $id)
    {
        return inertia('Admin/StudySection/Show',
            [
                'studySection' => StudySection::where('id', $id)->first()
            ]);
    }


    public function edit(string $id)
    {
        return inertia('Admin/StudySection/Edit',
            [
                'studySection' => StudySection::where('id', $id)->first()
            ]);
    }


    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('study.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        StudySection::where('id', $id)
            ->update([
                'title'=> $validated['title'],
                'content'=> $validated['content']
            ]);

        return redirect()->route('study.index')->with('success', 'Тему змінено!');

    }


    public function destroy(string $id)
    {
        StudySection::where('id', $id)->delete();

        return redirect()->route('study.index')->with('success', 'Тема успішно видалена!');
    }
}
