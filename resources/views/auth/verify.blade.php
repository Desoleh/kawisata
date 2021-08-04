@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Alamat Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi email terbaru telah kami kirim ke alamat email anda.') }}
                        </div>
                    @endif

                    {{ __('sebelum memulai mohon periksa verifikasi email anda.') }}
                    {{ __('Jika anda tidak menerima verifikasi email, cek halaman spam atau kirim permintaan verifikasi ulang') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kirim ulang permintaan verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
