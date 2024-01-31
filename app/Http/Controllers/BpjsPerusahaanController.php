<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BpjsPerusahaan;

class BpjsPerusahaanController extends Controller
{
    //
    public function index()
    {
        $bpjsItems = BpjsPerusahaan::all();
        return view('bpjsp.index', ['bpjsItems' => $bpjsItems]);
    }

    public function create()
    {
        return view('bpjsp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bpjs' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        BpjsPerusahaan::create([
            'nama_bpjs' => $request->input('nama_bpjs'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('bpjsp.index');
    }

    public function show($id)
    {
        $bpjsItem = BpjsPerusahaan::findOrFail($id);
        return view('bpjsp.show', ['bpjsItem' => $bpjsItem]);
    }

    public function edit($id)
    {
        $bpjsItem = BpjsPerusahaan::findOrFail($id);
        return view('bpjsp.edit', ['bpjsItem' => $bpjsItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bpjs' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        $bpjsItem = BpjsPerusahaan::findOrFail($id);
        $bpjsItem->update([
            'nama_bpjs' => $request->input('nama_bpjs'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('bpjsp.index');
    }

    public function destroy($id)
    {
        $bpjsItem = BpjsPerusahaan::findOrFail($id);
        $bpjsItem->delete();

        return redirect()->route('bpjsp.index');
    }
}
