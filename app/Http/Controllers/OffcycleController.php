<?php

namespace App\Http\Controllers;

use App\Exports\OffcyclesExport;
use App\Imports\OffcyclesImport;
use App\Models\BulanGaji;
use App\Models\Offcycle;
use App\Models\Oncycle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class OffcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offcycles = Offcycle::all();
        // dd($offcycles);
        return view('offcycle.index', ['offcycles' => $offcycles]);
    }

        public function export()
    {
        return Excel::download(new OffcyclesExport, 'users.xlsx');

    }

    public function import(Request $request)
    {
        Excel::import(new OffcyclesImport(), $request->file('import_file'));
        // dd($request);


        return redirect()->route('offcycles.index');
    }

        public function cetakoffcycle(Request $request)
    {
            $submit = $request->submit;
            $keyword = $request->search;
            $oncycles = Oncycle::where([['bulan', 'like', "%" . $keyword . "%"],['nip', '=' , $nip]])->get();
            $bulangajis = BulanGaji::all();

            $headmenu = 'Data Pegawai';
            $title = 'Upah Pokok dan Tunjangan Tetap';
            $uuid =  (string)Uuid::uuid4();
            $today = Carbon::now()->locale('id_ID');

        if($submit == 1) {
            return view('user.salaryoncycles', compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title', 'headmenu', 'bulangajis'
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
                $salaryslip->filename = $nip . '-oncycle-' .  $request->search . '.pdf';
                $salaryslip->save();

                QrCode::size(100)
            ->format('svg')
            ->generate('kawisata.test' . '/salary/' . $uuid . '/download' , public_path('qrcode/'. $nip . '-oncycle-' .  $request->search . '.svg'));
            $pathToFile = storage_path('app/salary/'. $nip . '-oncycle-' .  $request->search . '.pdf');
            $pdf = PDF::loadView('user.cetakoncycle',compact([
                'oncycles','offcycles', 'total', 'totalpotongan', 'employee','totaloffcyclecc121','totalpotonganoffcycle', 'title',
                'headmenu', 'bulangajis', 'salaryslip', 'nip', 'today'
                ]));
            $pdf->save($pathToFile);
            return $pdf->download($salaryslip->filename);
            }
            else{
                return response()->Download(storage_path('app/salary/'. $salaryslip->filename));
            }
        }
    }
}
