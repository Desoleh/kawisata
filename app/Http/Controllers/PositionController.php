<?php

namespace App\Http\Controllers;

use App\Exports\PositionsExport;
use App\Imports\PositionsImport;
use App\Models\Position;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        // dd($oncycles);
        return view('positions.index', ['positions' => $positions]);
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
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }

    public function export()
    {
        return Excel::download(new PositionsExport, 'users.xlsx');

    }

    public function import(Request $request)
    {
        Excel::import(new PositionsImport(), $request->file('import_file'));
        // dd($request);


        return redirect()->route('positions.index');
    }

    public function manageCategory()

    {

        $positions = Position::where('parent_id', '=', 0)->get();

        $allpositions = Position::pluck('name','id')->all();
        // dd($allpositions);

        $headmenu = 'Struktur Organisasi';
        $title = 'Struktur Organisasi';

        return view('user.struktur',compact('positions','allpositions','headmenu','title'));

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function addCategory(Request $request)

    {

        $this->validate($request, [

        		'title' => 'required',

        	]);

        $input = $request->all();

        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];



        Position::create($input);

        return back()->with('success', 'New Position added successfully.');

    }
}
