<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(): View
    {
        $properties = Property::with('user')->latest()->get();
        return view('properties.index', compact('properties'));
    }

    public function create(): View
    {
        return view('properties.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'main_photo' => 'required|image|max:2048',
            'secondary_photo_1' => 'nullable|image|max:2048',
            'secondary_photo_2' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        
        // Handle photo uploads
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = $request->file('main_photo')->store('properties', 'public');
        }
        
        if ($request->hasFile('secondary_photo_1')) {
            $data['secondary_photo_1'] = $request->file('secondary_photo_1')->store('properties', 'public');
        }
        
        if ($request->hasFile('secondary_photo_2')) {
            $data['secondary_photo_2'] = $request->file('secondary_photo_2')->store('properties', 'public');
        }

        $request->user()->properties()->create($data);

        return redirect()->route('properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function edit(Property $property): View
    {
        $this->authorize('update', $property);
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property): RedirectResponse
    {
        $this->authorize('update', $property);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'main_photo' => 'nullable|image|max:2048',
            'secondary_photo_1' => 'nullable|image|max:2048',
            'secondary_photo_2' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        
        // Handle photo uploads
        if ($request->hasFile('main_photo')) {
            // Delete old photo if it exists
            if ($property->main_photo && Storage::disk('public')->exists($property->main_photo)) {
                Storage::disk('public')->delete($property->main_photo);
            }
            $data['main_photo'] = $request->file('main_photo')->store('properties', 'public');
        }
        
        if ($request->hasFile('secondary_photo_1')) {
            if ($property->secondary_photo_1 && Storage::disk('public')->exists($property->secondary_photo_1)) {
                Storage::disk('public')->delete($property->secondary_photo_1);
            }
            $data['secondary_photo_1'] = $request->file('secondary_photo_1')->store('properties', 'public');
        }
        
        if ($request->hasFile('secondary_photo_2')) {
            if ($property->secondary_photo_2 && Storage::disk('public')->exists($property->secondary_photo_2)) {
                Storage::disk('public')->delete($property->secondary_photo_2);
            }
            $data['secondary_photo_2'] = $request->file('secondary_photo_2')->store('properties', 'public');
        }

        $property->update($data);

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property): RedirectResponse
    {
        $this->authorize('delete', $property);
        
        $property->delete();

        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}
