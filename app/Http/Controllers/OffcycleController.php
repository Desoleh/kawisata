<?php

namespace App\Http\Controllers;

use App\Exports\OffcyclesExport;
use App\Imports\OffcyclesImport;
use App\Models\Offcycle;
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
}
