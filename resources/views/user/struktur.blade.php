
@extends('layouts.app')

@section('title', $title)

@section('sidebar')
                @include('layouts.includes.sidebar')
@endsection

@section('togglemenu')
    @include('layouts.includes.togglemenu')
@endsection

@section('content')


                    <div class="card card-primary card-outline mt-1 ">
                        <div class="card-body box-profile">
                            Struktur
                        </div>
                    </div>

@endsection

