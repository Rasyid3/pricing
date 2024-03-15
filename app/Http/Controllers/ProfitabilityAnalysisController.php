<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfitabilityAnalysisController extends Controller
{
    public function index()
    {
        return view('profitability-analysis');
    }


    public function save(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'ams' => 'required|string',
            'customer' => 'required|string',
            'revision' => 'required|string',
            'cost' => 'required|numeric', // Menambahkan validasi untuk cost
            // Tambahkan aturan validasi untuk bidang lainnya sesuai kebutuhan
        ]);

        // Mengambil nilai cost dari request
        $cost = $request->cost;

        // Menghitung manfee (8% dari cost)
        $manfee = $cost * 0.08;

        // Simpan data ke dalam session atau database
        // Misalnya, jika Anda menyimpannya dalam session:
        $request->session()->put('profitability_data', [
            'ams' => $request->ams,
            'customer' => $request->customer,
            'revision' => $request->revision,
            'cost' => $cost,
            'manfee' => $manfee,
            // Masukkan field lainnya dengan cara yang sama
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/profitability-analysis')->with('success', 'Data berhasil disimpan!');
    }

    public function formatCurrency($amount)
{
    return 'Rp. ' . number_format($amount, 0, ',', '.');
}

}
