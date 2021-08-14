<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data)
    {

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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

	public function upload(){
		$documents = Document::get();
		return view('user.upload',['documents' => $documents]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        if ($files = $request->file('photo')) {
		$photo = $request->file('photo');
        $nip = Auth::user()->nip;
		$nama_file = $nip. '-foto'.$photo->getClientOriginalExtension();
		$tujuan_upload = 'userphoto';
		$photo->move($tujuan_upload,$nama_file);
            Document::create([
                'photo' => $nama_file,
                'uuid' => (string)Uuid::uuid4(),
                'category' => 'foto',
                'nip' => $nip,
            ]);
        }
		return redirect()->back()->withSuccess('foto berhasil diganti');
;
	}

	public function akte(Request $request){
		$this->validate($request, ['doc' => 'required|file',]);
		$photo = $request->file('doc');
        $nip = Auth::user()->nip;
		$nama_file = $nip. '-akte.'.$photo->getClientOriginalExtension();
		$tujuan_upload = storage_path('app/public/documents');
		$photo->move($tujuan_upload,$nama_file);
		Document::create([
			'doc' => $nama_file,
			'uuid' => (string)Uuid::uuid4(),
            'category' => 'akte',
            'nip' => $nip,
		]);
		return redirect()->back();
	}
	public function ktp(Request $request){
		$this->validate($request, ['doc' => 'required|file',]);
		$photo = $request->file('doc');
        $nip = Auth::user()->nip;
		$nama_file = $nip. '-ktp.'.$photo->getClientOriginalExtension();
		$tujuan_upload = storage_path('app/public/documents');
		$photo->move($tujuan_upload,$nama_file);
		Document::create([
			'doc' => $nama_file,
			'uuid' => (string)Uuid::uuid4(),
            'category' => 'ktp',
            'nip' => $nip,
		]);
		return redirect()->back();
	}
	public function kk(Request $request){
		$this->validate($request, ['doc' => 'required|file',]);
		$photo = $request->file('doc');
        $nip = Auth::user()->nip;
		$nama_file = $nip. '-kk.'.$photo->getClientOriginalExtension();
		$tujuan_upload = storage_path('app/public/documents');
		$photo->move($tujuan_upload,$nama_file);
		Document::create([
			'doc' => $nama_file,
			'uuid' => (string)Uuid::uuid4(),
            'category' => 'kk',
            'nip' => $nip,
		]);
		return redirect()->back();
	}

    public function downloadakte($uuid)
    {
        $ktp = Document::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/public/documents/' . $ktp->doc);
        return response()->download($pathToFile);
    }
    public function downloadktp($uuid)
    {
        $ktp = Document::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/public/documents/' . $ktp->doc);
        return response()->download($pathToFile);
    }
    public function downloadkk($uuid)
    {
        $ktp = Document::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/public/documents/' . $ktp->doc);
        return response()->download($pathToFile);
    }


}
