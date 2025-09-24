@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 px-2 border-bottom pb-4">
        <div>
            <h2 id="album-name" class="fw-semibold text-dark mb-1">...</h2>
            <p class="text-muted mb-0 fs-6">
                This module shows the <span id="album-name-span" class="fw-semibold">...</span> album
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('photo-journals.index') }}" class="btn btn-danger p-3 px-5" id="back_button">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="container">
        <div class="row" id="imageContainer">

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const albumId = @json($id);
    const BASE_URL = @json($api);
    $(document).ready(function () {
       Fancybox.bind("[data-fancybox]", {
            Image: {
                fit: "cover"
            },
            Toolbar: {
                display: [
                    { id: "counter", position: "center" },
                    "zoom",
                    "fullscreen",
                    "download",
                    "thumbs",
                    "close",
                ],
            },
        });

        loadGalleryImages();
    });

    function loadGalleryImages(endpoint = `${BASE_URL}/api/photo-journals/photos/${albumId}`) {
        const container = $('#imageContainer');
        
        container.empty();

        axios.get(endpoint)
            .then(function (response) {
                const images = response.data.data ?? [];
                const name = response.data.parent.name;
                const container = $('#imageContainer');

                container.empty();
                                
                $('#album-name').text(name);
                $('#album-name-span').text(name);

                if (images.length === 0) {
                    container.append(`
                        <div class="col-12 text-center text-muted py-5">
                            <i class="fas fa-image fa-3x mb-2"></i><br>
                            <span>No images yet.</span>
                        </div>
                    `);
                    return;
                }

                images.forEach(image => {
                    const imagePath = image.image_path; 
                    const imageUrl = `/storage/${imagePath}`;

                    const imageCard = `
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-4">
                            <div class="image position-relative">
                                <a data-fancybox="gallery" href="${BASE_URL}/${imageUrl}">
                                    <img src="${BASE_URL}/${imageUrl}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;" />
                                </a>
                            </div>
                        </div>
                    `;

                    container.append(imageCard);
                });

                Fancybox.bind("[data-fancybox='gallery']");
            })

            .catch(function (error) {
                console.error('Failed to load images:', error);
                container.html('<p class="text-danger">Failed to load images.</p>');
            });
    }
</script>
@endsection

