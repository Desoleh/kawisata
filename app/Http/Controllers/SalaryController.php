<?php

namespace App\Http\Controllers;

use App\Models\BulanGaji;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Offcycle;
use App\Models\Oncycle;
use App\Models\SalarySlip;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

            $bulanoncycles = Oncycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();
            $bulanoffcycles = Offcycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();

        $headmenu = 'Data Pegawai';
        $title = 'Upah Pokok dan Tunjangan Tetap';


            return view('user.salary', compact(['employee','title','headmenu',  'bulanoffcycles','bulanoncycles']));
    }

    public function search(Request $request)
    {
            $submit = $request->submit;
            $nip = Auth::user()->nip;
            $employee = DB::table('employees')
                ->join('documents','documents.nip', '=','employees.nip')
                ->join('accounts','accounts.nip','=','employees.nip')
                ->select('employees.*','documents.photo', 'accounts.npwp')
                ->where('employees.nip',$nip)
                ->first();
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $bulanoncycles = Oncycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();
            $bulanoffcycles = Offcycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();
            // dd($bulanoncycles);
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
                    tunj_kurang_bayar +
                    IFNULL(t_direksi,0) +
                    IFNULL(t_perumahan_direksi,0)'));
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

            $headmenu = 'Data Pegawai';
            $title = 'Upah Pokok dan Tunjangan Tetap';
            $uuid =  (string)Uuid::uuid4();
            $today = Carbon::now()->locale('id_ID');

        if($submit == 1) {
            $this->validate($request, [
            'search' => 'required',
            ]);            return view('user.salaryoncycles', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121',
                'totalpotonganoffcycle', 'title', 'headmenu', 'bulanoffcycles','bulanoncycles'
                ]));
        }elseif($submit == 2) {
            $this->validate($request, [
            'search' => 'required',
            ]);

            $salaryslip = SalarySlip::where(['type' => 'oncycle', 'nip' => $nip, 'monthyear'=> $request->search])->first();
            if ($salaryslip === null){
                $uuid = (string)Uuid::uuid4();
                $salaryslip = new SalarySlip();
                $salaryslip->type = 'oncycle';
                $salaryslip->nip = $nip;
                $salaryslip->monthyear = $request->search;
                $salaryslip->uuid = $uuid;
                $salaryslip->filename = 'oncycle/' . $uuid . '/view';
                $salaryslip->save();

                QrCode::size(100)
            ->format('svg')
            ->generate('sdm.kawisata.id:8000/oncycle/' . $uuid . '/view' , storage_path('app/public/qrcode/'. $nip . '-oncycle-' .  $request->search . '.svg'));

            // $pathToFile = storage_path('app/public/salary/'. $nip . '-oncycle-' .  $request->search . '.pdf');
            // $pdf = PDF::loadView('salary.oncycle.cetakoncyclepdf',compact([
            //     'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
            //     'headmenu', 'bulanoncycles', 'bulanoffcycles', 'salaryslip', 'nip', 'today', 'keyword'
            //     ]));
            //Aktifkan Local File Access supaya bisa pakai file external ( cth File .CSS )
            // $pdf->setOption('enable-local-file-access', true);
            // $pdf->save($pathToFile);
            // return $pdf->download($salaryslip->filename);
            return view('salary.oncycle.cetakoncycle3',compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
                'headmenu', 'bulanoncycles', 'bulanoffcycles', 'salaryslip', 'nip', 'today', 'keyword'
                ]));
            }
            else{
            return view('salary.oncycle.cetakoncycle3',compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
                'headmenu', 'bulanoncycles', 'bulanoffcycles', 'salaryslip', 'nip', 'today', 'keyword'
                ]));
            }
        }
    }

    public function searchoffcycle(Request $request)
    {
            $submit = $request->submit;
            $nip = Auth::user()->nip;
            $employee = DB::table('employees')
                ->join('documents','documents.nip', '=','employees.nip')
                ->join('accounts','accounts.nip','=','employees.nip')
                ->select('employees.*','documents.photo', 'accounts.npwp')
                ->where('employees.nip',$nip)
                ->first();
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $offcycles = Offcycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->first();
            $bulanoncycles = Oncycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();
            $bulanoffcycles = Offcycle::select('bulan')->distinct()
            ->where('nip', $nip)
            ->get();

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

            $headmenu = 'Data Pegawai';
            $title = 'Tunjangan Tidak Tetap';
            $uuid =  (string)Uuid::uuid4();
            $today = Carbon::now()->locale('id_ID');

        if($submit == 1) {
            $this->validate($request, [
            'search' => 'required',
            ]);            return view('user.salaryoffcycles', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee',
                'totaloffcyclecc121','totalpotonganoffcycle', 'title', 'headmenu',
                'bulanoncycles', 'bulanoffcycles'
        ]));
        }elseif($submit == 2) {
            $this->validate($request, [
            'search' => 'required',
            ]);

            $salaryslip = SalarySlip::where(['type' => 'offcycle', 'nip' => $nip, 'monthyear'=> $request->search])->first();
            if ($salaryslip === null){
                $uuid = (string)Uuid::uuid4();
                $salaryslip = new SalarySlip();
                $salaryslip->type = 'offcycle';
                $salaryslip->nip = $nip;
                $salaryslip->monthyear = $request->search;
                $salaryslip->uuid = $uuid;
                $salaryslip->filename = $nip . '-offcycle-' .  $request->search . '.pdf';
                $salaryslip->save();

                QrCode::size(100)
            ->format('svg')
            ->generate('sdm.kawisata.id:8000/offcycle/' . $uuid . '/view' , storage_path('app/public/qrcode/'. $nip . '-offcycle-' .  $request->search . '.svg'));

            return view('salary.offcycle.cetakoffcycle3',compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
                'headmenu', 'bulanoncycles', 'bulanoffcycles', 'salaryslip', 'nip', 'today', 'keyword'
                ]));
            }
            else{
                return view('salary.offcycle.cetakoffcycle3',compact([
                    'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
                    'headmenu', 'bulanoncycles', 'bulanoffcycles', 'salaryslip', 'nip', 'today', 'keyword'
                    ]));
                }
        }
    }

}
