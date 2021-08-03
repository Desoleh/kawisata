@extends('layouts.admin.appindex')

@section('title', "Upah Pokok Tunjangan Tetap")

@section('index')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- header --}}
                <div class="col-sm-6">
                    <h1>Gaji Pokok Tunjangan tetap</h1>
                </div>
                {{-- breadcrumb --}}
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Gaji Pokok Tunjangan tetap</li>
                    </ol>
                </div>
                {{-- export-import --}}
                <div class="col-sm-4">
                    <a href="{{ route('oncycle.export') }}" class="btn btn-primary mt-2">export to xlsx</a>

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
                            <form action="{{route('oncycle.import') }}" method="POST" enctype="multipart/form-data">
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

                    <button class="btn btn-danger delete_all mt-2" data-url="{{ route('oncycle.deleteAll') }}">Delete All</button>

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
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                    <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped small">
                                    <thead>
                                        <tr>
                                            <th width="50px"><input type="checkbox" id="master"></th>
                                            <th>Bulan</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Nama Jabatan</th>
                                            <th>Bank Gaji</th>
                                            <th>No Rekening</th>
                                            <th>Upah Pokok</th>
                                            <th>Honorarium Pkwt</th>
                                            <th>Bpjs Base</th>
                                            <th>Tunj Perumahan</th>
                                            <th>Tunj Adm Bank</th>
                                            <th>Tunj Kurang Bayar</th>
                                            <th>Pot Kelebihan Bayar</th>
                                            <th>Bruto</th>
                                            <th>Admin Bank</th>
                                            <th>Netpay</th>
                                            <th>id</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @forelse ($oncycles as $oncycle)
                                                <tr>
                                                    <td><input type="checkbox" class="sub_chk" data-id="{{$oncycle->id}}"></td>
                                                    <td>{{$oncycle->bulan}}</td>
                                                    <td>{{$oncycle->nama}}</td>
                                                    <td>{{$oncycle->nip}}</td>
                                                    <td>{{$oncycle->nama_jabatan}}</td>
                                                    <td>{{$oncycle->bank_gaji}}</td>
                                                    <td>{{$oncycle->no_rekening}}</td>
                                                    <td>{{number_format($oncycle->upah_pokok, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->honorarium_pkwt, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->bpjs_base, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->tunj_perumahan, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->tunj_adm_bank, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->tunj_kurang_bayar, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->pot_kelebihan_bayar, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->bruto, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->admin_oncycle, 0, ',', '.')}}</td>
                                                    <td>{{number_format($oncycle->netpay, 0, ',', '.')}}</td>
                                                    <td>{{$oncycle->idoncycle}}</td>
                                                    <td>
                                                        <form action="{{ route('oncycle.destroy',$oncycle->id) }}" method="POST">
                                                            {{-- <a class="btn btn-info btn-sm" href="{{ route('oncycle.show',$post->id) }}">Show</a> --}}
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
@endsection

@push('endscript')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#master').on('click', function(e) {
            if($(this).is(':checked',true))
            {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked',false);
            }
            });

            $('.delete_all').on('click', function(e) {

                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {

                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true){

                        var join_selected_values = allVals.join(",");

                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });

                    $.each(allVals, function( index, value ) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                    }
                }
            });

            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });

            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();

                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });

                return false;
            });
        });
    </script>
@endpush
