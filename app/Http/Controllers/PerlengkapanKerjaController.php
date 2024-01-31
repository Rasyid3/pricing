<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerlengkapanKerja;

class PerlengkapanKerjaController extends Controller
{
    //
    public function index()
    {
        $perlengkapanItems = PerlengkapanKerja::all();
        return view('perlengkapan.index', ['perlengkapanItems' => $perlengkapanItems]);
    }

    public function create()
    {
        return view('perlengkapan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'perlengkapan' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        PerlengkapanKerja::create([
            'perlengkapan' => $request->input('perlengkapan'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('perlengkapan_kerja.index');
    }

    public function show($id)
    {
        $perlengkapanItem = PerlengkapanKerja::findOrFail($id);
        return view('perlengkapan.show', ['perlengkapanItem' => $perlengkapanItem]);
    }

    public function edit($id)
    {
        $perlengkapanItem = PerlengkapanKerja::findOrFail($id);
        return view('perlengkapan.edit', ['perlengkapanItem' => $perlengkapanItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'perlengkapan' => 'required',
            'nominal_persentase' => 'required|numeric',
        ]);

        $perlengkapanItem = PerlengkapanKerja::findOrFail($id);
        $perlengkapanItem->update([
            'perlengkapan' => $request->input('perlengkapan'),
            'nominal_persentase' => $request->input('nominal_persentase'),
        ]);

        return redirect()->route('perlengkapan.index');
    }

    public function destroy($id)
    {
        $perlengkapanItem = PerlengkapanKerja::findOrFail($id);
        $perlengkapanItem->delete();

        return redirect()->route('perlengkapan.index');
    }
}
