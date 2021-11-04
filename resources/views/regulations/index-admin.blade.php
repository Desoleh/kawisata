@extends('layouts.admin.appindex')
{{-- @section('title', $title) --}}
@push('style-before')
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
@endpush
@push('script-after')
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
@endpush
@section('index')
<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
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
        </section>

        <a class="btn btn-primary" href="{{ route('regulations.compose') }}">Tambah Regulasi</a>
        <div>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#regulation">
                        Import Data
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="regulation" tabindex="-1" aria-labelledby="regulationLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="regulationLabel">Impor Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('regulation.import') }}" method="POST" enctype="multipart/form-data">
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
                    </div>        </div>
                <div class="card-body">
                    <table  class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr style="font-weight: bold;">
                            <td>nomor</td>
                            <td>Judul</td>
                            <td>show</td>
                            <td>edit</td>
                            <td>delete</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($regulations as $regulation )
                            <tr>
                                <td>
                                    {{$regulation->kode}}
                                </td>
                                <td>
                                    {{$regulation->judul}}
                                    <a href="{{ route('regulations.show',$regulation->uuid) }}">selengkapnya....</a>
                                </td>
                                <td>
                                        <a class="btn btn-info" href="{{ route('regulations.show',$regulation->uuid) }}">Show</a>
                                </td>
                                <td>
                                        <a class="btn btn-primary" href="{{ route('regulations.edit',$regulation->uuid) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('regulations.destroy',$regulation->uuid) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


