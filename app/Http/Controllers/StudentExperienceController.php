<?php

namespace App\Http\Controllers;

use App\Models\StudentExperience;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class StudentExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display form for creating a new experience
    public function create()
    {
        return view('student_experience.form'); // You can adjust the blade file
    }

    // Store a new experience
    public function store(Request $request)
    {
        $request->validate([
            'job_title'     => 'required|string|max:255',
            'company_name'  => 'required|string|max:255',
            'start_year'    => 'required|numeric',
            'end_year'      => 'nullable|numeric|gte:start_year',
            'description'   => 'nullable|string',
        ]);

        auth()->user()->studentExperiences()->create([
            'job_title'    => $request->job_title,
            'company_name' => $request->company_name,
            'start_year'   => $request->start_year,
            'end_year'     => $request->end_year,
            'description'  => $request->description,
        ]);

        return redirect()->back()->with('success', 'Experience added successfully.');
    }

    // Edit an existing experience
    public function edit($id)
    {
        $user = Auth::user();

        $editingExperience = StudentExperience::where('student_id', auth()->id())->findOrFail($id);
        return view('student.update', compact('editingExperience', 'user'));
    }

    // Update an existing experience
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_title'     => 'required|string|max:255',
            'company_name'  => 'required|string|max:255',
            'start_year'    => 'required|numeric',
            'end_year'      => 'nullable|numeric|gte:start_year',
            'description'   => 'nullable|string',
        ]);

        $experience = StudentExperience::where('student_id', auth()->id())->findOrFail($id);

        $experience->update([
            'job_title'    => $request->job_title,
            'company_name' => $request->company_name,
            'start_year'   => $request->start_year,
            'end_year'     => $request->end_year,
            'description'  => $request->description,
        ]);

        return redirect()->route('profileviewupdate', ['#experience'])
            ->with('success', 'Experience updated successfully.');
    }

    // Delete an experience
    public function destroy($id)
    {
        $experience = StudentExperience::where('student_id', auth()->id())->findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'Experience deleted successfully.');
    }
}
