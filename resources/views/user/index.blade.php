@extends('layouts.app')
@section('title', $title)
@push('style-before')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link href="{{ asset('welcome/style1.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet" />
    <style>
        .garis {
        position: fixed;
        background-color: #202F62;
        height: 10px;
        top: 86px;
        z-index: 1;
        }
    </style>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
@endpush
@push('script-after')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#frontliner").DataTable({
                lengthChange: false,
            });
        });
    </script>
    <script>
    // $(document).ready(function(){
    //     $("#myModal").modal('show');
    // });
    </script>
@endpush
@section('content')
        <article>
          <div class="container-fluid garis"></div>
        </article>

    <!-- ======= Hero Section ======= -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('storage/carousel/akhlak.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-dark">
                        {{-- <h1>Amanah Kompeten Harmonis Loyal Adaptif Kolaboratif</h1> --}}
                        {{-- <p>Some representative placeholder content for the first slide of the carousel.</p> --}}
                        <p><a class="btn btn-lg btn-primary" href="{{ asset('regulation/BukuSaku Revisi 7,25 X 10 NEW REVISI 8.1.pdf') }}" target="_blank" >Buku Saku Akhlak</a></p>
                    </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('storage/carousel/amanah.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        {{-- <h1>Amanah</h1>
                        <p>Memegang Teguh Kepercayaan Yang Diberikan</p> --}}
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/carousel/kompeten.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        {{-- <h1>Kompeten</h1>
                        <p>Terus Belajar dan mengembangkan Kapabilitas</p> --}}
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/carousel/loyal.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        {{-- <h1>Loyal</h1>
                        <p>Berdedikasi dan Mengutamakan Kepentingan Bangsa dan Negara</p> --}}
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/carousel/adaptif.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        {{-- <h1>Adaptif</h1>
                        <p>Terus Berinovasi dan Antusias dalam Menggerakkan atau Menghadapi Perubahan</p> --}}
                    </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('storage/carousel/kolaboratif.jpg') }}" class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

                    <div class="container">
                    <div class="carousel-caption text-end">
                        {{-- <h1>Kolaboratif</h1>
                        <p>Membangun Kerjasama yang Sinergis</p> --}}
                    </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>

    <!-- End Hero -->

    <!-- ======= Featured Services Section ======= -->
    <div class="container mb-5">
        <div class="card mt-2 mb-2">
            <div class="card-header"><h4>Peraturan Perusahaan</h4></div>
            <div class="card-body bg-light">
                <section id="featured-services" class="featured-services">
                <div class="container" data-aos="fade-up">
                        @forelse ($regulations as $regulation)
                        <div class="row mt-5">
                            <div class="col-12 col-md-12 icon-box shadow" data-aos="fade-up" data-aos-delay="100">
                            <strong class="subtitle"> <a href="">{{$regulation->category->category_name}}</a> </strong>
                            <h4 class="title"> <a href="{{ route('regulations.show',$regulation->uuid) }}">{{$regulation->judul}}</a></h4>
                            <p class="description">{{$regulation->kode}}</p>
                            <p class="description">{{$regulation->keterangan}}</p>
                            </div>
                        </div>
                        @empty
                        @endforelse
                </div>
                </section><!-- End Featured Services Section -->    
            </div>
            <div class="d-flex justify-content-center">
                {!! $regulations->links() !!}
            </div>
        </div>
    </div>


    <div class="container">
        <div class="card text-left">
            <div class="card-header"><h4>Dashboard Pekerja</h2></div>
            <div class="card-body">
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
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body fs-1 fw-bolder">{{ $perbantuan->jumlah }}</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="text-white text-decoration-none" href="#">Perbantuan</a>
                                    <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body fs-1 fw-bolder ">{{ $mandiri->jumlah }}</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="text-white text-decoration-none" href="#">Mandiri</a>
                                    <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body fs-1 fw-bolder">{{ $pkwt->jumlah }}</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="text-white text-decoration-none" href="#">PKWT</a>
                                    <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body fs-1 fw-bolder">{{ $frontliner->jumlah }}</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="text-white text-decoration-none" href="#">Frontliner</a>
                                    <div class="text-white fs-4"><i class="fas fa-user-friends"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-header"><h4>Pekerja Alih Daya (Frontliner)</h4></div>
                                <div class="card-body">
                                <table  class="table table-sm table-striped" id="frontliner">
                                <thead>
                                    <tr>
                                    <th>Kedudukan</th>
                                    <th>Jumlah <br> Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($data2 as $data)
                                    <tr>
                                            <td>{{ $data->kedudukan }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                    </tr>
                                        @endforeach
                                </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 justify-content-center">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header"><h4>Info Ulang tahun</h4></div>
                                        <div class="card-body">
                                        <table  class="table table-sm table-striped" id="inforekan">
                                        <thead>
                                            <tr>
                                            <th>NIPP/NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Lahir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($employees as $employee)
                                            <tr>
                                                    <td>{{ $employee->nip }}</td>
                                                    <td><a class="text-dark text-decoration-none" href="{{ route('user.infoRekanDetail', $employee->nip) }}">{{ $employee->nama}}</a></td>
                                                    @if(isset( $employee->position->name))
                                                    <td>{{ $employee->position->name}}</td>
                                                    @else                                                         
                                                    @endif
                                                    <td>{{ $employee->tanggal_lahir}}</td>
                                            </tr>
                                                @endforeach
                                        </tbody>
                                        </table>

                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>



</div>

@endsection


