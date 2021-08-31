@extends('layouts.app-r')
{{-- @section('title', $title) --}}
@push('style-before')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@endpush
@push('script-after')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#peraturan").DataTable({
                lengthChange: false,
            });
        });
    </script>
@endpush
@section('content')
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
    <div class="card-body">
        <table  class="table table-bordered table-striped" id="peraturan">
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

@endsection


