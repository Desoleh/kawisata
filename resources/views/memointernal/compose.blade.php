<?php
$result = array();
foreach($positions as $position){
    $result[$position->parent_name][] = $position;
}
 ?>

@extends('layouts.appm')

@section('style')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/select2-bootstrap4-theme/select2-bootstrap4.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/summernote/summernote.css')}}">
    <!-- summernote alpha -->
    <link rel="stylesheet" href="{{ asset('adminlte/summernote-list-styles-bs4.css')}}">

        <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminlte/vendor/bootstrap4-duallistbox/bootstrap-duallistbox.css')}}">

    <style>
        .card-header.disabled{
        background-color: #99caff;
        margin-bottom: 0;
        padding-bottom: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid small">
        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">

            <section class="content">
            <div class="row">
                <div class="col-md-3">
                <a href="{{ route('mailbox.index') }}" class="btn btn-primary btn-block mb-3">Memo Internal Masuk</a>

                @include('layouts.includes.sidebarm')

                </div>
                <!-- compose -->
                <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">Memo Internal</h3>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                    {{-- @include('alert') --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="{{ route('mailbox.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kepada</label>
                                <div class="col-sm-10">
                                    <div class="select2-purple">
                                        <?php $selected_receivers = old('receiver_id') ?>
                                        <select class="select2bs4 small" multiple="multiple" data-placeholder="Kepada" style="width: 100%;" name="receiver_id[]">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
                                                        {{-- <option value="{{ $option->position_id }}" >{{ $option->name }} | {{ $option->holder_id }}</option> --}}
                                                        <option value="{{ $option->position_id }}" {{ $selected_receivers!=null && in_array($option->position_id, $selected_receivers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }} </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                            @error('receiver_id')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tembusan</label>
                                <div class="col-sm-10">
                                    <div class="select2-purple">
                                        <?php $selected_copiers = old('copy_id') ?>
                                        <select class="select2 small" multiple="multiple" data-placeholder="Tembusan" style="width: 100%;" name="copy_id[]">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
                                                        {{-- <option value="{{ $option->position_id }}" >{{ $option->name }} | {{ $option->holder_id }}</option> --}}
                                                        <option value="{{ $option->position_id }}" {{ $selected_copiers!=null && in_array($option->position_id, $selected_copiers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }}</option>

                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penandatangan</label>
                                <div class="col-sm-10">
                                    <div>
                                        <?php $selected_approvers = old('Approver_id') ?>
                                        <select class="form-control form-control-sm" data-placeholder="Penandatangan" style="width: 100%;" name="approver_id">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
                                                        <option style="display:none" value> -- penandatangan -- </option>
                                                        <option value=" {{ $option->position_id }}" >{{ $option->name }} | {{ $option->nama }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                            @error('approver_id')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group form-group-sm row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Pemeriksa</label>
                                <div class="col-sm-10">
                                    <div class="select2-purple">
                                        <?php $selected_checkers = old('checker_id') ?>
                                        <select class="select2 small" multiple="multiple" data-placeholder="Pemeriksa" style="width: 100%;" name="checker_id[]">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
                                                        {{-- <option value="{{ $option->position_id }}" >{{ $option->name }} | {{ $option->holder_id }}</option> --}}
                                                        <option value="{{ $option->position_id }}" {{ $selected_checkers!=null && in_array($option->position_id, $selected_checkers)?"selected":"" }}>{{ $option->name }} | {{ $option->nama }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perihal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="perihal" placeholder="Perihal" value="{{ old("perihal")!=null?old("perihal"):"" }}">
                                            @error('perihal')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" class="form-control" style="height: 300px" name="body" value="{{ old("body")!=null?old("body"):"" }}">
                                    {{Request::old('body')}}
                                    {{-- TEXT AREA --}}
                                </textarea>
                                            @error('body')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror

                            </div>


                            {{-- <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Attachments
                                    <input type="file" name="attachments[]" multiple>
                                </div>
                                <p class="help-block">Max. {{ (int)(ini_get('upload_max_filesize')) }}M</p>
                            </div> --}}

                            <div class="container lst">

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                                @endif

                                {{-- @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                                @endif --}}

                                <h5 class="well">Lampiran</h5>

                                    <div class="input-group hdtuto control-group lst increment small" >
                                    <input type="file" name="filenames[]" class="myfrm form-control">
                                    <div class="input-group-btn">
                                        <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                    </div>
                                    <div class="clone hide">
                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                    </div>
                            </div>



                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" name="submit" value="2" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                <button type="submit" name="submit" value="1" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
{{--
                                <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button> --}}
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                            </div>
                        </form>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        <!-- dual listbox -->
            <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Bootstrap Duallistbox</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label>Multiple</label>
                    <select class="duallistbox" multiple="multiple">
                        <option selected>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
                the plugin.
            </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2021-2026 <a href="https://kawisata.id">PT Kereta Api Pariwisata</a>.</strong> All rights reserved.
    </footer>
    </div>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="{{ asset('adminlte/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/adminlte.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte/vendor/summernote/summernote-bs4.min.js')}}"></script>
    <!-- Summernote Alpha -->
    <script src="{{ asset('adminlte/summernote-list-styles-bs4.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/js/demo.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminlte/vendor/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

    <!-- Select2 -->
    <script src="{{ asset('adminlte/vendor/select2/js/select2.full.min.js')}}"></script>

    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Page specific script -->
    <script>
    $(function () {
        //Add text editor
        $('#summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'listStyles', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'help']],
        ],
        popover: {
            image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
            ],
            link: [
            ['link', ['linkDialogShow', 'unlink']]
            ],
            table: [
            ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
            ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
            ],
            air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
            ]
        }

        })

            //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

        $("select").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
        });



    })
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    </script>

    <script type="text/javascript">
    $('#myModal').on('click', '.btn-primary', function(){
        var value = $('#myPopupInput').val();
        $('#myMainPageInput').val(value);
        $('#myModal').modal('hide');
    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){
          $(this).parents(".hdtuto").remove();
      });
    });
</script>
@endsection
