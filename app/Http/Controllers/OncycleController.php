<?php

namespace App\Http\Controllers;

use App\Exports\OncyclesExport;
use App\Imports\OncyclesImport;
use App\Models\Oncycle;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OncycleController extends Controller
{
    public function index()
    {
        $oncycles = Oncycle::all();
        return view('oncycle.index', ['oncycles' => $oncycles]);
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

    public function destroy(Oncycle $oncycle)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $oncycle->delete();

        return redirect()->route('oncycles.index')
                        ->with('success','User deleted successfully');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Oncycle::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);

	}
}
