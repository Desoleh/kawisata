<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use App\Models\Offcycle;
use App\Models\Oncycle;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $total;

    public function index()
    {

            $nip = Auth::user()->nip;

            $employee = Employee::where('nip', $nip)->first();
            $document = Document::where('nip', $nip)->latest()->first();

            $oncycles = Oncycle::where('nip', $nip)->latest()->get();
            $offcycles = Offcycle::where('nip', $nip)->latest()->get();
// dd($document);
            $total = DB::table('oncycles')
                ->where([
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



            return view('user.salary', compact(['oncycles', 'offcycles','employee', 'total','document']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function show(oncycle $oncycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function edit(oncycle $oncycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, oncycle $oncycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(oncycle $oncycle)
    {
        //
    }

    public function search(Request $request)
    {
            $nip = Auth::user()->nip;
            $employee = Employee::where('nip', $nip)->first();
            $document = Document::where('nip', $nip)->latest()->first();
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();

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



            if($request->has('download'))
                {
                    $pdf = PDF::loadView('user.cetakoncycle',compact('oncycles','total'));
                    // dd($pdf);
                    // return $pdf->stream();
                    return $pdf->download('pdfview.pdf');

                }

            // dd($total);

            return view('user.salaryoncycles', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','document','totaloffcyclecc121','totalpotonganoffcycle'
                ]));
    }

        public function cetakoncycle(Request $request)
    {
            $nip = Auth::user()->nip;
            $employee = Employee::where('nip', $nip)->first();
            $document = Document::where('nip', $nip)->latest()->first();
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();
            $offcycles = Offcycle::where('bulan', 'like', "%" . $keyword . "%")->get();

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

            $totaloffcyclecc121 = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('tunjangan_transport +
                    tunjangan_komunikasi +
                    tunjangan_jabatan +
                    tunjangan_keahlian +
                    prestasi +
                    shift_allowance +
                    best_performance +
                    lembur
                    '));

            $totalpotongan = DB::table('oncycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('jht_jwasraya_iur_persh_12_5+
                    jht_jwasraya_iur_pekerja_4_75+
                    jht_bpjs_iur_persh_3_7+
                    jht_bpjs_iur_pekerja_2+
                    jp_bpjs_iur_persh_2+
                    jp_bpjs_iur_pekerja_1+
                    jk_bpjs_iur_persh_0_3+
                    jpk_bpjs_mand_iur_persh+
                    jpk_bpjs_mand_iur_pekerja+
                    jpk_bpjs_iur_persh_4+
                    jpk_bpjs_iur_pekerja_1+
                    jpk_pensiunan_iur_persh_2+
                    jpk_pensiunan_iur_pekerja_2+
                    jpk_uk_iur_pekerja_1+
                    tht_taspen_iur_pekerja_3_25+
                    iur_spka+
                    pot_sewa_rumah_dinas+
                    simpanan_baitul_ridho+
                    cicilan_baitul_ridho+
                    total_pajak-
                    admin_oncycle-
                    pot_lain'));

            $totalpotonganoffcycle = DB::table('offcycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('potongan_lain +
                    admin_bank +
                    penalty
                    '));




            $pdf = PDF::loadView('user.cetakoncycle',compact(
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','document','totaloffcyclecc121','totalpotonganoffcycle'));
    	return $pdf->stream();
    }

        public function searchoffcycle(Request $request)
    {
            $nip = Auth::user()->nip;
            $employee = Employee::where('nip', $nip)->first();
            $document = Document::where('nip', $nip)->latest()->first();
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();

            $total = DB::table('oncycles')
                ->where([
                ['bulan', 'like', "%" . $keyword . "%"],
                ['nip', '=' , $nip]])
                ->sum(DB::raw('IFNULL(upah_pokok,0)  +
                    IFNULL(honorarium_pkwt,0)  +
                    IFNULL(tunj_perumahan,0)  +
                    IFNULL(tunj_adm_bank,0)  +
                    IFNULL(jht_bpjs_iur_persh_3_7,0)  +
                    IFNULL(jp_bpjs_iur_persh_2,0)  +
                    IFNULL(jkk_bpjs_iur_persh_1_27,0)  +
                    IFNULL(jk_bpjs_iur_persh_0_3,0)  +
                    IFNULL(jht_jwasraya_iur_persh_12_5,0)  +
                    IFNULL(jpk_bpjs_mand_iur_persh,0)  +
                    IFNULL(jpk_bpjs_iur_persh_4,0)  +
                    IFNULL(jpk_pensiunan_iur_persh_2,0)  +
                    IFNULL(total_pajak,0)  +
                    IFNULL(tunj_kurang_bayar,0)'));

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


            if($request->has('download'))
                {
                    $pdf = PDF::loadView('user.cetakoncycle',compact('oncycles','total'));
                    // dd($pdf);
                    // return $pdf->stream();
                    return $pdf->download('pdfview.pdf');

                }

            // dd($total);

            return view('user.salaryoffcycle', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','document','totaloffcyclecc121','totalpotonganoffcycle'
                ]));
    }
}
