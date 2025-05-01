<?php

namespace App\Http\Controllers;

use App\Models\StudentCertificate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class StudentCertificateController extends Controller
{
    /**
     * Store a newly uploaded certificate.
     */
    public function store(Request $request)
    {
        $request->validate([
            'certificate' => 'required',
            'certificate.*' => 'file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('certificate')) {
            foreach ($request->file('certificate') as $file) {
                $path = $file->store('certificates', 'public');

                try {
                    StudentCertificate::create([
                        'user_id' => auth()->id(),
                        'title' => 'Certificate',
                        'certificate_path' => $path,
                    ]);
                } catch (\Exception $e) {
                    dd('DB insert failed: ' . $e->getMessage());
                }
            }

            return redirect()->back()->with('success', 'Certificates uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No files uploaded.');
    }

    /**
     * Delete the specified certificate.
     */
    public function destroy($id)
    {
        $certificate = StudentCertificate::where('user_id', auth()->id())->findOrFail($id);

        // Delete file from storage
        Storage::disk('public')->delete($certificate->certificate_path);

        // Delete record
        $certificate->delete();

        return redirect()->back()->with('success', 'Certificate deleted.');
    }



}
