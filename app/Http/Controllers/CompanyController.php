<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Notifications\NewOfferNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{


    public function Profileupdateview()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('company.updatecompany', compact('user')); // Pass the user to the view
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'designation' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'zip_code' => 'nullable|string|max:10',
            'about' => 'nullable|string',
        ]);

        // Set default empty array if skills is not provided

        // Save user info
        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'designation' => $data['designation'],
            'city' => $data['city'],
            'country' => $data['country'],
            'zip_code' => $data['zip_code'],
            'about' => $data['about'],
        ]);

        return redirect()->route('company.dashboard')->with('success', 'Profile updated successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $company = auth()->user()->company;
        $offer = $company->offers()->create($data);

        // Notify all students
        $students = User::where('role', 'student')->get();
        foreach ($students as $student) {
            $student->notify(new NewOfferNotification($offer));
        }

        return redirect()->back()->with('success', 'Offer created and students notified.');
    }
    public function destroy($id)
    {
        $offer = Offer::where('company_id', auth()->id())->findOrFail($id);

        // Delete related notifications
        DatabaseNotification::where('data->offer_id', $id)->delete();

        // Delete the offer
        $offer->delete();

        return redirect()->back()->with('success', 'Offer and related notifications deleted successfully.');
    }
    public function show($id)
    {
        $offer = Offer::with('company')->findOrFail($id);

        return response()->json([
            'title' => $offer->title,
            'description' => $offer->description,
            'location' => $offer->location,
            'start_date' => $offer->start_date,
            'end_date' => $offer->end_date,
            'company' => $offer->company->company_name ?? 'Unknown'
        ]);
    }
    public function postStudent(Request $request)
    {

        $validated = $request->validate([
            'offer_id' => 'required|exists:offers,id',
            'student_id' => 'required|exists:users,id',
        ]);

        // Associate student with the offer using the pivot table
        $offer = Offer::findOrFail($validated['offer_id']);
        $student = User::findOrFail($validated['student_id']);

        // Attach the student to the offer
        $offer->students()->attach($student->id);

        return redirect()->back()->with('success', 'Your request send');
    }

}
