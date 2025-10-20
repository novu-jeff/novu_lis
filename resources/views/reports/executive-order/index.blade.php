@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-4">
        <h2 class="fw-semibold text-dark">Executive Orders</h2>
        <p class="text-muted mb-0">Browse by Folder</p>
    </div>

    <!-- Folders Section -->
    <div id="foldersContainer" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
        <p class="text-center text-muted">Loading folders...</p>
    </div>

    <hr class="my-4">

    <!-- View Switch & Refine Search -->
    <div id="documentsSection" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 id="folderTitle" class="fw-semibold mb-0"></h4>
            <div class="d-flex align-items-center">
                <!-- Grid / Table Toggle Icons -->
                <button id="gridViewBtn" class="btn btn-outline-primary me-2 p-2">
                    <i class="fa-solid fa-table-cells"></i>
                </button>
                <button id="tableViewBtn" class="btn btn-outline-primary active p-2">
                    <i class="fa-solid fa-table-list"></i>
                </button>
                <!-- Refine Search -->
                <button id="toggleFilterBtn" class="btn btn-secondary rounded-3 ms-2">
                    Refine Search <i class="bi bi-funnel"></i>
                </button>
            </div>
        </div>

        <!-- Sliding Filter Panel -->
        <div id="filterPanel" class="card mb-3" style="display: none;">
            <div class="card-body">
                <form id="filterForm" class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="tags" class="form-label fw-semibold">Tags</label>
                        <input type="text" name="tags" id="tags" class="form-control shadow-sm rounded-3" placeholder="Enter tags">
                    </div>

                    <div class="col-md-2">
                        <label for="year" class="form-label fw-semibold">Year</label>
                        <select name="year" id="year" class="form-select shadow-sm rounded-3">
                            <option value="">Select Year</option>
                            @for ($year = now()->year; $year >= 1925; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="month" class="form-label fw-semibold">Month</label>
                        <select name="month" id="month" class="form-select shadow-sm rounded-3">
                            <option value="">Select Month</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="doc_date" class="form-label fw-semibold">Doc Date</label>
                        <input type="date" name="doc_date" id="doc_date" class="form-control shadow-sm rounded-3">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button id="filterButton" type="button" class="btn btn-primary rounded-3 w-100">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table View -->
        <div id="tableView" class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-primary bg-opacity-25">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Tags</th>
                        <th>Files</th>
                        <th>Sections</th>
                    </tr>
                </thead>
                <tbody id="documentsContainer"></tbody>
            </table>
        </div>

        <!-- Grid View -->
        <div id="gridView" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" style="display: none;"></div>

        <p id="noDocuments" class="text-muted text-center" style="display: none;">No documents found in this folder.</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
const BASE_URL = @json(config('app.dms_url'));
const STORAGE_URL = @json(config('app.dms_storage_url', ''));

let openFolderId = null;
let currentFolderId = null;
let currentView = 'table'; // default

$(document).ready(function() {
    loadFolders();

    // Toggle filter panel
    $('#toggleFilterBtn').on('click', function() {
        $('#filterPanel').slideToggle(250);
    });

    // Table/Grid switch
    $('#gridViewBtn').on('click', () => switchView('grid'));
    $('#tableViewBtn').on('click', () => switchView('table'));

    // Apply filters
    $('#filterButton').on('click', function() {
        if (!currentFolderId) return;

        const filters = {
            tags: $('#tags').val(),
            year: $('#year').val(),
            month: $('#month').val(),
            doc_date: $('#doc_date').val(),
        };

        loadDocumentsByFolder(currentFolderId, $('#folderTitle').text().replace('Documents in "', '').replace('"', ''), filters);
    });
});

// Load folders
function loadFolders() {
    axios.get(`${BASE_URL}/api/getfolders`)
        .then(response => renderFolders(response.data.data))
        .catch(() => {
            $('#foldersContainer').html('<p class="text-center text-danger">Failed to load folders.</p>');
        });
}

// Render folders
function renderFolders(folders) {
    const container = $('#foldersContainer');
    container.html('');

    if (!folders?.length) {
        container.html('<p class="text-center text-muted w-100">No folders found.</p>');
        return;
    }

    folders.forEach(folder => {
        const card = `
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                <div class="folder-card text-center" 
                    onclick="toggleFolder(${folder.id}, '${folder.name}')"
                    style="cursor:pointer;">
                    
                    <div class="folder-icon-wrapper mb-2">
                        <i id="folder-icon-${folder.id}" class="fa-solid fa-folder text-primary fs-1"></i>
                    </div>

                    <h6 class="fw-semibold text-dark mb-1">${folder.name}</h6>
                    <small class="text-muted d-block">
                        ${folder.branch?.description || '-'}<br>
                        ${folder.division?.description || '-'}
                    </small>
                </div>
            </div>
        `;
        container.append(card);
    });
}

// Toggle folder open/close
function toggleFolder(folderId, folderName) {
    const icon = $(`#folder-icon-${folderId}`);
    const folderCard = icon.closest('.folder-card');

    if (openFolderId === folderId) {
        icon.removeClass('fa-folder-open text-warning').addClass('fa-folder text-primary');
        folderCard.removeClass('active');
        openFolderId = null;
        currentFolderId = null;
        $('#documentsSection').slideUp(300);
        $('#filterPanel').slideUp(300);
        return;
    }

    if (openFolderId !== null) {
        const prevIcon = $(`#folder-icon-${openFolderId}`);
        prevIcon.removeClass('fa-folder-open text-warning').addClass('fa-folder text-primary');
        prevIcon.closest('.folder-card').removeClass('active');
    }

    icon.removeClass('fa-folder text-primary').addClass('fa-folder-open text-warning');
    folderCard.addClass('active');
    openFolderId = folderId;
    currentFolderId = folderId;

    folderCard[0].scrollIntoView({ behavior: 'smooth', block: 'center' });

    $('#documentsSection').slideDown(200);
    loadDocumentsByFolder(folderId, folderName);
}

// Load documents
function loadDocumentsByFolder(folderId, folderName, filters = {}) {
    $('#folderTitle').text(`Documents in "${folderName}"`);
    $('#documentsContainer').html('<tr><td colspan="6" class="text-center text-muted">Loading documents...</td></tr>');
    $('#gridView').html('');
    $('#noDocuments').hide();

    const params = new URLSearchParams({
        folder_id: folderId,
        type: 5,
        ...filters
    });

    axios.get(`${BASE_URL}/api/getdocuments?${params}`)
        .then(response => renderDocuments(response.data.data))
        .catch(() => {
            $('#documentsContainer').html('');
            $('#gridView').html('');
            $('#noDocuments').show();
        });
}

// Render documents for table and grid
function renderDocuments(documents) {
    const tableContainer = $('#documentsContainer');
    const gridContainer = $('#gridView');
    const noData = $('#noDocuments');

    tableContainer.html('');
    gridContainer.html('');

    if (!documents?.length) {
        noData.show();
        return;
    }
    noData.hide();

    documents.forEach((doc, index) => {
        const filesHtml = doc.files?.length
            ? doc.files.map(file => {
                const filePath = STORAGE_URL ? `${STORAGE_URL}/storage/${file.file_path}` : file.file_path;
                return `<a href="${filePath}" target="_blank" class="text-primary">${file.file_name}</a>`;
            }).join('<br>')
            : '-';

        // Table
        tableContainer.append(`
            <tr>
                <td>${index + 1}</td>
                <td>${doc.title}</td>
                <td>${doc.author}</td>
                <td>${doc.tags}</td>
                <td>${filesHtml}</td>
                <td>
                    Branch: ${doc.branch?.description || '-'}<br>
                    Department: ${doc.department?.description || '-'}<br>
                    Division: ${doc.division?.description || '-'}
                </td>
            </tr>
        `);

        // Grid
        gridContainer.append(`
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${doc.title}</h5>
                        <p class="card-text"><strong>Author:</strong> ${doc.author}</p>
                        <p class="card-text"><strong>Tags:</strong> ${doc.tags}</p>
                        <p class="card-text"><strong>Branch:</strong> ${doc.branch?.description || '-'}</p>
                        <p class="card-text"><strong>Division:</strong> ${doc.division?.description || '-'}</p>
                        <p class="card-text"><strong>Files:</strong><br>${filesHtml}</p>
                    </div>
                </div>
            </div>
        `);
    });

    // Show current view
    switchView(currentView);
}

// Switch view
function switchView(view) {
    currentView = view;

    if (view === 'grid') {
        $('#tableView').hide();
        $('#gridView').show();
        $('#gridViewBtn').addClass('active');
        $('#tableViewBtn').removeClass('active');
    } else {
        $('#gridView').hide();
        $('#tableView').show();
        $('#gridViewBtn').removeClass('active');
        $('#tableViewBtn').addClass('active');
    }
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<style>
.folder-card:hover {
    transform: scale(1.05);
    transition: transform 0.2s;
}

.folder-card.active i {
    color: #FFC107 !important; /* Yellow when open */
}
</style>
@endsection
