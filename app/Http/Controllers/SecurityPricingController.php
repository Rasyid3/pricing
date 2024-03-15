<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\UMK;
use App\Models\SubJob;
use App\Models\PerlengkapanKerja;
use App\Models\AdditionalBenefit;
use App\Models\BpjsPerusahaan;

class SecurityPricingController extends Controller
{
    public function index(Request $request)
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        return view('security_pricing', ['regencies' => $regencies, 'sub' => $sub]);
    }

    public function index3()
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        $addBpjsp = BpjsPerusahaan::all();
        return view('security_pricing3', [
            'addBpjsp' => $addBpjsp,
            'regencies' => $regencies,
            'sub' => $sub,
        ]);
    }

    public function calculateBPJSValues(Request $request)
    {
        // Retrieve necessary data from session
        $gajiPokok = Session::get('gaji_pokok');

        // Retrieve additional benefit data
        $addBen = AdditionalBenefit::all();

        // Perform calculations
        $thrNom = $addBen->where('benefit', 'THR')->first()->nominal_persentase;
        $imbalanNom = $addBen->where('benefit', 'Imbalan Pasca Kerja')->first()->nominal_persentase;
        $insentifNom = $addBen->where('benefit', 'Insentif Kerja di Hari Raya')->first()->nominal_persentase;

        $thrValue = $gajiPokok / $thrNom;
        $imbalanPascaKerjaValue = $gajiPokok / $imbalanNom;
        $insentifKerjaDiHariRayaValue = $insentifNom * 5 / 12;
        $extraValue = 0;
        $subtotalb = $thrValue + $imbalanPascaKerjaValue + $insentifKerjaDiHariRayaValue + $extraValue;

        $thrValue = $this->formatCurrency($thrValue);
        $imbalanPascaKerjaValue = $this->formatCurrency($imbalanPascaKerjaValue);
        $insentifKerjaDiHariRayaValue = $this->formatCurrency($insentifKerjaDiHariRayaValue);
        $extraValue = $this->formatCurrency($extraValue);
        $subtotalb = $this->formatCurrency($subtotalb);
        Session::put('subtotalb', $subtotalb);

        return [
            'thrValue' => $thrValue,
            'imbalanPascaKerjaValue' => $imbalanPascaKerjaValue,
            'insentifKerjaDiHariRayaValue' => $insentifKerjaDiHariRayaValue,
            'extraValue' => $extraValue,
            'subtotalb' => $subtotalb,
        ];
    }


    public function index4()
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        $perlengkapanKerja = PerlengkapanKerja::all();

        $nominalKerja = PerlengkapanKerja::distinct('nomminal_persentase')->pluck('nominal_persentase');
        return view('security_pricing4', [
            'perlengkapanKerja' => $perlengkapanKerja,
            'nominalKerja' => $nominalKerja,
            'regencies' => $regencies,
            'sub' => $sub,
        ]);
    }

    public function index5()
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        $perlengkapanKerja = PerlengkapanKerja::all();
        $nominalKerja = PerlengkapanKerja::distinct('nomminal_persentase')->pluck('nominal_persentase');
        $subtotalb = Session::get('subtotalb');

        return view('security_pricing5', [
            'perlengkapanKerja' => $perlengkapanKerja,
            'nominalKerja' => $nominalKerja,
            'regencies' => $regencies,
            'sub' => $sub,
            'subtotalb' => $subtotalb,
        ]);
    }

    public function index6()
    {
        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        $perlengkapanKerja = PerlengkapanKerja::all();
        $nominalKerja = PerlengkapanKerja::distinct('nomminal_persentase')->pluck('nominal_persentase');
        return view('security_pricing6', [
            'perlengkapanKerja' => $perlengkapanKerja,
            'nominalKerja' => $nominalKerja,
            'regencies' => $regencies,
            'sub' => $sub,
        ]);
    }

    public function formatCurrency($amount)
    {
        return 'Rp. ' . number_format($amount, 0, ',', '.');
    }

    public function storeSubtotale(Request $request)
    {
        // Retrieve subtotale from the request
        $subtotale = $request->input('subtotale');

        // Store subtotale value in the session
        Session::put('subtotale', $subtotale);

        return response()->json(['success' => true]);
    }

    public function saveGajiPokok(Request $request)
    {
    $gajiPokok = $request->input('gajiPokok');

    Session::put('gaji_pokok', $gajiPokok);

    return response()->json(['success' => true]);
    }

    public function getWages(Request $request)
    {
        $subtitle = $request->input('subtitle');
        $regency = $request->input('regency');

        $umk = Umk::where('regency', $regency)->first();
        $additionalWage = SubJob::where('subtitle', $subtitle)->value('additional_wage');

        $gajiPokok = $umk->wage + $additionalWage;

        $request->session()->put('gaji_pokok', $gajiPokok);

        $tunjanganJabatan = SubJob::where('subtitle', $subtitle)->value('tunjangan_jabatan');
        $tunjanganKomunikasi = SubJob::where('subtitle', $subtitle)->value('tunjangan_komunikasi');
        $tunjanganTransportasi = SubJob::where('subtitle', $subtitle)->value('tunjangan_transportasi');
        $tunjanganMakan = SubJob::where('subtitle', $subtitle)->value('tunjangan_makan');
        $tunjanganLembur = SubJob::where('subtitle', $subtitle)->value('tunjangan_lembur');
        $tunjanganShift = SubJob::where('subtitle', $subtitle)->value('tunjangan_shift');

        $gajiTotal = $gajiPokok + $tunjanganJabatan + $tunjanganKomunikasi + $tunjanganTransportasi
                + $tunjanganMakan + $tunjanganLembur + $tunjanganShift;

        $request->session()->put('total_gaji', $gajiTotal);

        $tHR = AdditionalBenefit::where('benefit', 'THR')->value('nominal_persentase');
        $imbalanPK = AdditionalBenefit::where('benefit', 'Imbalan Pasca Kerja')->value('nominal_persentase');
        $insentifKerja = AdditionalBenefit::where('benefit', 'Insentif Kerja di Hari Raya')->value('nominal_persentase');

        $request->session()->put('t_hr', $tHR);
        $request->session()->put('imbalan_pk', $imbalanPK);
        $request->session()->put('insentif_kerja', $insentifKerja);

        $bpjsKES = BpjsPerusahaan::where('nama_bpjs', 'BPJSKES')->value('nominal_persentase');
        $bpjstkJKK = BpjsPerusahaan::where('nama_bpjs', 'BPJSTK JKK')->value('nominal_persentase');
        $bpjstkJKM = BpjsPerusahaan::where('nama_bpjs', 'BPJSTK JKM')->value('nominal_persentase');
        $bpjstkJHT= BpjsPerusahaan::where('nama_bpjs', 'BPJSTK JHT')->value('nominal_persentase');
        $bpjstkJP = BpjsPerusahaan::where('nama_bpjs', 'BPJSTK JP')->value('nominal_persentase');

        $request->session()->put('bpjs_kes', $bpjsKES);
        $request->session()->put('bpjstk_jkk', $bpjstkJKK);
        $request->session()->put('bpjstk_jkm', $bpjstkJKM);
        $request->session()->put('bpjstk_jht', $bpjstkJHT);
        $request->session()->put('bpjstk_jp', $bpjstkJP);

        $kesKaryawan = BpjsPerusahaan::where('nama_bpjs', 'KES Karyawan')->value('nominal_persentase');
        $jhtKaryawan = BpjsPerusahaan::where('nama_bpjs', 'JHT Karyawan')->value('nominal_persentase');
        $jpKaryawan = BpjsPerusahaan::where('nama_bpjs', 'JP Karyawan')->value('nominal_persentase');

        $request->session()->put('kes_karyawan', $kesKaryawan);
        $request->session()->put('jht_karyawan', $jhtKaryawan);
        $request->session()->put('jp_karyawan', $jpKaryawan);

        return response()->json([
            'umk_wage' => $umk->wage,
            'additional_wage' => $additionalWage,
            'tunjangan_jabatan' => $tunjanganJabatan,
            'tunjangan_komunikasi' => $tunjanganKomunikasi,
            'tunjangan_transportasi' => $tunjanganTransportasi,
            'tunjangan_makan' => $tunjanganMakan,
            'tunjangan_lembur' => $tunjanganLembur,
            'tunjangan_shift' => $tunjanganShift,
            'total_gaji' => $gajiTotal,
            't_hr' => $tHR,
            'imbalan_pk' => $imbalanPK,
            'insentif_kerja' => $insentifKerja,
            'bpjs_kes' => $bpjsKES,
            'bpjstk_jkk' => $bpjstkJKK,
            'bpjstk_jkm' => $bpjstkJKM,
            'bpjstk_jht' => $bpjstkJHT,
            'bpjstk_jp' => $bpjstkJP,
            'kes_karyawan' => $kesKaryawan,
            'jht_karyawan' => $jhtKaryawan,
            'kes_karyawan' => $jpKaryawan,
        ]);
    }


}
