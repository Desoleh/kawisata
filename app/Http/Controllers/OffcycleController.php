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
     * @param  \App\Models\Offcycle  $offcycle
     * @return \Illuminate\Http\Response
     */
    public function show(Offcycle $offcycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offcycle  $offcycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Offcycle $offcycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offcycle  $offcycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offcycle $offcycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offcycle  $offcycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offcycle $offcycle)
    {
        //
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
