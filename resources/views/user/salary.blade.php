
@extends('layouts.app')

@section('title', $title)

@push('style')
<style>
    /* Style the tab */
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #019da9;
    color: white;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
    }

    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }

    @keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
    }
</style>
@endpush
@push('script-after')
    <script>
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
    <script>
    function printContent(el){
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
    }
    </script>
@endpush

@section('content')


    <section id="content-header" class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
            <h2>Penghasilan</h2>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb  float-sm-end mt-sm-2">
                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Penghasilan</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid" id="tabs">
            <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="{{ ($title === "Upah Pokok dan Tunjangan Tetap"  ? 'defaultOpen' : '' ) }}">Upah Pokok & Tunjangan Tetap</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')" id="{{ ($title === "Tunjangan Tidak Tetap"  ? 'defaultOpen' : '' ) }}">Tunjangan Tidak Tetap</button>
            {{-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button> --}}
            </div>
        </div>
        <div>
            <div id="London" class="tabcontent">
                                <div class="card-header border" id="tombol">
                                    <form class="row" method="get" action="{{ route('search') }}">
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select @error('search') is-invalid @enderror" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoncycles as $bulanoncycle)
                                                    <option value="{{ $bulanoncycle->bulan }}" {{ request()->get("search") == $bulanoncycle->bulan  ? "selected" : "" }}>{{$bulanoncycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Rincian Penghasilan</button>
                                            </div>
                                            @error('search')
                                                <div class="ms-3 mt-2 text-danger">pilih bulan</div>
                                            @enderror

                                        </div>
                                        <div class="col-auto my-2">
                                            {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Gaji</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('oncycle')
                                </div>
            </div>

            <div id="Paris" class="tabcontent">
                                <div class="card-header border py-0" id="tombol">
                                    <form class="row" method="get" action="{{ route('searchoffcycle') }}" >
                                        <div class="col-auto my-2">
                                            <div class="input-group">
                                            <select type="text" name="search" class="form-select @error('search') is-invalid @enderror" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option selected value="">Pilih bulan</option>
                                                @foreach ($bulanoffcycles as $bulanoffcycle)
                                                    <option value="{{ $bulanoffcycle->bulan }}" {{ request()->get("search") == $bulanoffcycle->bulan  ? "selected" : "" }}>{{$bulanoffcycle->bulan }}</option>
                                                @endforeach
                                            </select>
                                            <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Rincian Penghasilan</button>
                                            {{-- <button name="submit"  type="submit" value="1"  class="btn btn-outline-primary">Slip Gaji</button> --}}
                                            </div>
                                            @error('search')
                                                <div class="ms-3 mt-2 text-danger">pilih bulan</div>
                                            @enderror
                                        </div>
                                        <div class="col-auto my-2">
                                            {{-- <div class="btn-group" role="group" aria-label="Basic example"> --}}
                                            <button name="submit"  type="submit" value="2"  class="btn btn-outline-primary">Slip Gaji</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onClick="window.print()">Cetak</button> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body small" id="borderlis">
                                    @yield('offcycle')
                                </div>
            </div>

    </section>

@endsection
