
@extends('layouts.app')

@section('title', $title)

@section('content')


<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h2>Penghasilan</h2>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb  float-sm-end mt-sm-2">
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

                                <div class="card-header border" id="tombol">
                                    <form class="row" method="get" action="{{ route('search') }}">
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoncycles as $bulanoncycle)
                                                    <option value="{{ $bulanoncycle->bulan }}" {{ request()->get("search") == $bulanoncycle->bulan  ? "selected" : "" }}>{{$bulanoncycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror

                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Lihat</button>
                                            </div>
                                        </div>
                                        <div class="col-auto my-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Penghasilan</button>
                                            <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('oncycle')
                                </div>
                            </section>
                            <section id="rauchbier" class="tab-panel">
                                <div class="card-header border py-0" id="tombol">
                                    <form class="row" method="get" action="{{ route('searchoffcycle') }}">
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoffcycles as $bulanoffcycle)
                                                    <option value="{{ $bulanoffcycle->bulan }}" {{ request()->get("search") == $bulanoffcycle->bulan  ? "selected" : "" }}>{{$bulanoffcycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            @error('search')
                                                <div class="mt-2 text-danger">{{ $message }}</div>
                                            @enderror

                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Lihat</button>
                                            </div>
                                        </div>
                                        <div class="col-auto my-2">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Penghasilan</button>
                                            <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
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
