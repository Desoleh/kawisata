@extends('layouts.app-r')
@push('style-after')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@push('script-after')
<script>
    $(document).ready(function() {
    $('input:text:first').focus();

    $('input:text').bind("keydown", function(e) {
    var n = $("input:text").length;
    if (e.which == 13)
    { //Enter key
        e.preventDefault(); //to skip default behavior of the enter key
        var nextIndex = $('input:text').index(this) + 1;
        if(nextIndex < n)
        $('input:text')[nextIndex].focus();
        else
        {
        $('input:text')[nextIndex-1].blur();
        $('#btnSubmit').click();
        }
    }
    });

    $('#btnSubmit').click(function() {
        alert('Form Submitted');
    });
    });
</script>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush
@section('content')
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
                    @csrf
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="kode">Kode</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" style="height:150px" name="judul" placeholder="judul"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="judul_singkat">Judul_singkat Singkat</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" style="height:150px" name="judul_singkat" placeholder="judul singkat"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="category_id">Kategori</label>
                    <div class="col-sm-10">
                        <select class="select2" data-placeholder="category" style="width: 100%;" name="category_id">
                                <option selected disabled>Please select one option</option>
                            @foreach ($categories as $category_id )
                                <option {{ $category->category_id == old('category_id') ? 'selected' : '' }} value="{{ $category->category_id }}" >{{ $category->category_id }}</option>
                            @endforeach
                        </select>
                            @error('category_id')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="nomor">nomor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="tahun">tahun</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="tahun"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="grade">grade</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="grade"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="tgl_penetapan">Tgl penetapan</label>
                    <div class="col-sm-10">
                        <div class='input-group date' id='datetimepicker'>
                        <input type='text' class=" date form-control" name="tgl_penetapan" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="tgl_penetapan">Tgl berlaku</label>
                    <div class="col-sm-10">
                        <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="date form-control" name="tgl_efektif" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="konseptor">Konseptor</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="konseptor"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="diubah" class="col-sm-2 col-form-label">Diubah dengan</label>
                    <div class="col-sm-10">
                        <div class="select-2">
                            <select class="select2 small" data-placeholder="diubah dengan" style="width: 100%;" name="diubah">
                                <option selected disabled>Please select one option</option>
                                @foreach ($regulations as $item )
                                    <option {{ $item->uuid == old('diubah') ? 'selected' : '' }} value="{{ $item->uuid }}" >{{ $item->id }} | {{ $item->kode }} | {{ $item->judul }} </option>
                                @endforeach
                            </select>
                                @error('diubah')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="mengubah" class="col-sm-2 col-form-label">mengubah</label>
                    <div class="col-sm-10">
                        <div class="select-2">
                            <?php $selected_mengubah = old('mengubah') ?>
                            <select class="select2 small" data-placeholder="mengubah" style="width: 100%;" name="mengubah[]" multiple>
                                @foreach ($regulations as $item )
                                <option {{ in_array($item->id, old('mengubah') ?: []) ? 'selected' : '' }} value="{{ $item->id }}" >{{ $item->id }} | {{ $item->kode }} | {{ $item->judul }} </option>
                                @endforeach
                            </select>
                                @error('mengubah')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="status">status</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="status"/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="keterangan">keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="keterangan"/>
                    </div>
                </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-2">File:</label>
                        <div class="col-sm-10">
                        <input type="file" name="files[]" class="form-control" placeholder="file" multiple>
                        @error('files')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" id="btnSubmit" class="btn btn-primary">Add Regulasi</button>
            </form>
    </div>
</div>

@endsection
