<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function updatePortfolio(Request $request)
    {
        $request->validate([
            'github' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'website' => 'nullable|url',
        ]);

        $user = Auth::user();

        $user->update([
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'website' => $request->website,
        ]);

        return back()->with('success', 'Portfolio links updated successfully.');
    }

    public function Profileupdateview()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('student.update', compact('user')); // Pass the user to the view
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string',
            'skills' => 'nullable|array',
            'designation' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'zip_code' => 'nullable|string|max:10',
            'about' => 'nullable|string',
        ]);

        // Set default empty array if skills is not provided
        $skills = $data['skills'] ?? [];

        // Save user info
        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'skills' => $skills, // Use the default empty array if not provided
            'designation' => $data['designation'],
            'city' => $data['city'],
            'country' => $data['country'],
            'zip_code' => $data['zip_code'],
            'about' => $data['about'],
        ]);

        switch ($user->role) {
            case 'student':
                return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully.');
            case 'company':
                return redirect()->route('company.dashboard')->with('success', 'Profile updated successfully.');

            default:
                return redirect()->route('home')->with('success', 'Profile updated successfully.');
        }
    }

    public function updateProfileImage(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Delete old image if exists
        if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
            Storage::disk('public')->delete($user->profile_image);
        }

        // Store new image
        $path = $request->file('profile_image')->store('profile_images', 'public');

        $user->update(['profile_image' => $path]);

        return back()->with('success', 'Profile image updated successfully.');
    }
    public function show($id)
    {
        $student = \App\Models\User::where('id', $id)->where('role', 'student')->firstOrFail();

        // Optional: if you want notifications only for that user
        $notifications = $student->notifications()
            ->where('type', \App\Notifications\NewOfferNotification::class)
            ->latest()
            ->get();

        $user = Auth::user();

        return view('student.publicstudentprofile', compact('student', 'notifications', 'user'));
    }


}
