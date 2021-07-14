<?php

namespace App\Http\Controllers;

use App\Models\SalarySlip;
use Illuminate\Http\Request;

class SalarySlipController extends Controller
{
        public function download($uuid)
    {
        $salaryslips = SalarySlip::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/salary/' . $salaryslips->filename);
        return response()->download($pathToFile);
    }

}
