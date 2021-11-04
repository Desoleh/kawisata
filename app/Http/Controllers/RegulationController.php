<?php

namespace App\Http\Controllers;

use App\Imports\RegulationImport;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Regulation;
use App\Models\RegulationChange;
use App\Models\RegulationFile;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;

class RegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Employee::where('nip', Auth::user()->nip)->pluck('jenis_pangkat');
        $categories = Category::withCount('regulations')->get();
        $regulations = Regulation::where('grade', $grade)
        ->orwhere('grade','all')
        ->latest();
        // dd($grade);

        if(request('search')) {
            $regulations->where('judul', 'like', '%' . request('search') . '%');
        }

        return view('regulations.index', [
            "regulations" => $regulations->paginate(8),"categories" => $categories
        ]
        );
    }

    public function index1()
    {
        $categories = Category::withCount('regulations')->get();
        $regulations = Regulation::latest();

        if(request('search')) {
            $regulations->where('judul', 'like', '%' . request('search') . '%');
        }

        return view('regulations.index1', [
            "regulations" => $regulations->paginate(8),"categories" => $categories
        ]
        );
    }

    public function indexadmin()
    {
        $regulations = Regulation::latest();

        return view('regulations.index-admin', [
            "regulations" => $regulations->get()
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function compose()
    {
        $regulations = Regulation::all();
        $categories = Category::all();
        return view('regulations.create',compact('regulations','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            // 'files' => 'required',
            'files.*' => 'mimes:csv,txt,xlsx,xls,pdf,doc,docx'

        ]);
        $data = $request->all();
        $regulations = new Regulation();
        $regulations->uuid = (string)Uuid::uuid4();
        $regulations->kode  = $data['kode'];
        $regulations->judul = $data['judul'];
        $regulations->category  = $data['category_id'] ?? null;
        $regulations->nomor = $data['nomor'];
        $regulations->tahun = $data['tahun'];
        $regulations->grade    = $data['grade'];
        $regulations->tgl_penetapan = $data['tgl_penetapan'];
        $regulations->tgl_efektif   = $data['tgl_efektif'];
        $regulations->konseptor = $data['konseptor'];
        $regulations->diubah    = $data['diubah'] ?? null;
        $regulations->status    = $data['status'];
        $regulations->keterangan    = $data['keterangan'];
        $regulations->save();

       if($request->hasfile('files'))
         {
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                $unique_name = md5($name. time());
                $path = $file->storeAs('public/files', $unique_name . 'tanda.' . $file->extension());
                $document[$key]['name'] = $unique_name . 'tanda.' . $file->extension();
                $document[$key]['path'] = $path;
                $document[$key]['uuid'] = (string)Uuid::uuid4();
                $document[$key]['regulation_id'] = $regulations->id;

            }
            RegulationFile::insert($document);
         }

         if(isset($data['mengubah']))
            {
                $uuids = $request->mengubah;
              foreach($uuids as $uuid){
                $mengubah = new RegulationChange();
                $mengubah->regulation_id = $regulations->id;
                $mengubah->uuid = $uuid;
                $mengubah->save();
              }
            }

        return redirect()->route('regulations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function show(Regulation $regulation)
    {
            $links = RegulationChange::where('regulation_id',$regulation->id)->get();
            $judul = Regulation::where('uuid',$regulation->diubah)->first();
            $documents = RegulationFile::where('regulation_id',$regulation->id)->get();
            $regulations = Regulation::all();
            // dd($regulations);
            return view('regulations.show', compact(['regulation','links','judul','documents']));
    }

    public function showid(Regulation $regulation)
    {
            $links = RegulationChange::where('regulation_id',$regulation->id)->get();
            $judul = Regulation::where('uuid',$regulation->diubah)->first();
            $documents = RegulationFile::where('regulation_id',$regulation->id)->get();
            // dd($judul);
            return view('regulations.show', compact(['regulation','links','judul','documents']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $regulations = Regulation::all();
        $categories = Category::all();

            $regulation = Regulation::where('uuid', $uuid)->firstOrFail();
            // $id = $regulation->id;
            // $regulationfiles = RegulationFile::where('regulation_id', $id)->get();
            $zones = RegulationChange::where('regulation_id',$regulation->id)->pluck('uuid');
            $regulationchanges=$zones->toArray();
            // dd($categories, $zones, $regulationchanges );
            return view('regulations.edit', compact('regulation','regulations','categories','regulationchanges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regulation $regulation)
    {
        $regulations = Regulation::where('uuid',$regulation->uuid)->firstOrFail();
        // dd($regulations);
        $request->validate([
            'kode' => 'required',
            'judul' => 'required',
            'files.*' => 'mimes:csv,txt,xlsx,xls,pdf,doc,docx'

        ]);
        $regulations->update([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'category_id' => $request->category_id ?? null,
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'grade' => $request->grade,
            'tgl_penetapan' => $request->tgl_penetapan,
            'tgl_efektif' => $request->tgl_efektif,
            'konseptor' => $request->konseptor,
            'diubah' => $request->diubah ?? null,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

       if($request->hasfile('files'))
         {
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                $unique_name = md5($name. time());
                $path = $file->storeAs('public/files', $unique_name . 'tanda.' . $file->extension());
                $document[$key]['name'] = $unique_name . 'tanda.' . $file->extension();
                $document[$key]['path'] = $path;
                $document[$key]['uuid'] = (string)Uuid::uuid4();
                $document[$key]['regulation_id'] = $regulation->id;

            }
            RegulationFile::insert($document);
         }


        $regulationchanges = RegulationChange::where('regulation_id',$regulation->id)->get();
        if(isset($regulationchanges))
        {
            RegulationChange::where('regulation_id',$regulation->id)->delete();
                if(isset($request->mengubah)){
                $uuids = $request->mengubah;
                foreach($uuids as $uuid){
                $mengubah = new RegulationChange();
                $mengubah->regulation_id = $regulation->id;
                $mengubah->uuid = $uuid;
                $mengubah->save();
              }
            }
        }
        return redirect()->route('regulations.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regulation  $regulation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $regulation = Regulation::findOrFail($id);
            $regulation->delete();

        // $data = Regulation::where('id',$id)->first(['image']);
        // File::delete('public/regulation/'.$data->image);
        // $regulation = Regulation::where('id',$id)->delete();

        return Response::json($regulation);

            return redirect('/regulations')->with('success', 'regulation Data is successfully deleted');
    }

        public function download($uuid)
    {
        $regulation = RegulationFile::where('uuid', $uuid)->firstOrFail();
        $pathToFile = public_path('storage/files/' . $regulation->name);
        // dd($pathToFile);
        return response()->download($pathToFile);
    }

    public function deletefile($uuid)
    {
        $regulationfiles = RegulationFile::where('uuid', $uuid)->firstOrFail();
        $path = public_path('storage/files/' . $regulationfiles->name);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        RegulationFile::where('uuid', $uuid)->delete();
        return back();
    }

    public function import(Request $request)
    {
        Excel::import(new RegulationImport(), $request->file('import_file'));
        return redirect()->route('regulations.indexadmin');
    }

}
