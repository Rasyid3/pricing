<?php
// app/Http/Controllers/UMKController.php

namespace App\Http\Controllers;

use App\Models\UMK;
use Illuminate\Http\Request;

class UMKController extends Controller
{
    public function index()
    {
        $umks = UMK::all();
        return view('umks.index', compact('umks'));
    }

    public function show(UMK $umk)
    {
        return view('umks.show', compact('umk'));
    }

    public function create()
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        return view('umks.create', compact('regencies'));
        //return view('umks.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'regency' => 'required',
            'wage' => 'required|numeric',
        ]);

        // Create a new UMK
        UMK::create($validatedData);

        return redirect()->route('umks.index')->with('success', 'UMK created successfully');
    }

    public function edit(UMK $umk)
    {
        return view('umks.edit', compact('umk'));
    }

    public function update(Request $request, UMK $umk)
    {
        // Validate the request
        $validatedData = $request->validate([
            'regency' => 'required',
            'wage' => 'required|numeric',
        ]);

        // Update the UMK
        $umk->update($validatedData);

        return redirect()->route('umks.index')->with('success', 'UMK updated successfully');
    }

    public function destroy(UMK $umk)
    {
        // Delete the UMK
        $umk->delete();

        return redirect()->route('umks.index')->with('success', 'UMK deleted successfully');
    }
}


