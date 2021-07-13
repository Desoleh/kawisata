
@extends('layouts.app')

@section('title', $title)

@section('content')
<?php
    $nama = $employee->nama;
    $nip = $employee->nip;
    $img = $document->photo;
 ?>

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Penghasilan</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Penghasilan</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm">
                    <div class="card">
                        <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link {{ ($title === "Upah Pokok dan Tunjangan Tetap"  ? 'active' : '' ) }}" href="#activity" data-toggle="tab">Upah Pokok & Tunjangan Tetap</a></li>
                            <li class="nav-item"><a class="nav-link {{ ($title === "Tunjangan Tidak Tetap"  ? 'active' : '' ) }}" href="#timeline" data-toggle="tab">Tunjangan Tidak tetap</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Non Upah</a></li>
                        </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                        <div class="tab-content">
                            <div class="{{ ($title === "Upah Pokok dan Tunjangan Tetap"  ? 'active' : '' ) }} tab-pane" id="activity">
                                <div class="container-fluid small">
                                    <div class="row">
                                        <div class="col-md-10">
                                                <form class="form " method="get" action="{{ route('search') }}">
                                                        <div class="form-group">
                                                            <select type="text" name="search"  class="custom-select w-auto" id="search" placeholder="Masukkan keyword">
                                                                <option selected>Pilih bulan</option>
                                                                @foreach ($bulangajis as $bulangaji)
                                                                    <option value="{{ $bulangaji->bulangaji }}" {{ request()->get("search") == $bulangaji->bulangaji  ? "selected" : "" }}>{{$bulangaji->bulangaji }}</option>
                                                                @endforeach
                                                            </select>

                                                            <button name="submit"  type="submit" value="1" class="btn btn-primary ">Cari</button>
                                                            <button name="submit"  type="submit" value="2" class="btn btn-primary ">Cetak</button>
                                                            <button name="submit"  type="submit" value="3" class="btn btn-primary" id="print">Print</button>
                                                            </button>
                                                        </div>
                                                </form>
                                        </div>
                                    </div>
                                    @yield('oncycle')
                                    
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class=" {{ ($title === "Tunjangan Tidak Tetap"  ? 'active' : '' ) }} tab-pane" id="timeline">
                                <div class="container-fluid small">
                                    <div class="row">
                                        <div class="col-md-10">
                                                <form class="form " method="get" action="{{ route('searchoffcycle') }}">
                                                        <div class="form-group">
                                                            <select type="text" name="search"  class="custom-select w-auto" id="search" placeholder="Masukkan keyword">
                                                                <option selected>Pilih bulan</option>
                                                                <option value="Januari 2021">Januari 2021</option>
                                                                <option value="Februari 2021">Februari 2021</option>
                                                                <option value="Maret 2021">Maret 2021</option>
                                                                <option value="April 2021">April 2021</option>
                                                                <option value="Mei 2021">Mei 2021</option>
                                                            </select>
                                                            <button type="submit" class="btn btn-primary ">Cari</button>
                                                        </div>
                                                </form>
                                        </div>
                                        <div class="col-md-2 ">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Download Slip Gaji
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Download Slip Gaji</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                        <form class="form " method="get" action="{{ route('cetakoncycle') }}">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <select type="text" name="search"  class="custom-select w-35" id="search" placeholder="Masukkan keyword">
                                                                        <option selected>Pilih bulan</option>
                                                                        <option value="Januari 2021">Januari 2021</option>
                                                                        <option value="Februari 2021">Februari 2021</option>
                                                                        <option value="Maret 2021">Maret 2021</option>
                                                                        <option value="April 2021">April 2021</option>
                                                                        <option value="Mei 2021">Mei 2021</option>
                                                                    </select>
                                                                </div>
                                                                    {{-- <input type="submit" value="Upload" class="btn btn-primary"> --}}

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" value="Upload" class="btn btn-primary" formtarget="_blank">Download</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @yield('offcycle')
                                    
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                                </div>
                            </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
            </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal -->
@endsection

@push('after-scrpt')


@endpush