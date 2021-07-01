<?php

namespace App\Http\Controllers;

use App\Exports\OncyclesExport;
use App\Imports\OncyclesImport;
use App\Models\Oncycle;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class OncycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oncycles = Oncycle::all();
        // dd($oncycles);
        return view('oncycle.index', ['oncycles' => $oncycles]);
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
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function show(Oncycle $oncycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Oncycle $oncycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oncycle $oncycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oncycle  $oncycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oncycle $oncycle)
    {
        //
    }

    public function export()
    {
        return Excel::download(new OncyclesExport, 'users.xlsx');

    }

    public function import(Request $request)
    {
        Excel::import(new OncyclesImport(), $request->file('import_file'));
        // dd($request);


        return redirect()->route('oncycles.index');
    }
}
