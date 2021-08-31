@extends('layouts.app-m')
@section('regulations')
<div class="container">
    <div class="card-header">
        Add Games Data
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
            <form method="post" action="{{ route('regulations.store') }}" enctype="multipart/form-data">
                <div class="form-group row">
                    @csrf
                    <label class="col-sm-2 col-form-label" for="kode">Kode</label>
                    <input type="text" class="col-sm-10 form-control" name="kode"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                    <input type="text" class="col-sm-10 form-control" name="judul"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="kategori">kategori</label>
                    <input type="text" class="col-sm-10 form-control" name="kategori"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nomor">nomor</label>
                    <input type="text" class="col-sm-10 form-control" name="nomor"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="tahun">tahun</label>
                    <input type="text" class="col-sm-10 form-control" name="tahun"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="tempat">tempat</label>
                    <input type="text" class="col-sm-10 form-control" name="tempat"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="tgl_penetapan">Tgl penetapan</label>
                    <input type="text" class="col-sm-10 form-control" name="tgl_penetapan" id="date"/>
                </div>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="tgl_efektif">Tgl efektif</label>
                    <input type="text" class="col-sm-10 form-control" name="tgl_efektif"  id="date/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="konseptor">Konseptor</label>
                    <input type="text" class="col-sm-10 form-control" name="konseptor"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="bidang">Bidang</label>
                    <input type="text" class="col-sm-10 form-control" name="bidang"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="subyek">subyek</label>
                    <input type="text" class="col-sm-10 form-control" name="subyek"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="status">status</label>
                    <input type="text" class="col-sm-10 form-control" name="status"/>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="keterangan">keterangan</label>
                    <input type="text" class="col-sm-10 form-control" name="keterangan"/>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-2">File:</label>
                        <input type="file" name="file" class="col-sm-10 form-control" placeholder="file">
                    </div>
                <button type="submit" class="btn btn-primary">Add Regulasi</button>
            </form>
    </div>
</div>

@endsection
