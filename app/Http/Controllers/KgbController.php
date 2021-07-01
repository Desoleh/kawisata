<?php

namespace App\Http\Controllers;

use App\Imports\KgbImport;
use App\Models\Kgb;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KgbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kgbs = Kgb::all();

        return view('kgb.index', compact(['kgbs']));
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
     * @param  \App\Models\Kgb  $kgb
     * @return \Illuminate\Http\Response
     */
    public function show(Kgb $kgb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kgb  $kgb
     * @return \Illuminate\Http\Response
     */
    public function edit(Kgb $kgb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kgb  $kgb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kgb $kgb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kgb  $kgb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kgb $kgb)
    {
        //
    }

        public function import(Request $request)
    {
        Excel::import(new KgbImport(), $request->file('import_file'));



        return redirect()->route('kgb.index');
    }
}
