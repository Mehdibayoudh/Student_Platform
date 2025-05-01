<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewOfferNotification;
use Illuminate\Http\Request;
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
}
