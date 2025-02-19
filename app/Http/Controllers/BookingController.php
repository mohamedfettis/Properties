<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookingController extends Controller
{
    use AuthorizesRequests;
    public function active()
    {
        $activeBookings = auth()->user()->bookings()
            ->with('property')
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        return view('bookings.active', compact('activeBookings'));
    }

    public function index()
    {
        $activeBookings = auth()->user()->bookings()
            ->with('property')
            ->where('end_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        return view('dashboard', compact('activeBookings'));
    }
    public function store(Request $request, Property $property): RedirectResponse
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $request->user()->bookings()->create([
            'property_id' => $property->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()->route('properties.index')
            ->with('success', 'Booking created successfully.');
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $this->authorize('delete', $booking);
        
        $booking->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Booking cancelled successfully.');
    }
}
