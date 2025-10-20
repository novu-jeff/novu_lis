@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h2>{{ $member->name }}</h2>
        <p class="text-muted" style="font-size: 1.09em;">{{ $member->position }}</p>
    </div>

    <div class="d-flex justify-content-center">
        <img src="{{ $member->image_path  ? 'https://lis-cms.novulutions.com/jones/storage/' . $member->image_path 
                : 'https://photostylelab.com/wp-content/uploads/2025/06/smooth-image-high-style-sample.jpeg' }}"
             alt="{{ $member->name }}"
             class="img-fluid rounded shadow"
             style="max-width: 300px;">
    </div>
     <!-- ✅ Member description -->
    <div class="mt-4">
        
        <p class="text-center" style="max-width: 700px; margin: auto; font-size: 1.05em ; line-height: 1.6; color: #555; padding: 0 15px;">
            {{ $member->description ?? 'No description available.' }}
        </p>
    </div>
</div>
@endsection
