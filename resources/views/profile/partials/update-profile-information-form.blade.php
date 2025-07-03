<section>
    <h5 class="mb-3 font-weight-bold text-primary">Informasi Profil</h5>
    <p class="text-muted mb-4">
        Perbarui informasi akun dan alamat email Anda.
    </p>

    <!-- Form Kirim Ulang Verifikasi Email -->
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Form Update Profil -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <!-- Nama -->
        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Verifikasi Email -->
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning mt-3">
                Alamat email Anda belum diverifikasi.
                <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
                    Klik di sini untuk mengirim ulang email verifikasi.
                </button>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success mt-2">
                    Tautan verifikasi baru telah dikirim ke alamat email Anda.
                </div>
            @endif
        @endif

        <!-- Tombol Simpan -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success ml-3">Disimpan.</span>
            @endif
        </div>
    </form>
</section>
