@extends('layouts.app')

@section('content')
<!-- Hero Carousel -->
<div class="container-fluid p-0">
    <div class="hero-carousel">
       
    </div>
</div>

<!-- CTA Grid -->
<div class="container py-5">
    <div class="text-center mb-4">
        <h2>LEGISLATIVE INFORMATION SYSTEM</h2>
        <p class="text-muted">Quick Access</p>
    </div>

   @include('partials.cta-grid')
</div>
@endsection



@push('scripts')
<script>
$(document).ready(function() {
    
    //const baseUrl  = config('app.api_url');
    const baseUrl = @json(config('app.api_url'));
    console.log('BASE_URL:', baseUrl);

    function loadPhotos() {
        axios.get(`${baseUrl}/api/gal-photos`)
            .then(response => {
                console.log("API response:", response.data);

                // Access the array correctly
                const photos = response.data.photos;

                if (!Array.isArray(photos)) {
                    throw new Error('Invalid API response format');
                }

                const galleryContainer = document.querySelector('.hero-carousel');
                galleryContainer.innerHTML = '';

                photos.forEach(photo => {
                    const slide = document.createElement('div');
                    slide.innerHTML = `
                        <img src="${photo.image_url}" 
                            alt="${photo.title}" 
                            class="img-fluid"/>
                    `;
                    galleryContainer.appendChild(slide);
                });

                // Initialize slick after loading
                $('.hero-carousel').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            })
            .catch(error => {
                console.error('Error loading gallery photos:', error);
            });
    }

    // Load photos on page load
    loadPhotos();
});
</script>
@endpush
