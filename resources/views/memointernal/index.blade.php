@extends('layouts.appm')

@section('style')
    @include('layouts.includes.style-m')

@endsection
@section('content')
    <div class="container-fluid">
        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">

            <!-- Main content -->
            <section class="content">
            <div class="row">
                <div class="col-md-3">
                <a href="{{ route('mailbox.compose') }}" class="btn btn-primary btn-block mb-3">Buat Memo Internal</a>

                <div class="card">
                    <div class="card-header disabled">
                    <h3 class="card-title">Kotak Masuk</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-inbox"></i> Memo Internal Masuk
                            <span class="badge bg-primary float-right">12</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-envelope"></i> Disposisi Masuk
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-file-alt"></i> Drafts
                        </a>
                        </li>
                    </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card kotak masuk -->
                <div class="card">
                    <div class="card-header disabled ">
                    <h3 class="card-title ">Kotak Keluar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="fas fa-inbox"></i> Memo Internal Keluar
                            <span class="badge bg-primary float-right">12</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-envelope"></i> Disposisi Terkirim
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-file-alt"></i> Status Memo Internal
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-file-alt"></i> Memo Internal Perlu Diproses
                        </a>
                        </li>

                    </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card kotak keluar -->
                    <!-- /.card-body -->

                <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                    <h3 class="card-title">Memo Internal Masuk</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="table-responsive mailbox-messages">
                        <table id="example1"  class="table table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                        </button>
                                    </td>
                                    <td>Tanggal</td>
                                    <td>Perihal</td>
                                    <td>Dari</td>
                                    {{-- <td>Attachment</td> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mailboxes as $mailbox )
                                <tr>
                                    <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" value="" id="check1">
                                        <label for="check1"></label>
                                    </div>
                                    </td>
                                    <td class="mailbox-date">{{ $mailbox->updated_at }}</td>
                                    <td class="mailbox-subject">{{ $mailbox->perihal }}</td>
                                    <td class="mailbox-name"><a href="#">{{ $mailbox->positions->name }}</a></td>
                                    {{-- <td class="mailbox-attachment">{{ $mailbox->mailbox_attachments->attachment }}</td> --}}
                                </tr>
                                @empty
                                    belum ada Memo Internal masuk
                                @endforelse
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2021-2026 <a href="https://kawisata.id">PT Kereta Api Pariwisata</a>.</strong> All rights reserved.
        </footer>
    </div>
@endsection

@section('script')
    @include('layouts.includes.script-bottom')
    <script>
            $(function () {
                $("#example1")
                .DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
@endsection
@push('after-script')
    <script>
    $(function () {
        //Enable check and uncheck all functionality
        $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
            //Uncheck all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
            $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
            //Check all checkboxes
            $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
            $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
        })

        //Handle starring for font awesome
        $('.mailbox-star').click(function (e) {
        e.preventDefault()
        //detect type
        var $this = $(this).find('a > i')
        var fa    = $this.hasClass('fa')

        //Switch states
        if (fa) {
            $this.toggleClass('fa-star')
            $this.toggleClass('fa-star-o')
        }
        })
    })
    </script>


@endpush
