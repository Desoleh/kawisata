@extends('layouts.app')
@section('content')
<div class="container" style="font-size: 0.9rem">
    <div class="card bg-light shadow rounded-3 mb-2">
        <div class="card-header">
            <h4 class="card-title mb-0">
                {{ $regulation->judul }}
            </h4>
            <h7>
                Nomor : {{ $regulation->kode }}
            </h7>
        </div>
        <div class="card-body">
            <table class="table table-striped ">
                    <tr>
                        <td> Judul Lengkap</td>
                        <td> {{ $regulation->judul }}</td>
                    </tr>
                    <tr>
                        <td> Judul Singkat</td>
                        <td> {{ $regulation->judul_singkat }}</td>
                    </tr>
                    <tr>
                        <td> Kategori</td>
                        <td> {{$regulation->category->category_name}}</td>
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
                        <td style="vertical-align: baseline"> Diubah dengan</td>
                        <td style="text-align: left">
                        @isset($regulation->diubah)
                        <a class="text-primary" style="text-align: left" href="{{ route('regulations.show', $regulation->diubah) }}">
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
                            <ul>
                                @forelse ($links as $link)
                                    <li>
                                        <a class="text-primary" href="{{ route('regulations.showid', $link->uuid) }}">
                                        {{
                                            DB::table('regulations')
                                            ->where('id', $link->uuid)
                                            ->first()
                                            ->judul
                                        }}
                                        </a>
                                    </li>
                                @empty
                                -
                                @endforelse
                            </ul>
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
                                        <a href="{{ route('regulations.download', $document->uuid) }}"><i class="fas fa-file-pdf"></i> download</a><br>
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2> Show Regulation</h2>
            </div> --}}
            <div class="pull-right">
                <a class="btn btn-primary mb-3" href="{{ route('regulations.index') }}">kembali</a>
            </div>
        </div>
    </div>

</div>
@endsection
