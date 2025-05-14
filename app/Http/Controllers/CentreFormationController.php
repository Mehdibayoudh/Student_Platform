<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Formation;
use App\Models\Offer;
use App\Models\User;
use App\Notifications\NewOfferNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CentreFormationController extends Controller
{
    public function Profileupdateview()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('centre formation.updatecentre', compact('user')); // Pass the user to the view
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

        return redirect()->route('centre formation.dashboard')->with('success', 'Profile updated successfully.');
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

        $user = auth()->user();

        // Auto-create centreProfile if it doesn't exist
        $centre = $user->centreProfile ?? Centre::create(['user_id' => $user->id]);

        $formation = $centre->formations()->create($data);

        return redirect()->back()->with('success', 'Formation created successfully.');
    }

    public function destroy($id)
    {
        $formation = Formation::where('centre_id', auth()->user()->centreProfile->id)->findOrFail($id);
        $formation->delete();

        return redirect()->back()->with('success', 'Formation deleted successfully.');
    }

    public function show($id)
    {
        $formation = Formation::with('centre')->findOrFail($id);

        return response()->json([
            'title' => $formation->title,
            'description' => $formation->description,
            'location' => $formation->location,
            'start_date' => $formation->start_date,
            'end_date' => $formation->end_date,
            'centre' => $formation->centre->user->name ?? 'Unknown'
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
