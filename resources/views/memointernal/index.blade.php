@extends('layouts.appm')

@section('style')
    @include('layouts.includes.style-m')

@endsection
@section('content')
    <div class="container-fluid small">
        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">

            <!-- Main content -->
            <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('mailbox.compose') }}" class="btn btn-primary btn-block mb-3">Buat Memo Internal</a>

                    @include('layouts.includes.sidebarm')
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header inbox">
                        <h3 class="card-title">Memo Internal Masuk</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="table-responsive mailbox-messages mt-1 p-2">
                            <table id="example2"  class="table table-sm  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Perihal</td>
                                        <td>Dari</td>
                                        {{-- <td>Attachment</td> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mailboxes as $mailbox )
                                    <tr>
                                        <td class="mailbox-date" width="17%">{{ $mailbox->updated_at }}</td>
                                        <td class="mailbox-subject">{{ $mailbox->perihal }}</td>
                                        <td class="mailbox-name"  width="20%"><a href="#">{{ $mailbox->positions->name }}</a></td>
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
                    autoWidth: true,

                    buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
                $("#example2").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: true,
                pageline: true,
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
