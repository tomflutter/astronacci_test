@extends('layouts.app') {{-- Layout SB Admin 2 kamu --}}
@section('title', 'Pilih Membership')

@section('content')
<div class="container">

    <!-- Card -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Pilih Membership Anda</h4>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('membership.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="membership_type">Pilih Jenis Membership</label>
                            <select name="membership_type" id="membership_type" required class="form-control">
                                <option value="">-- Pilih Membership --</option>
                                <option value="A">A - 3 Konten</option>
                                <option value="B">B - 10 Konten</option>
                                <option value="C">C - Unlimited</option>
                            </select>
                            @error('membership_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Simpan dan Lanjutkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection