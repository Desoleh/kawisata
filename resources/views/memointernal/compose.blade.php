<?php
$result = array();
foreach($positions as $position){
    $result[$position->parent_name][] = $position;
}
 ?>

@extends('layouts.appm')

@section('style')
    @include('layouts.includes.style-m')
    @include('layouts.includes.style-c')
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
                                    <div class="select-2">
                                        <?php $selected_receivers = old('receiver_id') ?>
                                        <select class="select2 small" multiple="multiple" data-placeholder="Kepada" style="width: 100%;" name="receiver_id[]">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
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
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="same" name="ownapprover" onchange= "ownApprover()"/>
                                        <label class="form-check-label" for="defaultCheck1">
                                            saya sendiri
                                        </label>
                                        <input type = "hidden" name = "billName" id = "loginApprover" value="{{ $ownapprover->position_id }}">
                                    </div> --}}
                                    <div class="select2-purple">
                                        <?php $selected_approvers = old('approver_id') ?>
                                        <select class="select2bs4 small"  data-placeholder="Penandatangan" style="width: 100%;" name="approver_id" id="approver_id">
                                            @foreach ( $result as $key=>$val )
                                                <optgroup label="{{ $key }}">
                                                    @foreach ($val as $option )
                                                        {{-- <option style="display:none" value=""> -- penandatangan -- </option> --}}
                                                        <option value=" {{ $option->position_id }}" >{{ $option->name }} | {{ $option->nama }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                                        {{-- <input type="button" value="CHANGE" onclick="ownApprover()" /> --}}
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

        <div class="input-group control-group increment" >
          <input type="file" name="filenames[]" class="form-control">
          <div class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
        <div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="filenames[]" class="form-control">
            <div class="input-group-btn">
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
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
    {{-- <script src="{{ asset('adminlte/script.js')}}"></script> --}}

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

        // $(".js-example-disabled-multi").select2();
        // $(".js-programmatic-disable").on("click", function () {
        // $(".js-example-disabled").prop("disabled", true);
        // $(".js-example-disabled-multi").prop("disabled", true);
        // });

        // $('.js-example-basic-single').select2({
        // placeholder: ('multiple',true)
        // });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

        // $("select").on("select2:select", function (evt) {
        // var element = evt.params.data.element;
        // var $element = $(element);

        // $element.detach();
        // $(this).append($element);
        // $(this).trigger("change");
        // });



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
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>

<script>
// isi satu kolom input
    function ownApprover(){
		if (document.getElementById('same').checked){
     var nameApprover =  document.getElementById('loginApprover').value;

    document.getElementById('approver_id').value = nameApprover;

            }
            else{
                document.getElementById('approver_id').value = "";
            }
    }

</script>
<script>
    $('#approver_id').change(function(){
	if($(this).val() == '1'){
  	$('#text').text('Option 1 selected');
  }
});

$('#button').click(function(){
	$('#approver_id').val('2').change();
})
</script>
@endsection

