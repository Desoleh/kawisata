<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\DashboardEmployee;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

            $data1 = DashboardEmployee::where('jenis',1)->orderby('urutan')->get();
            $data2 = DashboardEmployee::where('jenis',2)->orderby('urutan')->get();
            $kedudukan = DashboardEmployee::select('kedudukan')
                ->where('jenis',2)
                ->orderby('urutan')
                ->get()
                ->toArray();
            // dd($kedudukan);
            $jumlah = DashboardEmployee::select('jumlah')
                ->where('jenis',2)
                ->orderby('urutan')
                ->get()
                ->toArray();

            $kantorpusat    = DashboardEmployee::where('kedudukan','Kantor Pusat')->first();
            $perbantuan     = DashboardEmployee::where('kedudukan','Perbantuan')->first();
            $mandiri        = DashboardEmployee::where('kedudukan','Mandiri')->first();
            $pkwt     = DashboardEmployee::where('kedudukan','PKWT')->first();
            $frontliner     = DashboardEmployee::where('kedudukan','Frontliner')->first();
            $title = 'Beranda';
            return view('user.index', compact(['data1', 'data2', 'kedudukan', 'jumlah', 'kantorpusat',
            'perbantuan', 'mandiri', 'pkwt', 'frontliner',  'title']));

    }

    public function show()
    {
        $judulhalaman = "Profil Pegawai";
        $nip = Auth::user()->nip;
        $documents = Document::where('nip', $nip)->where('category','foto')->latest()->first();
        $akte = Document::where('nip', $nip)->where('category','akte')->latest()->first();
        $ktp = Document::where('nip', $nip)->where('category','ktp')->latest()->first();
        $kk = Document::where('nip', $nip)->where('category','kk')->latest()->first();
        $employee = Employee::where('nip', $nip)->first();
        $account = Account::where('nip', $nip)->first();
        $position = Position::where('holder_id', $nip)->first();
        $headmenu = 'Data Pegawai';
        $title = 'Profil Pegawai';

        return view('user.profile', compact(['judulhalaman','nip','employee','documents', 'title', 'headmenu', 'account', 'position','ktp','kk','akte' ]));
    }

    public function simpanphoto(Request $request){
        request()->validate([
            'photoprofile'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $uid = $request->nip;
        $employee = Employee::where('nip',$uid)->first();
        $photolama = $employee->photo;
        if($files = $request->file('photoprofile')){
            $photo = $request->file('photoprofile');
            $photobaru = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/userimage', $photobaru));
        }
        $employee->photo = $photobaru;
        $employee->save();
        return Response()->json("sukses");


    }

    public function inforekan()
    {
        $employees = DB::table('employees')
            ->join('positions','positions.holder_id','=','employees.nip')
            ->select('employees.nip','employees.nama','positions.name')
            ->get();
        // dd($employees);
        return view('user.inforekan',compact(['employees']));
    }



}
