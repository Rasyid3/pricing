<?php

namespace App\Http\Controllers;

use App\Models\AdditionalBenefit;
use Illuminate\Http\Request;

class AdditionalBenefitController extends Controller
{
    //
    public function index()
    {
        $benefitItems = AdditionalBenefit::all();
        return view('benefit.index', ['benefitItems' => $benefitItems]);
    }

    public function create()
    {
        return view('benefit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'benefit' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        AdditionalBenefit::create([
            'benefit' => $request->input('benefit'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('benefit.index');
    }

    public function show($id)
    {
        $benefitItem = AdditionalBenefit::findOrFail($id);
        return view('benefit.show', ['benefitItem' => $benefitItem]);
    }

    public function edit($id)
    {
        $benefitItem = AdditionalBenefit::findOrFail($id);
        return view('benefit.edit', ['benefitItem' => $benefitItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'benefit' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        $benefitItem = AdditionalBenefit::findOrFail($id);
        $benefitItem->update([
            'benefit' => $request->input('benefit'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('benefit.index');
    }

    public function destroy($id)
    {
        $benefitItem = AdditionalBenefit::findOrFail($id);
        $benefitItem->delete();

        return redirect()->route('benefit.index');
    }
}
