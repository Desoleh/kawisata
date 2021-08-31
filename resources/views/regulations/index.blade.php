@extends('layouts.app-r')
{{-- @section('title', $title) --}}
@push('style-after')
    <link href="{{ asset('css/peraturan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/peraturan1.css') }}" rel="stylesheet">
@endpush
@push('script-after')
@endpush
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 ps-4 pt-2">
            <h2>Peraturan Perusahaan</h2>
            </div>
            <div class="col-sm-6 ">
            <ol class="breadcrumb float-lg-end mt-lg-3">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Peraturan Perusahaan</li>
            </ol>
            </div>
        </div>
    </div>
</section>
<main class="mb-3">
    <div class="container-fluid">
        <div class="row">
            <!-- post -->
            <div class="col-lg-9 col-md-12 col-sm-12">
                @forelse ($regulations as $regulation)
                <div class="card bg-light shadow rounded-3 mb-2">
                    <div class="card-body">
                        <h2 class="card-title">
                            <a href="{{ route('regulations.show',$regulation->uuid) }}">{{$regulation->judul}}</a>
                        </h2>
                        <p class="card-text">{{$regulation->keterangan}}</p>
                        <p class="card-text">Nomor : {{$regulation->kode}}</p>
                    </div>
                    <div class="card-footer d-flex">
                            <small class="me-2"> {{$regulation->category}} </small>
                            <small class="ms-auto"> <a href="{{ route('regulations.show',$regulation->uuid) }}">selengkapnya....</a> </small>
                    </div>
                </div>
                @empty
                <div class="card-body bg-white rounded shadow">
                <p>tidak ditemukan</p>
                </div>
                @endforelse

                <div class="d-flex justify-content-center">
                    {!! $regulations->links() !!}
                </div>
            </div>
            <!-- /post -->
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
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Peraturan
                                    <span class="badge bg-primary rounded-pill">3432</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


