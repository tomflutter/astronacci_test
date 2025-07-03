@extends('layouts.app') <!-- Pastikan kamu punya layout admin SB Admin 2 -->

@section('content')
    <!-- Judul Video -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-gray-800">{{ $video->judul }}</h1>
    </div>

    <!-- Isi Video / Konten -->
    <div class="card shadow mb-4">
        <div class="card-body">
            {!! nl2br(e($video->konten)) !!}
        </div>
    </div>

    <!-- Tombol kembali -->
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
@endsection
