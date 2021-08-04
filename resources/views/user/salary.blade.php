
@extends('layouts.app')

@section('title', $title)

@section('content')


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
                                                                <option selected value="">Pilih bulan</option>
                                                                @foreach ($bulangajis as $bulangaji)
                                                                    <option value="{{ $bulangaji->bulan }}" {{ request()->get("search") == $bulangaji->bulan  ? "selected" : "" }}>{{$bulangaji->bulan }}</option>
                                                                @endforeach
                                                            </select>

                                                            <button name="submit"  type="submit" value="1" class="btn btn-primary ">Lihat</button>
                                                            <button name="submit"  type="submit" value="2" class="btn btn-primary ">Download Oncycle</button>
                                                            </button>
                                                    @error('search')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
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
                                                                <option selected value="">Pilih bulan</option>
                                                                @foreach ($bulangajis as $bulangaji)
                                                                    <option value="{{ $bulangaji->bulan }}" {{ request()->get("search") == $bulangaji->bulan  ? "selected" : "" }}>{{$bulangaji->bulan }}</option>
                                                                @endforeach
                                                            </select>

                                                            <button name="submit"  type="submit" value="1" class="btn btn-primary ">Lihat</button>
                                                            <button name="submit"  type="submit" value="2" class="btn btn-primary ">Download Offcycle</button>
                                                            </button>
                                                    @error('search')
                                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                                    @enderror
                                                        </div>
                                                </form>
                                        </div>

                                    </div>

                                    @yield('offcycle')

                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                            <p>Non Upah</p>
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
