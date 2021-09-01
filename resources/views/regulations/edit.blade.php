@extends('layouts.app-r')
@push('style-after')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-selection__arrow {
            height: 38px !important;
        }
        .select2-selection.select2-selection--multiple {
           min-height: 38px;
           line-height: 70%;
}
    </style>
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
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Regulation</h2>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('regulations.update', $regulation->uuid) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary" href="{{ route('regulations.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

         <div class="row">
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"  for="kode">uuid</label>
                <div class="col-sm-10">
                    <input type="text" name="uuid" value="{{ $regulation->uuid }}" class="form-control" placeholder="uuid">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"  for="kode">Kode</label>
                <div class="col-sm-10">
                    <input type="text" name="kode" value="{{ $regulation->kode }}" class="form-control" placeholder="kode">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"  for="judul">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="judul" value="{{ $regulation->judul }}" class="form-control" placeholder="judul">
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label" for="category_id">Kategori</label>
                <div class="col-sm-10">
                    <select class="select2" data-placeholder="category" style="width: 100%;" name="category_id">
                            <option selected disabled>Please select one option</option>
                        @foreach ($categories as $item )
                            <option {{ $item->id == $regulation->category_id ? 'selected' : '' }} value="{{ $item->id }}" >{{ $item->category }}</option>
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
                <input type="text" class="form-control"  value="{{ $regulation->nomor }}"name="nomor"/>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label" " for="tahun">tahun</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $regulation->tahun }}" name="tahun"/>
                </div>
            </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-2 col-form-label" for="grade">grade</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $regulation->grade }}" name="grade"/>
                    </div>
                </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label" for="tgl_penetapan">Tgl penetapan</label>
                <div class="col-sm-10">
                    <div class='input-group date' id='datetimepicker'>
                    <input type='text' class=" date form-control" value="{{ $regulation->tgl_penetapan }}"  name="tgl_penetapan" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"  for="tgl_efektif">Tgl berlaku</label>
                <div class="col-sm-10">
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="date form-control" value="{{ $regulation->tgl_efektif }}" name="tgl_efektif" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label" for="konseptor">Konseptor</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $regulation->konseptor }}" name="konseptor"/>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="diubah" class="col-sm-2 col-form-label">Diubah dengan</label>
                <div class="col-sm-10">
                    <div class="select-2">
                        <select class="select2 small" data-placeholder="diubah dengan" style="width: 100%;" name="diubah">
                                <option selected disabled>Please select one option</option>
                            @foreach ($regulations as $item )
                                <option {{ $item->uuid == $regulation->diubah ? 'selected' : '' }} value="{{ $item->uuid }}" >{{ $item->id }} | {{ $item->kode }} | {{ $item->judul }} </option>
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
                        <select class="select2 small" data-placeholder="mengubah dengan" style="width: 100%;" name="mengubah[]" multiple>
                            @foreach ($regulations as $item )
                                <option {{ in_array($item->id, $regulationchanges ?: []) ? 'selected' : '' }} value="{{ $item->id }}" >{{ $item->id }} | {{ $item->kode }} | {{ $item->judul }} </option>
                            @endforeach
                        </select>
                            @error('mengubah')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"for="status">status</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $regulation->status }}"  name="status"/>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-2 col-form-label"for="keterangan">keterangan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $regulation->keterangan }}"  name="keterangan"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>file</strong>
                    <input type="file" name="files[]" class="form-control" placeholder="file" multiple>
                        @error('files')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                </div>

            </div>
        </div>
    </form>
                    <div>
                        @foreach ($regulation->regulationfiles as $item)
                            <form action="{{ route('regulations.deletefile', $item->uuid) }}" method="post">
                                <button class="btn text-danger">delete</button>
                                @csrf
                                @method('delete')
                                <a href="{{ route('regulations.download', $item->uuid) }}">{{ $item->name }} | {{ $item->uuid }}</a>
                            </form>
                        @endforeach
                    </div>

</div>
@endsection

                                    {{-- <td>{{ $loop->iteration }}</td> --}}
