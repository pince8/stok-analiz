@extends('layouts.guest')

@section('content')

    <div class="card shadow">

        <div class="card-body">

            <h4 class="text-center mb-4">Stok Paneli Giriş</h4>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Şifre</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label">Beni hatırla</label>
                </div>

                <button class="btn btn-primary w-100">
                    Giriş Yap
                </button>

            </form>

        </div>

    </div>

@endsection
