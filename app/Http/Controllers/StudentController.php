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

        // Save user info
        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'skills' => $data['skills'],
            'designation' => $data['designation'],
            'city' => $data['city'],
            'country' => $data['country'],
            'zip_code' => $data['zip_code'],
            'about' => $data['about'],
        ]);

        // Redirect to the student dashboard route
        return redirect()->route('student.dashboard')->with('success', 'Profile updated successfully.');
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

}
