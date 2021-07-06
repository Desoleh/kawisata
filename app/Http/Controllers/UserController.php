<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('user')) {
            $nip = Auth::user()->nip;
            $documents = Document::where('nip', $nip)->first();
            $employees = Employee::where('nip', $nip)->first();
            $title = 'Beranda';
            return view('user.index', compact(['employees','documents', 'title']));
        } else {
            return redirect('/');
        }
    }

    public function show()
    {
        $judulhalaman = "Profil Pegawai";
        $nip = Auth::user()->nip;
        $documents = Document::where('nip', $nip)->latest()->first();
        $employee = Employee::where('nip', $nip)->first();
        
        $headmenu = 'Data Pegawai';
        $title = 'Profil Pegawai';
        // dd($documents);
        return view('user.profile', compact(['judulhalaman','nip','employee','documents', 'title', 'headmenu' ]));
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





}
