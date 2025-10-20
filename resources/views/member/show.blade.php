@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-semibold">{{ $member->name }}</h2>
        <p class="text-muted fs-5">{{ $member->position }}</p>
    </div>

    <div class="row g-4">
        <!-- Left Column: Photo -->
        <div class="col-md-4 text-center">
            <img src="{{ $member->image_path 
                ? $api . '/storage/' . $member->image_path 
                : asset('default/profile.png') }}"
                alt="{{ $member->name }}"
                class="img-fluid rounded shadow"
                style="max-width: 100%; object-fit: cover;">

            <!-- Optional: Description below photo -->
            @if($member->description)
                <p class="text-secondary mt-3" style="line-height: 1.6;">
                    {{ $member->description }}
                </p>
            @endif
        </div>

        <!-- Right Column: Details -->
        <div class="col-md-8">
            <!-- Contact Information -->
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">Contact Information</h4>
                <ul class="list-unstyled ps-3">
                    <li><strong>Email:</strong> {{ $member->email ?? 'N/A' }}</li>
                    <li><strong>Contact Number:</strong> {{ $member->contact_number ?? 'N/A' }}</li>
                    <li><strong>Address:</strong> {{ $member->address ?? 'N/A' }}</li>
                </ul>
            </div>

            <!-- Term Duration -->
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">Term Duration</h4>
                <ul class="list-unstyled ps-3">
                    <li><strong>Start:</strong> {{ $member->term_start ?? 'N/A' }}</li>
                    <li><strong>End:</strong> {{ $member->term_end ?? 'N/A' }}</li>
                </ul>
            </div>

            <!-- Achievements -->
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">Achievements</h4>
                @if(!empty($member->achievements))
                    <ul class="list-group list-group-flush shadow-sm rounded-3">
                        @foreach(explode("\n", $member->achievements) as $achievement)
                            <li class="list-group-item">{{ trim($achievement) }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No achievements listed.</p>
                @endif
            </div>

            <!-- Priority Projects -->
            <div class="mb-4">
                <h4 class="fw-bold text-primary mb-3">Priority Projects</h4>
                @if(!empty($member->priority_projects))
                    <ul class="list-group list-group-flush shadow-sm rounded-3">
                        @foreach(explode("\n", $member->priority_projects) as $project)
                            <li class="list-group-item">{{ trim($project) }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No priority projects listed.</p>
                @endif
            </div>

            <!-- Social Media -->
            <div class="mt-4">
                <h4 class="fw-bold text-primary mb-3">Connect with {{ $member->name }}</h4>
                <div class="d-flex gap-3">
                    @if($member->social_facebook)
                        <a href="{{ $member->social_facebook }}" target="_blank" class="btn btn-outline-primary rounded-circle">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if($member->social_twitter)
                        <a href="{{ $member->social_twitter }}" target="_blank" class="btn btn-outline-info rounded-circle">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif
                    @if($member->social_instagram)
                        <a href="{{ $member->social_instagram }}" target="_blank" class="btn btn-outline-danger rounded-circle">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
