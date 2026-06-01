@extends('layouts.feedback')

@section('title', 'Feedback Toko Cellcom Palangkaraya')

@section('body')
    <main>
        <section class="hero">
            <div class="container">
                <div class="eyebrow">Toko Cellcom Palangkaraya</div>
                <h1>Hai, bagaimana pengalaman Anda di toko kami?</h1>
                <p class="hero-copy">
                    Kami ingin mendengar pengalaman kamu saat berkunjung ke Cellcom Palangkaraya.
                    Ulasan ini bersifat privat dan hanya bisa dilihat oleh admin toko.
                </p>

                <section id="form-review" class="review-stage @if ($errors->any()) is-open @endif" aria-labelledby="feedback-title">
                    <a class="button preview-cta js-open-feedback" href="#message">Tulis pengalaman anda</a>

                    <div class="form-card">
                        <div class="form-card-inner">
                            @if ($errors->any())
                                <div class="error-list">
                                    <strong>Mohon cek lagi:</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h2 id="feedback-title" class="section-title">Sampaikan pengalaman kamu disini</h2>
                            <p class="section-note">
                                Ceritakan pelayanan, produk, atau hal yang menurut kamu perlu kami perbaiki.
                            </p>

                            <form class="form-grid" method="POST" action="{{ route('feedback.store') }}">
                                @csrf

                                <div class="form-grid two">
                                    <div class="field">
                                        <label for="customer_name">Nama</label>
                                        <input id="customer_name" name="customer_name" value="{{ old('customer_name') }}" placeholder="Masukkan nama kamu" required>
                                    </div>

                                    <div class="field">
                                        <label for="phone">Nomor WhatsApp</label>
                                        <input id="phone" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890" required>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Nilai pengalaman kamu</label>
                                    <div class="rating-row">
                                        @for ($rating = 1; $rating <= 5; $rating++)
                                            <label>
                                                <input type="radio" name="rating" value="{{ $rating }}" @checked((string) old('rating', '5') === (string) $rating)>
                                                <span>{{ $rating }}</span>
                                            </label>
                                        @endfor
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="message">Ulasan</label>
                                    <textarea id="message" name="message" required placeholder="Tuliskan pengalaman anda...">{{ old('message') }}</textarea>
                                </div>

                                <p class="privacy-note">
                                    Ulasan ini tidak dipublikasikan. Hanya admin Cellcom Palangkaraya yang dapat membacanya.
                                </p>

                                <button class="button button-primary" type="submit">Kirim ulasan</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.js-open-feedback').forEach((trigger) => {
            trigger.addEventListener('click', (event) => {
                const stage = document.querySelector('#form-review');
                const message = document.querySelector('#message');

                if (! stage) {
                    return;
                }

                event.preventDefault();
                stage.classList.add('is-open');
                stage.scrollIntoView({ behavior: 'smooth', block: 'start' });

                window.setTimeout(() => {
                    message?.focus({ preventScroll: true });
                }, 340);
            });
        });
    </script>
@endpush
