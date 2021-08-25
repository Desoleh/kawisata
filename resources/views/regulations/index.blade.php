@extends('layouts.app')
@section('title', $title)
@push('style-before')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
@endpush
@push('script-after')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endpush
@section('content')
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">Frontliner</div>
                <div class="card-body">
                <table  class="table table-striped" id="frontliner">
                  <thead>
                    <tr>
                      <th>Tentang</th>
                      <th>Unduh</th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($data2 as $data)
                    <tr>
                            <td>{{ $data->kedudukan }}</td>
                            <td>{{ $data->jumlah }}</td>
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


