@extends('layouts.admin.appindex')

@section('title', 'Upah Pokok Tunjangan Tetap')
@section('salary', 'Active')


@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- header --}}
                <div class="col-sm-6">
                    <h1>Kenaikan Gaji Berkala</h1>
                </div>
                {{-- breadcrumb --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">KGB</li>
                    </ol>
                </div>
                {{-- export-import --}}
                <div class="col-sm-4">
                    {{-- <a href="{{ route('kgb.export') }}" class="btn btn-primary mt-2">export to xlsx</a> --}}

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                        Import Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Impor Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('kgb.import') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <input type="file" name="import_file">
                                        <br />
                                        {{-- <input type="submit" value="Import" class="btn btn-info"> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" value="Import"  class="btn btn-primary">Impor data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">

                <div class="card">
                {{-- <div class="card-header"> --}}
                    {{-- <h3 class="card-title">Data Pekerja</h3> --}}
                {{-- </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped small">
                    <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>KGB Sebelumnya</th>
                            <th>TMT KGB</th>
                            <th>KGB Berikutnya</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($kgbs as $kgb)
                                <tr>
                                    <td>{{$kgb->nip}}</td>
                                    <td>{{date('d-m-Y', strtotime($kgb->startdate))}}</td>
                                    <td>{{date('d-m-Y', strtotime($kgb->enddate))}}</td>
                                    <td>{{date('d-m-Y', strtotime($kgb->prevkgb))}}</td>
                                    <td>{{date('d-m-Y', strtotime($kgb->tmtkgb))}}</td>
                                    <td>{{date('d-m-Y', strtotime($kgb->nextkgb))}}</td>

                                    <td class="text-center">
                                        {{-- <form action="{{ route('kgb.destroy',$kgb->nip) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('kgbs.show',$kgb->nip) }}">Show</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('kgbs.edit',$kgb->nip) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">No User Found</td>
                                    </tr>
                            @endforelse
                    </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
