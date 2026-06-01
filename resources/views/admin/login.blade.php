@extends('layouts.feedback')

@section('title', 'Login Admin - Feedback Cellcom')
@section('body_class', 'admin-body')

@section('body')
    <main class="admin-page">
        <div class="container" style="max-width: 480px;">
            <div class="admin-header">
                <div>
                    <h1>Login Admin</h1>
                    <p>Masuk untuk melihat ulasan pelanggan.</p>
                </div>
            </div>

            <section class="form-card">
                <div class="form-card-inner">
                    <h2 class="section-title">Selamat datang</h2>
                    <p class="section-note">Gunakan akun admin untuk membuka dashboard feedback.</p>

                    @if ($errors->any())
                        <div class="error-list">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form class="form-grid" method="POST" action="{{ route('admin.login.store') }}">
                        @csrf

                        <div class="field">
                            <label for="email">Email admin</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" required>
                        </div>

                        <label class="privacy-note">
                            <input type="checkbox" name="remember" value="1">
                            Ingat saya
                        </label>

                        <button class="button button-primary" type="submit">Masuk</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
