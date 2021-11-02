
@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/treeview.css') }}">
@endpush
@push('script-after')
    <script src="{{ asset('js/treeview.js') }}"></script>
@endpush
@section('title', $title)

@section('sidebar')
                @include('layouts.includes.sidebar')
@endsection

@section('togglemenu')
    @include('layouts.includes.togglemenu')
@endsection

@section('content')

<div class="container">
    <div class="card card-primary card-outline mt-1 ">
        <div class="card-header">Struktur Organisasi</div>
        <div class="card-body box-profile">
	  			<div class="row">

	  				<div class="col-md-6">

	  					<h3>Category List</h3>

				        <ul id="tree1">

				            @foreach($positions as $position)

				                <li>

				                    {{ $position->name }}

				                    @if(count($position->childs))

				                        @include('user.strukturchild',['childs' => $position->childs])

				                    @endif

				                </li>

				            @endforeach

				        </ul>

	  				</div>

	  			</div>

        </div>
    </div>
</div>
@endsection

