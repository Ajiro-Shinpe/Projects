<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('frontend.Appointment');
    }
public function AppointmentForm(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phoneNo' => 'required|digits:11',
        'AppDate' => 'required|date',
        'AppTime' => 'required|date_format:H:i',
        'stylist' => 'nullable|string|max:255',
        'service' => 'required|array',
        'service.*' => 'string',
        'message' => 'nullable|string',
    ]);

    // Check if an appointment with the same email already exists
    $existingAppointment = Appointment::where('email', $request->input('email'))->first();

    if ($existingAppointment) {
        // Return an error or handle accordingly
        return back()->withErrors(['email' => 'An appointment with this email already exists.'])->withInput();
    }

    $services = implode(', ', $request->input('service'));

    Appointment::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phoneNo' => $request->input('phoneNo'),
        'AppDate' => $request->input('AppDate'),
        'AppTime' => $request->input('AppTime'),
        'stylist' => $request->input('stylist'),
        'service' => $services, // This correctly stores multiple services
        'message' => $request->input('message'),
    ]);

    // Redirect or return success message
    return redirect('/')->with('success', 'Appointment booked successfully.');
}

public function viewAppointments()
{
    // Fetch all appointments from the database
    $appointments = Appointment::all();

    // Pass the data to the view
    return view('frontend.Fetch_Appointments', compact('appointments'));
}
public function destroy($id)
{
    $appointment = Appointment::find($id);

    if ($appointment) {
        $appointment->delete();
        return redirect()->route('appointments.view')->with('success', 'Appointment deleted successfully.');
    }

    return redirect()->route('appointments.view')->with('error', 'Appointment not found.');
}
}
