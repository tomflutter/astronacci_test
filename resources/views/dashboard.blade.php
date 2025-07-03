@extends('layouts.app')

@section('content')
@php
        $user = auth()->user();
        $articleUsed = $user->access_logs()->where('type', 'article')->count();
        $videoUsed = $user->access_logs()->where('type', 'video')->count();

        $limit = match ($user->membership_type) {
            'A' => 3,
            'B' => 10,
            'C' => '∞',
            default => 0,
        };

        $articleRemaining = is_numeric($limit) ? $limit - $articleUsed : '∞';
        $videoRemaining = is_numeric($limit) ? $limit - $videoUsed : '∞';
    @endphp
    <h1 class="h3 mb-4 text-gray-800">Selamat datang, {{ $user->name }}</h1>

    <!-- Kartu Statistik -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Artikel</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $articleRemaining }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sisa Video</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $videoRemaining }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Artikel -->
    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Akses Artikel</h5>
            <div class="row">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="col-md-2 mb-3">
                        <a href="{{ url('/artikel/' . $i) }}" class="btn btn-primary w-100">
                            Artikel {{ $i }}
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Video -->
    <div class="row mt-4">
        <div class="col-12">
            <h5 class="mb-3">Akses Video</h5>
            <div class="row">
                @for ($i = 1; $i <= 10; $i++)
                    <div class="col-md-2 mb-3">
                        <a href="{{ url('/video/' . $i) }}" class="btn btn-success w-100">
                            Video {{ $i }}
                        </a>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
