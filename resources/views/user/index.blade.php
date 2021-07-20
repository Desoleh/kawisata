@extends('layouts.app')

@push('after-style')
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('landingpages/landingpages.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('landingpages/features.css')}}">

@endpush


@section('title', $title)



@section('content')
  <h1 class="visually-hidden">E-Office KA Pariwisata</h1>

<div class="container" id="featured-3">
    <div class="row">
        <div class="col-lg col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $kantorpusat->jumlah }}</h3>

            <p>Kantor Pusat</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $perbantuan->jumlah }}</h3>

            <p>Perbantuan</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $mandiri->jumlah }}</h3>

            <p>Mandiri</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $pkwt->jumlah }}</h3>

            <p>PKWT</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
            <h3>{{ $frontliner->jumlah }}</h3>

            <p>Frontliner</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

    </div>

    <div class="row">
        @foreach ($data2 as $data )
        <div class="col-lg col-3 d-flex ">
            <div class="card flex-fill">
            <div class="card-header text-dark bg-warning mb-3">
                <h6 class=" text-center fw-normal mb-0">{{ $data->kedudukan }}</h6>
            </div>
            <div class="card-body m-0 p-0">
                <h1 class=" text-center m-0">{{ $data->jumlah }}</h1>
            </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
        <!-- /Jumbotron -->

@endsection


