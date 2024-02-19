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

    public function index2(Request $request)
    {

        $regencies = UMK::distinct('regency')->pluck('regency');
        $sub = SubJob::distinct('subtitle')->pluck('subtitle');
        $addBen = AdditionalBenefit::all();

        return view('security_pricing2', [
            'addBen' => $addBen,
            'regencies' => $regencies,
            'sub' => $sub,
        ]);
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
        return view('security_pricing5', [
            'perlengkapanKerja' => $perlengkapanKerja,
            'nominalKerja' => $nominalKerja,
            'regencies' => $regencies,
            'sub' => $sub,
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

    public function processForm(Request $request)
    {
        $subtitle = $request->input('subtitle');
        $regency = $request->input('regency');
        $totalGaji1 = $request->input('total_gaji');

        $umk = Umk::where('regency', $regency)->first();
        $additionalWage = SubJob::where('subtitle', $subtitle)->value('additional_wage');

        $gajiPokok = $umk->wage + $additionalWage;
        $totalGaji1 = 1000;
        $request->session()->put('gaji_pokok', $gajiPokok);
        $request->session()->put('total_gaji', $totalGaji1);

        Log::info('Gaji Pokok:', ['gaji_pokok' => $gajiPokok]);
        Log::info('Total Gaji:', ['total_gaji' => $totalGaji1]);

        return view('security_pricing2', compact('gajiPokok', 'totalGaji1', 'token'));
    }

    public function processFormP2(Request $request)
    {
        $subtitle = $request->input('subtitle');
        $regency = $request->input('regency');

        $umk = Umk::where('regency', $regency)->first();
        $additionalWage = SubJob::where('subtitle', $subtitle)->value('additional_wage');

        $gajiPokok = $umk->wage + $additionalWage;
        $request->session()->put('gaji_pokok', $gajiPokok);
        $request->session()->put('display_gaji_pokok', $subtotalB);

        return view('security_pricing3', compact('gajiPokok', 'subtotalB'));
    }

    public function processForm2(Request $request)
    {
        $subtitle = $request->input('subtitle');
        $regency = $request->input('regency');

        $umk = Umk::where('regency', $regency)->first();
        $additionalWage = SubJob::where('subtitle', $subtitle)->value('additional_wage');

        $gajiPokok = $umk->wage + $additionalWage;
        $request->session()->put('gaji_pokok', $gajiPokok);

        return view('security_pricing4', compact('gajiPokok'));
    }

    public function processForm3(Request $request)
    {
        return view('security_pricing5');
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
    public function storeTotalGaji(Request $request)
{
    try {
        $request->session()->put('total_gaji', $request->total_gaji);
        return response()->json(['message' => 'Total Gaji stored in session']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
private function generateToken($request, $tokenName)
    {
        if (!$request->session()->has($tokenName)) {
            $token = uniqid();
            $request->session()->put($tokenName, $token);
        } else {
            $token = $request->session()->get($tokenName);
        }
        return $token;
    }

    private function validateAccess($request, $requiredToken)
    {
        return $request->session()->has($requiredToken);
    }

}
