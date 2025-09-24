@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 border-bottom pb-4">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Photo Journal</h2>
            <p class="text-muted mb-0">Easily manage your photo albums here.</p>
        </div>
    </div>

    <!-- Album Cards -->
    <div class="row" id="album-container">
        <div class="col-12 text-center py-5 text-muted" id="loading-text">Loading albums...</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const BASE_URL = @json($api);
    const alias = @json(config('app.alias'));
    const basePath = alias ? `${alias}/` : '';

    function renderAlbums(albums) {
        const container = $('#album-container');
        container.empty();

        if (!albums.length) {
            container.append(`
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No albums found.
                    </div>
                </div>
            `);
            return;
        }

        albums.forEach(album => {
            const imageSrc = album.image_path 
                ? `/storage/${album.image_path}` 
                : `/default/no-image.png`;

            const cardHtml = `
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-4 d-flex justify-content-center">
                    <div class="album-card">
                        <div class="album-title fw-semibold text-dark">${album.name}</div>
                        <a href="${basePath}photo-journals/photos/${album.id}" class="text-decoration-none">
                            <i class="folder fa-solid fa-folder-open"></i>
                            <img src="${BASE_URL}/${imageSrc}" alt="Album Photo" class="album-image mb-2">
                        </a>
                    </div>
                </div>
            `;
            container.append(cardHtml);
        });
    }

    function renderPagination(meta) {
        const pagination = $('#pagination-wrapper');
        pagination.empty();

        if (meta.total <= meta.per_page) return;

        let html = `<nav><ul class="pagination">`;

        if (meta.current_page > 1) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${meta.current_page - 1}">&laquo;</a></li>`;
        }

        for (let i = 1; i <= meta.last_page; i++) {
            html += `
                <li class="page-item ${i === meta.current_page ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
        }

        if (meta.current_page < meta.last_page) {
            html += `<li class="page-item"><a class="page-link" href="#" data-page="${meta.current_page + 1}">&raquo;</a></li>`;
        }

        html += `</ul></nav>`;
        pagination.html(html);
    }

    function fetchAlbums(page = 1) {
        axios.get(`${BASE_URL}/api/photo-journals?page=${page}`)
            .then(response => {
                const paginatedData = response.data?.data || {};
                const albums = paginatedData.data || [];

                renderAlbums(albums);
                renderPagination({
                    current_page: paginatedData.current_page,
                    last_page: paginatedData.last_page,
                    total: paginatedData.total,
                    per_page: paginatedData.per_page,
                });

                attachPaginationEvents();
            })
            .catch(error => {
                console.error('Error fetching albums:', error);
                $('#album-container').html(`
                    <div class="col-12">
                        <div class="alert alert-danger text-center">
                            Failed to load albums. Please try again later.
                        </div>
                    </div>
                `);
            });
    }

    function attachPaginationEvents() {
        $('#pagination-wrapper').on('click', '.page-link', function (e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page) {
                fetchAlbums(page);
            }
        });
    }

    $(document).ready(() => {
        fetchAlbums();
    });
</script>
@endsection
