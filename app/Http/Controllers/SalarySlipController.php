<?php

namespace App\Http\Controllers;

use App\Models\Offcycle;
use App\Models\Oncycle;
use App\Models\SalarySlip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalarySlipController extends Controller
{
    public function download($uuid)
    {
        $salaryslips = SalarySlip::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/salary/' . $salaryslips->filename);
        return response()->download($pathToFile);
    }

    public function viewoncycle($uuid)
    {
            $salaryslip = SalarySlip::where('uuid',$uuid)->first();
            $nip = $salaryslip->nip;
            $employee = DB::table('employees')
                ->join('accounts','accounts.nip','=','employees.nip')
                ->select('accounts.npwp')
                ->where('employees.nip',$nip)
                ->first();
            $keyword = $salaryslip->monthyear;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            // dd($oncycles);
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $total = DB::table('oncycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('upah_pokok +
                    honorarium_pkwt +
                    tunj_perumahan +
                    tunj_adm_bank +
                    jht_bpjs_iur_persh_3_7 +
                    jp_bpjs_iur_persh_2 +
                    jkk_bpjs_iur_persh_1_27 +
                    jk_bpjs_iur_persh_0_3 +
                    jht_jwasraya_iur_persh_12_5 +
                    jpk_bpjs_mand_iur_persh +
                    jpk_bpjs_iur_persh_4 +
                    jpk_pensiunan_iur_persh_2 +
                    total_pajak +
                    tunj_kurang_bayar'));
            // dd($total);
            $totaloffcyclecc121 = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(tunjangan_transport,0) +
                    IFNULL(tunjangan_komunikasi,0) +
                    IFNULL(tunjangan_jabatan,0) +
                    IFNULL(tunjangan_keahlian,0) +
                    IFNULL(prestasi,0) +
                    IFNULL(shift_allowance,0) +
                    IFNULL(best_performance,0) +
                    IFNULL(lembur,0)'
                    ));

            $totalpotongan = DB::table('oncycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(jht_jwasraya_iur_persh_12_5,0) +
                    IFNULL(jht_jwasraya_iur_pekerja_4_75,0) +
                    IFNULL(jht_bpjs_iur_persh_3_7,0) +
                    IFNULL(jht_bpjs_iur_pekerja_2,0) +
                    IFNULL(jp_bpjs_iur_persh_2,0) +
                    IFNULL(jp_bpjs_iur_pekerja_1,0) +
                    IFNULL(jk_bpjs_iur_persh_0_3,0) +
                    IFNULL(jpk_bpjs_mand_iur_persh,0) +
                    IFNULL(jpk_bpjs_mand_iur_pekerja,0) +
                    IFNULL(jpk_bpjs_iur_persh_4,0) +
                    IFNULL(jpk_bpjs_iur_pekerja_1,0) +
                    IFNULL(jpk_pensiunan_iur_persh_2,0) +
                    IFNULL(jpk_pensiunan_iur_pekerja_2,0) +
                    IFNULL(jpk_uk_iur_pekerja_1,0) +
                    IFNULL(tht_taspen_iur_pekerja_3_25,0) +
                    IFNULL(iur_spka,0) +
                    IFNULL(pot_sewa_rumah_dinas,0) +
                    IFNULL(simpanan_baitul_ridho,0) +
                    IFNULL(cicilan_baitul_ridho,0) +
                    IFNULL(total_pajak,0) +
                    IFNULL(admin_oncycle,0) +
                    IFNULL(pot_lain,0)'));

            $totalpotonganoffcycle = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(admin_bank,0) + IFNULL(potongan_lain,0) + IFNULL(penalty,0)'
                    ));

            return view('salary.oncycle.viewoncycle', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121',
                'totalpotonganoffcycle', 'nip', 'keyword', 'salaryslip'
                ]));

    }

    public function viewoffcycle($uuid)
    {
            $salaryslip = SalarySlip::where('uuid',$uuid)->first();
            $nip = $salaryslip->nip;
            $employee = DB::table('employees')
                ->join('accounts','accounts.nip','=','employees.nip')
                ->select('accounts.npwp')
                ->where('employees.nip',$nip)
                ->first();
            $keyword = $salaryslip->monthyear;
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $totaloffcyclecc121 = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(tunjangan_transport,0) +
                    IFNULL(tunjangan_komunikasi,0) +
                    IFNULL(tunjangan_jabatan,0) +
                    IFNULL(tunjangan_keahlian,0) +
                    IFNULL(prestasi,0) +
                    IFNULL(shift_allowance,0) +
                    IFNULL(best_performance,0) +
                    IFNULL(lembur,0)'
                    ));
            $totalpotonganoffcycle = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(admin_bank,0) + IFNULL(potongan_lain,0) + IFNULL(penalty,0)'
                    ));

            return view('salary.offcycle.viewoffcycle', compact([
                'oncycles','offcycles', 'employee','totaloffcyclecc121',
                'totalpotonganoffcycle', 'nip', 'keyword', 'salaryslip'
                ]));

    }
}
