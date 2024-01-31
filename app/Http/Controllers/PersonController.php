<?php
// app/Http/Controllers/PersonController.php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return view('persons.index', compact('persons'));
    }

    public function show(Person $person)
    {
        return view('persons.show', compact('person'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'umk_id' => 'required|numeric',
            'job_id' => 'required|numeric',
            'sub_job_id' => 'required|numeric'
            // Add other validation rules for your person fields
        ]);

        // Create a new Person
        Person::create($validatedData);

        return redirect()->route('persons.index')->with('success', 'Person created successfully');
    }

    public function edit(Person $person)
    {
        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'umk_id' => 'required|numeric',
            'job_id' => 'required|numeric',
            'sub_job_id' => 'required|numeric'
            // Add other validation rules for your person fields
        ]);

        // Update the Person
        $person->update($validatedData);

        return redirect()->route('persons.index')->with('success', 'Person updated successfully');
    }

    public function destroy(Person $person)
    {
        // Delete the Person
        $person->delete();

        return redirect()->route('persons.index')->with('success', 'Person deleted successfully');
    }
}

