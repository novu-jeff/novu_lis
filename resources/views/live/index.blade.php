@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="text-center mb-4">
        <h3>Live Streaming</h3>
        <p class="text-muted">Watch the current live session</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            @if($embedUrl)

                <div class="ratio ratio-16x9">
                    <iframe
                        src="{{ $embedUrl }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ $url }}" target="_blank" class="btn btn-outline-primary">
                        Open in Facebook / YouTube
                    </a>
                </div>

            @else

                <div class="alert alert-warning text-center">
                    No live stream available.
                </div>

            @endif

        </div>
    </div>

</div>

@endsection