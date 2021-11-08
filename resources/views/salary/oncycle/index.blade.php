<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Pegawai</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="{{asset('adminlte/vendor/fontawesome-free/css/all.min.css')}}"
    />
    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="{{asset('adminlte/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('adminlte/vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="{{asset('adminlte/vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}" />
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
        @include('layouts.admin.includes.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
        @include('layouts.admin.includes.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    {{-- header --}}
                    <div class="col-sm-6">
                        <h1>Data Pegawai</h1>
                    </div>
                    {{-- breadcrumb --}}
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                        </ol>
                    </div>
                    {{-- export-import --}}
                    <div class="col-sm-4">
                        <a href="{{ route('employee.export') }}" class="btn btn-primary mt-2">export to xlsx</a>
                                    
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
                                <form action="{{route('employee.import') }}" method="POST" enctype="multipart/form-data">
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
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Gelar</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur Thn</th>
                                <th>Umur Bln</th>
                                <th>TMT Kerja</th>
                                <th>Masa Kerja Tahun</th>
                                <th>Masa Kerja Bulan</th>
                                <th>TMT Organik</th>
                                <th>Gol Ruang</th>
                                <th>TMT Pangkat</th>
                                <th>Masa Kerja Pangkat Thn</th>
                                <th>Masa Kerja Pangkat Bln</th>
                                <th>Jenis Pangkat</th>
                                <th>Masa Kerja Golongan Thn</th>
                                <th>Masa Kerja Golongan Bln</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{$employee->nip}}</td>
                                        <td>{{$employee->nama}}</td>
                                        <td>{{$employee->gelar}}</td>
                                        <td>{{$employee->tempat_lahir}}</td>
                                        <td>{{$employee->tanggal_lahir}}</td>
                                        <td>{{$employee->umur_thn}}</td>
                                        <td>{{$employee->umur_bln}}</td>
                                        <td>{{$employee->tmt_kerja}}</td>
                                        <td>{{$employee->mk_tahun}}</td>
                                        <td>{{$employee->mk_bulan}}</td>
                                        <td>{{$employee->tmt_organik}}</td>
                                        <td>{{$employee->gol_ruang}}</td>
                                        <td>{{$employee->tmt_pangkat}}</td>
                                        <td>{{$employee->mk_pkt_th}}</td>
                                        <td>{{$employee->mk_pkt_bl}}</td>
                                        <td>{{$employee->jenis_pangkat}}</td>
                                        <td>{{$employee->mkg_thn}}</td>
                                        <td>{{$employee->mkg_bln}}</td>
                                        <td class="text-center">
                                            <form action="{{ route('employees.destroy',$employee->nip) }}" method="POST">

                                                <a class="btn btn-info btn-sm" href="{{ route('employees.show',$employee->nip) }}">Show</a>

                                                <a class="btn btn-primary btn-sm" href="{{ route('employees.edit',$employee->nip) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            </form>
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
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.1.0</div>
        <strong
          >Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('adminlte/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminlte/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('adminlte/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('adminlte/vendor/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte/js/demo.js')}}"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $("#example1")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
          })
          .buttons()
          .container()
          .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
          paging: true,
          lengthChange: false,
          searching: false,
          ordering: true,
          info: true,
          autoWidth: false,
          responsive: true,
        });
      });
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
    </script>
  </body>
</html>
