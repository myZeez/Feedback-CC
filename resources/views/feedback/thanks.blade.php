@extends('layouts.feedback')

@section('title', 'Terima Kasih - Cellcom Palangkaraya')

@section('body')
    <main class="hero">
        <div class="container">
            <div class="eyebrow">Feedback terkirim</div>
            <h1>Terima kasih sudah berbagi pengalaman.</h1>
            <p class="hero-copy">
                Masukan kamu sudah masuk ke admin Cellcom Palangkaraya dan tidak dipublikasikan ke halaman umum.
            </p>

            <div class="hero-actions">
                <a class="button button-primary" href="{{ route('feedback.create') }}">Kirim ulasan lain</a>
            </div>
        </div>
    </main>
@endsection
