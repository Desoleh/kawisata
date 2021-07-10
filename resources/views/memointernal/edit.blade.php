<?php
$result = array();
foreach($positions as $position){
    $result[$position->parent_name][] = $position;
}
 ?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config($title) }}</title>
    @include('layouts.includes.style-m')
    @include('layouts.includes.style-c')
    <style>
        body {
            padding-top: 0px;
        }

        .sticky-offset {
            top: 56px;
        }

        #body-row {
            margin-left:0;
            margin-right:0;
        }
        #sidebar-container {
            min-height: 100vh;
            background-color: rgb(224, 224, 224);
            padding: 0;
        }

        /* Sidebar sizes when expanded and expanded */
        .sidebar-expanded {
            width: 230px;
        }
        .sidebar-collapsed {
            width: 60px;
        }

        /* Menu item*/
        #sidebar-container .list-group a {
            height: 50px;
            color: white;
        }

        /* Submenu item*/
        #sidebar-container .list-group .sidebar-submenu a {
            height: 45px;
            padding-left: 30px;
        }
        .sidebar-submenu {
            font-size: 0.9rem;
        }

        /* Separators */
        .sidebar-separator-title {
            background-color: #333;
            height: 35px;
        }
        .sidebar-separator {
            background-color: #333;
            height: 25px;
        }
        .logo-separator {
            background-color: #333;
            height: 60px;
        }

        /* Closed submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
        content: " \f0d7";
        font-family: FontAwesome;
        display: inline;
        text-align: right;
        padding-left: 10px;
        }
        /* Opened submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
        content: " \f0da";
        font-family: FontAwesome;
        display: inline;
        text-align: right;
        padding-left: 10px;
        }



    </style>
</head>
<body>
<div class="row">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="menu-collapsed">My Bar</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>

                <!-- This menu is hidden in bigger devices with d-sm-none.
            The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                        <a class="dropdown-item" href="#">Dashboard</a>
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Tasks</a>
                        <a class="dropdown-item" href="#">Etc ...</a>
                    </div>
                </li>
                <!-- Smaller devices menu END -->

            </ul>
        </div>
    </nav>
    <!-- NavBar END -->

    <div class="container-fluid">

    <!-- Bootstrap row -->
    <div class="row" id="body-row">
        <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
                <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
                <!-- Bootstrap List Group -->
                <ul class="list-group sticky-top sticky-offset">
                        <a href="{{ route('mailbox.index') }}" class="btn btn-primary btn-block m-2 p-2">Memo Internal Masuk</a>

                    <!-- Separator with title -->

                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>MAIN MENU</small>
                    </li>

                </ul>
                <!-- List Group END-->
            </div>
        <!-- sidebar-container END -->

        <!-- MAIN -->
            <div class="col py-3">
                <section class="navbar navbar-expand-md navbar-dark bg-primary sticky-top sticky-offset m-0">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                        <span class="menu-collapsed">My Bar</span>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>

                            <!-- This menu is hidden in bigger devices with d-sm-none.
                        The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
                            <li class="nav-item dropdown d-sm-block d-md-none">
                                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                                </a>
                                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                                    <a class="dropdown-item" href="#">Dashboard</a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Tasks</a>
                                    <a class="dropdown-item" href="#">Etc ...</a>
                                </div>
                            </li>
                            <!-- Smaller devices menu END -->

                        </ul>
                    </div>
                </section>

                <h1>
                    Collapsing Menu
                    <small class="text-muted">Version 2.1</small>
                </h1>


                <div class="card">
                    <h4 class="card-header">Requirements</h4>
                    <div class="card-body">
                        <ul>
                            <li>JQuery</li>
                            <li>Bootstrap 4 beta-3</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby
                    chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade
                    disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache
                    food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>


            </div>
        <!-- Main Col END -->
        </div>
    </div>
    <!-- body-row END -->
</div>
<div class="container-fluid">
    <div class="container-fluid small">
        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">

            <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="div sidebar sticky-top sticky-offset">
                        <a href="{{ route('mailbox.index') }}" class="btn btn-primary btn-block mb-3">Memo Internal Masuk</a>

                        <div class="card">
                            <div class="card-header disabled">
                            <h3 class="card-title">Kotak Masuk</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            </div>
                            <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Memo Internal Masuk
                                    <span class="badge bg-primary float-right">12</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Disposisi Masuk
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Drafts
                                </a>
                                </li>
                            </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card kotak masuk -->
                        <div class="card">
                            <div class="card-header disabled ">
                            <h3 class="card-title ">Kotak Keluar</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            </div>
                            <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Memo Internal Keluar
                                    <span class="badge bg-primary float-right">12</span>
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Disposisi Terkirim
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Status Memo Internal
                                </a>
                                </li>
                                <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-file-alt"></i> Memo Internal Perlu Diproses
                                </a>
                                </li>

                            </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="same" name="ownapprover" onchange= "ownApprover()"/>
                                        <label class="form-check-label" for="defaultCheck1">
                                            saya sendiri
                                        </label>
                                        <input type = "hidden" name = "billName" id = "loginApprover" value="{{ $ownapprover->position_id }}">
                                    </div>
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
                                                        <input type="button" value="CHANGE" onclick="ownApprover()" />
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
</div>
@include('layouts.includes.script-bottom')
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
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    })


</body>

