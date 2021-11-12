@extends('layouts.app')
@section('title', $title)
@push('style-before')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link href="{{ asset('welcome/style2.css') }}" rel="stylesheet" />
    <style>
        .garis {
        position: fixed;
        background-color: #202F62;
        height: 10px;
        top: 86px;
        z-index: 1;
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

<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 ps-4 pt-2">
                <h2>Peraturan Perusahaan</h2>
                </div>
                <div class="col-sm-6 ">
                <ol class="breadcrumb float-lg-end mt-lg-3">
                    <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Peraturan Perusahaan</li>
                </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
        <div class="container-fluid mb-3" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 col-lg-9 mb-5">
                    @forelse ($regulations as $regulation)
                    <div class="col mb-3">
                        <div class="icon-box pb-0" data-aos="fade-up" data-aos-delay="100">
                        <strong class="subtitle"> <a href="">{{$regulation->category->category_name}}</a> </strong>
                        <h4 class="title"> <a href="{{ route('regulations.show',$regulation->uuid) }}">{{$regulation->judul}}</a></h4>
                        <p class="description">{{$regulation->kode}}</p>
                        <p class="description">{{$regulation->keterangan}}</p>
                        <hr>
                        <p> <a href="{{ route('regulations.show',$regulation->uuid) }}"><i class="far fa-file-alt"></i> selengkapnya</a></p>
                        </div>
                    </div>
                    @empty
                        <section id="featured-services" class="featured-services">
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="col-md-12 col-lg-9 d-flex align-items-stretch mb-5 mb-lg-0">
                                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                    <p class="description">belum ada</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                        <div class="d-flex justify-content-center">
                            {!! $regulations->links() !!}
                        </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="sticky-top">
                        <div
                            class="card shadow-lg bg-body rounded-3 mb-3"
                        >
                            <div
                                class="
                                    card-header
                                    bg-primary bg-gradient
                                    text-white
                                    fw-bold
                                    fs-5
                                "
                            >
                                Pencarian
                            </div>
                            <div class="card-body bg-light">
                                <form action="{{ route('regulations.index') }}" method="get">
                                    <div class="mb-2">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="search"
                                            placeholder="pencarian"
                                            name="search"
                                        />
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Cari
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div
                            class="d-flex flex-column mb-3 bg-light shadow bg-body rounded"
                        >
                            <div
                                class="
                                    card-header
                                    bg-primary bg-gradient
                                    text-white
                                    fw-bold
                                    fs-5
                                "
                            >
                                Kategori
                            </div>
                            <div class="overflow-auto" style="max-height: 42vh">
                                <ul class="list-group list-group-flush">
                                    @forelse ($categories as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $item->category_name }}
                                        <span class="badge bg-primary rounded-pill">{{ $item->regulations_count }}</span>
                                    </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End Featured Services Section -->

@endsection


