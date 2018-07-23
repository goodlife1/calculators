<?php

namespace App\Http\Controllers;

use App\Traits\Mortgage;
use Illuminate\Http\Request;

class FinanceCalculatorController extends Controller
{
    use Mortgage;

    public function mortgageCalculator(Request $request)
    {
        return $this->mortgageShadule($request);
    }

    public function paymentCalc(Request $request)
    {


        $data = $this->paymantShadule($request);
        return $data;
    }

}
