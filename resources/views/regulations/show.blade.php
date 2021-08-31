@extends('layouts.app-r')
@section('content')
<div class="container" style="font-size: 0.9rem">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Regulation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('regulations.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="card bg-light shadow rounded-3 mb-2">
        <div class="card-header">
            <h3 class="card-title mb-0">
                {{ $regulation->judul }}
            </h3>
            <h7>
                Nomor : {{ $regulation->kode }}
            </h7>
        </div>
        <div class="card-body">
            <table class="table table-striped ">
                    <tr>
                        <td> Judul Lengkap</td>
                        <td> {{ $regulation->keterangan }}</td>
                    </tr>
                    <tr>
                        <td> Kategori</td>
                        <td> {{ $regulation->category }}</td>
                    </tr>
                    <tr>
                        <td> Nomor:</td>
                        <td> {{ $regulation->nomor }}</td>
                    </tr>
                    <tr>
                        <td> Tahun:</td>
                        <td> {{ $regulation->tahun }}</td>
                    </tr>
                    <tr>
                        <td> Grade</td>
                        <td> {{ $regulation->grade }}</td>
                    </tr>
                    <tr>
                        <td> Tgl Penetapan:</td>
                        <td>
                            {{ \Carbon\Carbon::parse($regulation->tgl_penetapan)->isoFormat('DD MMMM YYYY')}}
                        </td>
                    </tr>
                    <tr>
                        <td> Tgl Efektif</td>
                        <td>
                            {{ \Carbon\Carbon::parse($regulation->tgl_efektif)->isoFormat('DD MMMM YYYY')}}
                        </td>
                    </tr>
                    <tr>
                        <td> Konseptor</td>
                        <td> {{ $regulation->konseptor }}</td>
                    </tr>
                    <tr>
                        <td> Diubah dengan</td>
                        <td>
                        @isset($regulation->diubah)
                        <a class="btn text-primary" href="{{ route('regulations.show', $regulation->diubah) }}">
                            @isset($judul->judul)
                            {{ $judul->judul }}
                            @endisset
                        </a>
                        @endisset
                        </td>
                    </tr>
                    <tr>
                        <td> Mengubah</td>
                        <td>
                            <table class="table table-bordered mb-0">
                                <tr>
                                    <td>
                                        @forelse ($links as $link)
                                            {{
                                                DB::table('regulations')
                                                ->where('id', $link->uuid)
                                                ->first()
                                                ->judul;
                                            }}
                                                <a class="btn btn-info" href="{{ route('regulations.showid', $link->uuid) }}">detail</a>
                                        @empty
                                        -
                                        @endforelse
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td> Status</td>
                        <td> {{ $regulation->status }}
                    </tr>
                    <tr>
                        <td style="vertical-align: middle">Teks Lengkap</td>
                    <td>
                        <table class="table table-bordered mb-0">
                            @forelse ($documents as $document)
                                <tr>
                                    <td>
                                        <a href="{{ route('regulations.download', $document->uuid) }}">download</a><br>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    tanpa lampiran
                                </td>
                            </tr>
                            @endforelse
                        </table>
                    </td>
            </table>
        </div>
    </div>


</div>
@endsection
