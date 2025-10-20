@extends('layouts.app')

@section('content')
<!-- Hero Carousel -->
<div class="container-fluid p-0">
    <div class="hero-carousel">
        <div><img src="https://images.unsplash.com/photo-1508780709619-79562169bc64?w=1000" width="430" height="180" alt="Legislative 1"></div>
        <div><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1000" width="430" height="180" alt="Legislative 2"></div>
        <div><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1000" width="430" height="180" alt="Legislative 3"></div>
        <div><img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?w=1000" width="430" height="180" alt="Legislative 4"></div>
        <div><img src="https://images.unsplash.com/photo-1508780709619-79562169bc64?w=1000" width="430" height="180" alt="Legislative 1"></div>
        <div><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1000" width="430" height="180" alt="Legislative 3"></div>
        <div><img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?w=1000" width="430" height="180" alt="Legislative 4"></div>
        <div><img src="https://images.unsplash.com/photo-1508780709619-79562169bc64?w=1000" width="430" height="180" alt="Legislative 1"></div>
    </div>
</div>

<!-- CTA Grid -->
<div class="container py-5">
    <div class="text-center mb-4">
        <h2>LEGISLATIVE INFORMATION SYSTEM</h2>
        <p class="text-muted">Quick Access</p>
    </div>

    <div class="row g-4" id="cta-container">
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/conference.png" width="80" class="mb-3" alt="Members">
                    <h5 class="card-title">Members</h5>
                    <p class="card-text">View all members of the council.</p>
                    <a href="{{ route('members.index') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/task.png" width="80" class="mb-3" alt="Standing Committee">
                    <h5 class="card-title">Standing Committee</h5>
                    <p class="card-text">Check all standing committees.</p>
                    <a href="{{ route('standing-committee.index') }}" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/region-code.png" width="80" class="mb-3" alt="District Assignment">
                    <h5 class="card-title">District Assignment</h5>
                    <p class="card-text">Browse district assignments.</p>
                    <a href="{{ route('district-assignments.index') }}" class="btn btn-primary">Browse</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/document.png" width="80" class="mb-3" alt="Committee Report">
                    <h5 class="card-title">Committee Report</h5>
                    <p class="card-text">Read committee reports.</p>
                    <a href="{{ route('committee-reports.index') }}" class="btn btn-primary">Read</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/contract.png" width="80" class="mb-3" alt="Resolution Ordinance">
                    <h5 class="card-title">Resolution</h5>
                    <p class="card-text">Access resolutions.</p>
                    <a href="{{ route('resolution.index') }}" class="btn btn-primary">Access</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/hand.png" width="80" class="mb-3" alt="Resolution Ordinance">
                    <h5 class="card-title">Ordinance</h5>
                    <p class="card-text">Access ordinances.</p>
                    <a href="{{ route('resolution.index') }}" class="btn btn-primary">Link</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/meeting.png" width="80" class="mb-3" alt="Session Meeting">
                    <h5 class="card-title">Session Meeting</h5>
                    <p class="card-text">View session meetings.</p>
                    <a href="{{ route('session-meeting.index') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/law.png" width="80" class="mb-3" alt="Executive Order">
                    <h5 class="card-title">Executive Order</h5>
                    <p class="card-text">Browse executive orders.</p>
                    <a href="{{ route('executive-order.index') }}" class="btn btn-primary">Browse</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/camera.png" width="80" class="mb-3" alt="Photo Journal">
                    <h5 class="card-title">Photo Journal</h5>
                    <p class="card-text">See photo journal highlights.</p>
                    <a href="{{ route('photo-journals.index') }}" class="btn btn-primary">See</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/organization.png" width="80" class="mb-3" alt="Organizational Chart">
                    <h5 class="card-title">Organizational Chart</h5>
                    <p class="card-text">View the organizational chart.</p>
                    <a href="{{ route('organization.index') }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/calendar.png" width="80" class="mb-3" alt="Calendar Events">
                    <h5 class="card-title">Calendar Events</h5>
                    <p class="card-text">Check calendar of events.</p>
                    <a href="{{ route('calendar-event.index') }}" class="btn btn-primary">Check</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 cta-item">
            <div class="card text-center shadow-sm h-100">
                <div class="card-body">
                    <img src="https://img.icons8.com/color/96/group.png" width="80" class="mb-3" alt="Barangay Officials">
                    <h5 class="card-title">Barangay Officials</h5>
                    <p class="card-text">Meet the barangay officials.</p>
                    <a href="{{ route('barangay-officials.index') }}" class="btn btn-primary">Meet</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('scripts')
<script>
$(document).ready(function(){
    $('.hero-carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

});
</script>
@endpush
