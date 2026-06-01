@extends('layouts.feedback')

@section('title', 'Admin Feedback - Cellcom Palangkaraya')
@section('body_class', 'admin-body')

@section('body')
    <main class="admin-page">
        <div class="container">
            <header class="admin-header">
                <div>
                    <h1>Ulasan Pelanggan</h1>
                    <p>Semua ulasan bersifat privat dan hanya tampil di admin.</p>
                </div>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="button button-light" type="submit">Logout</button>
                </form>
            </header>

            <section class="stats" aria-label="Ringkasan feedback">
                <div class="stat">
                    <strong>{{ $totalFeedback }}</strong>
                    <span>Total ulasan</span>
                </div>
                <div class="stat">
                    <strong>{{ $averageRating ?: '-' }}</strong>
                    <span>Rata-rata rating</span>
                </div>
            </section>

            <section class="admin-card">
                @if ($feedback->isEmpty())
                    <div class="empty-state">
                        Belum ada ulasan masuk.
                    </div>
                @else
                    <div class="feedback-list">
                        @foreach ($feedback as $item)
                            <article class="feedback-item">
                                <div class="feedback-meta">
                                    <span>{{ $item->created_at->format('d M Y, H:i') }}</span>
                                    <span class="pill">Rating {{ $item->rating }}/5</span>
                                </div>
                                <h2>{{ $item->customer_name ?: 'Pelanggan anonim' }}</h2>
                                @if ($item->phone)
                                    <div class="feedback-meta" style="margin-bottom: 8px;">
                                        <span>Kontak: {{ $item->phone }}</span>
                                    </div>
                                @endif
                                <p>{{ $item->message }}</p>
                            </article>
                        @endforeach
                    </div>

                    <div class="pagination">
                        {{ $feedback->links() }}
                    </div>
                @endif
            </section>
        </div>
    </main>
@endsection
