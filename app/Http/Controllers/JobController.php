<?php
// app/Http/Controllers/JobController.php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::with('subJobs')->find($id);
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required',
            // Add other validation rules for your job fields
        ]);

        // Create a new Job
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required',
            // Add other validation rules for your job fields
        ]);

        // Update the Job
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        // Delete the Job
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}


