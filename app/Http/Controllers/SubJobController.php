<?php
// app/Http/Controllers/SubJobController.php

// app/Http/Controllers/SubJobController.php

namespace App\Http\Controllers;

use App\Models\SubJob;
use Illuminate\Http\Request;

class SubJobController extends Controller
{
    public function index()
    {
        $subJobs = SubJob::all();
        return view('sub_jobs.index', compact('subJobs'));
    }

    public function show(SubJob $subJob)
    {
        return view('sub_jobs.show', compact('subJob'));
    }

    public function create()
    {
        return view('sub_jobs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subtitle' => 'required',
            'job_id' => 'required|numeric',
            'additional_wage' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
            'tunjangan_komunikasi' => 'required|numeric',
            'tunjangan_transportasi' => 'required|numeric',
            'tunjangan_makan' => 'required|numeric',
            'tunjangan_lembur' => 'required|numeric',
            'tunjangan_shift' => 'required|numeric',
        ]);

        SubJob::create($validatedData);

        return redirect()->route('sub_jobs.index')->with('success',
        'SubJob created successfully');
    }

    public function edit(SubJob $subJob)
    {
        return view('sub_jobs.edit', compact('subJob'));
    }

    public function update(Request $request, SubJob $subJob)
    {
        $validatedData = $request->validate([
            'subtitle' => 'required',
            'job_id' => 'required|numeric',
            'additional_wage' => 'required|numeric',
            'tunjangan_jabatan' => 'required|numeric',
            'tunjangan_komunikasi' => 'required|numeric',
            'tunjangan_transportasi' => 'required|numeric',
            'tunjangan_makan' => 'required|numeric',
            'tunjangan_lembur' => 'required|numeric',
            'tunjangan_shift' => 'required|numeric',
        ]);

        $subJob->update($validatedData);

        return redirect()->route('sub_jobs.index')->with('success',
         'SubJob updated successfully');
    }

    public function destroy(SubJob $subJob)
    {
        $subJob->delete();

        return redirect()->route('sub_jobs.index')->with('success', 'SubJob deleted successfully');
    }
}

