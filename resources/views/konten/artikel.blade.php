@extends('layouts.app')

@section('content')
    <!-- Judul Artikel -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-gray-800">{{ $artikel->judul }}</h1>
    </div>

    <!-- Isi Artikel -->
    <div class="card shadow mb-4">
        <div class="card-body">
            {!! nl2br(e($artikel->konten)) !!}
        </div>
    </div>
@endsection
