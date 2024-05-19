<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class UserController extends Controller
{
    public function userDashboard()
    {
        $services = Service::all();
        return view('generalUserDashboard', compact('services'));
    }

    public function applyForService($id)
    {
        // Logic to handle the application process
        // This can include creating a new application record in the database

        return redirect()->back()->with('success', 'You have successfully applied for the service.');
    }
}
