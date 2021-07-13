@extends('user.cetak0')
@section('content')
<center>
<br><br>
  <button id="print"> Print </button>

<a href="{{ url('/user/prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1>Course List </h1>
<table class="table" >
<tr><th>NIP</th><th>Nama</th><th>tempat</th><th>Gol</th></tr>
 @foreach($employees as $employee)
<tr><td>{{ $employee->nip }}</td>
<td>{{ $employee->nama }}</td>
<td>{{ $employee->tempat_lahir }}</td>
<td>{{ $employee->gol_ruang }}</td> </tr>
@endforeach
</center>
@endsection