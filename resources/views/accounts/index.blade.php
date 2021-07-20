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
                    <h1>Akun dan Alamat</h1>
                </div>
                {{-- breadcrumb --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Akun dan Alamat</li>
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
                            <form action="{{route('account.import') }}" method="POST" enctype="multipart/form-data">
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
                            <th>No. KTP</th>
                            <th>No. NPWP</th>
                            <th>No. Jamsostek</th>
                            <th>Alamat 1</th>
                            <th>Alamat 2</th>
                            <th>Kecamatan</th>
                            <th>Kota</th>
                            <th>Kode Pos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($accounts as $account)
                                <tr>
                                    <td>{{$account->nip}}</td>
                                    <td>{{$account->ktp}}</td>
                                    <td>{{$account->npwp}}</td>
                                    <td>{{$account->jamsostek}}</td>
                                    <td>{{$account->alamat1}}</td>
                                    <td>{{$account->alamat2}}</td>
                                    <td>{{$account->District}}</td>
                                    <td>{{$account->City}}</td>
                                    <td>{{$account->Postal}}</td>


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
