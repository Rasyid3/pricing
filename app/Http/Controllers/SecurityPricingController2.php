<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Security;
use App\Models\AdditionalBenefit;
use Illuminate\Support\Facades\Session;


class SecurityPricingController2 extends Controller
{

    public function index(Request $request)
    {
        $addBen = AdditionalBenefit::all();
        $additionalBenefits = $this->calculateAdditionalBenefits($request);

        return view('security_pricing2', [
            'addBen' => $addBen,
            'thrValue' => $additionalBenefits['thrValue'],
            'imbalanPascaKerjaValue' => $additionalBenefits['imbalanPascaKerjaValue'],
            'insentifKerjaDiHariRayaValue' => $additionalBenefits['insentifKerjaDiHariRayaValue'],
            'extraValue' => $additionalBenefits['extraValue'],
            'subtotalb' => $additionalBenefits['subtotalb'],

        ]);
    }


    public function calculateAdditionalBenefits(Request $request)
    {
        // Retrieve necessary data from session
        $gajiPokok = Session::get('gaji_pokok');

        // Retrieve additional benefit data
        $addBen = AdditionalBenefit::all();

        // Perform calculations
        $thrNom = $addBen->where('benefit', 'THR')->first()->nominal_persentase;
        $imbalanNom = $addBen->where('benefit', 'Imbalan Pasca Kerja')->first()->nominal_persentase;
        $insentifNom = $addBen->where('benefit', 'Insentif Kerja di Hari Raya')->first()->nominal_persentase;

        $thrValue = round($gajiPokok / $thrNom);
        $imbalanPascaKerjaValue = round($gajiPokok / $imbalanNom);
        $insentifKerjaDiHariRayaValue = round($insentifNom * 5 / 12);
        $extraValue = 0;
        $subtotalb = $thrValue + $imbalanPascaKerjaValue + $insentifKerjaDiHariRayaValue + $extraValue;

        // $thrValue = $this->formatCurrency($thrValue);
        // $imbalanPascaKerjaValue = $this->formatCurrency($imbalanPascaKerjaValue);
        // $insentifKerjaDiHariRayaValue = $this->formatCurrency($insentifKerjaDiHariRayaValue);
        // $extraValue = $this->formatCurrency($extraValue);
        // $subtotalb = $this->formatCurrency($subtotalb);
        Session::put('subtotalbSession', $subtotalb);

        return [
            'thrValue' => $thrValue,
            'imbalanPascaKerjaValue' => $imbalanPascaKerjaValue,
            'insentifKerjaDiHariRayaValue' => $insentifKerjaDiHariRayaValue,
            'extraValue' => $extraValue,
            'subtotalb' => $subtotalb,
        ];
    }

    public function formatCurrency($amount)
    {
        return 'Rp. ' . number_format($amount, 0, ',', '.');
    }


}
