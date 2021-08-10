@extends('layouts.app')
@section('title', $title)
@section('content')
  <h2 class="visually-hidden text-center">E-Office KA Pariwisata</h2>
    <div class="container-fluid mt-3 mt-sm-2  ">
                        <div class="row d-flex justify-content-between lg-flex">
                            <div class="col-lg-3 col-md-6 col-sm-6  mx-lg-2 ">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body fs-1 fw-bolder">{{ $kantorpusat->jumlah }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white text-decoration-none" href="#">Kantor Pusat</a>
                                        <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body fs-1 fw-bolder">{{ $perbantuan->jumlah }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white text-decoration-none" href="#">Perbantuan</a>
                                        <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body fs-1 fw-bolder ">{{ $mandiri->jumlah }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white text-decoration-none" href="#">Mandiri</a>
                                        <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body fs-1 fw-bolder">{{ $pkwt->jumlah }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white text-decoration-none" href="#">PKWT</a>
                                        <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body fs-1 fw-bolder">{{ $frontliner->jumlah }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="text-white text-decoration-none" href="#">Frontliner</a>
                                        <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">Frontliner</div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection


