
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
            <ol class="breadcrumb  float-lg-end mt-lg-3">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Penghasilan</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="container-fluid">
                <div class="tabset">
                    <!-- Tab 1 -->
                        <input type="radio" name="tabset" id="tab1" aria-controls="marzen" {{ ($title === "Upah Pokok dan Tunjangan Tetap"  ? 'checked' : '' ) }}>
                        <label id="label" for="tab1">Upah Pokok & Tunjangan Tetap</label>
                        <!-- Tab 2 -->
                        <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier" {{ ($title === "Tunjangan Tidak Tetap"  ? 'checked' : '' ) }}>
                        <label id="label" for="tab2">Tunjangan Tidak Tetap</label>
                        <!-- Tab 3 -->
                        <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
                        <label id="label" for="tab3">Non Upah</label>

                        <div class="tab-panels">
                            <section id="marzen" class="tab-panel">
                                <div class="card-header border"  id="tombol">
                                    <form class="row" method="get" action="{{ route('search') }}">
                                        <div class="col-auto">
                                            <select type="text" name="search"  class="form-select w-auto" id="search" placeholder="Masukkan keyword">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoncycles as $bulangaji)
                                                    <option value="{{ $bulangaji->bulan }}" {{ request()->get("search") == $bulangaji->bulan  ? "selected" : "" }}>{{$bulangaji->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-auto">
                                            <button name="submit"  type="submit" value="1" class="btn btn-primary ">Lihat</button>
                                        </div>
                                        <div class="col-auto">
                                        <button name="submit"  type="submit" value="2" class="btn btn-primary ">Slip Penghasilan</button>
                                        </div>
                                        <div class="col-auto">
                                        <button name="submit"  type="submit" value="2" class="btn btn-primary " onClick="window.print()">Cetak</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('oncycle')
                                </div>
                            </section>
                            <section id="rauchbier" class="tab-panel">
                                <div class="card-header border" id="tombol">
                                    <form class="row" method="get" action="{{ route('searchoffcycle') }}">
                                        <div class="col-auto">
                                            <select type="text" name="search"  class="form-select w-auto" id="search" placeholder="Masukkan keyword">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoffcycles as $bulanoffcycle)
                                                    <option value="{{ $bulanoffcycle->bulan }}" {{ request()->get("search") == $bulanoffcycle->bulan  ? "selected" : "" }}>{{$bulanoffcycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-auto">
                                            <button name="submit"  type="submit" value="1" class="btn btn-primary ">Lihat</button>
                                        </div>
                                        <div class="col-auto">
                                        <button name="submit"  type="submit" value="2" class="btn btn-primary ">Slip Penghasilan</button>
                                        </div>
                                        <div class="col-auto">
                                        <button type="button" class="btn btn-primary " onClick="window.print()">Cetak</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small">
                                    @yield('offcycle')
                                </div>

                            </section>
                            <section id="dunkles" class="tab-panel">
                            </section>
                        </div>
                </div>
        </div>

@endsection

@push('after-scrpt')


@endpush
