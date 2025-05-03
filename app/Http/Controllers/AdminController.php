<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function showusers()
    {
        $usersByRole = User::where('role', '!=', 'admin')
            ->select('id', 'name', 'email', 'role', 'created_at')
            ->orderBy('role')
            ->get()
            ->groupBy('role');

        return view('admin.users', compact('usersByRole'));
    }
}
