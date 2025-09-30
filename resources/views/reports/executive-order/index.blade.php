@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 pb-3">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Executive Order</h2>
            <p class="text-muted mb-0">View the list of Executive Order</p>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="card">
        <div class="card-body">
            <form id="filterForm" class="row g-3 align-items-end justify-content-center mb-4 px-3">
                <!-- Tags -->
                <div class="col-md-6 col-lg-2">
                    <label for="tags" class="form-label fw-semibold">Tags</label>
                    <input type="text" name="tags" id="tags" class="form-control shadow-sm rounded-3" placeholder="Enter tags">
                </div>

                <!-- Year -->
                <div class="col-md-6 col-lg-2">
                    <label for="year" class="form-label fw-semibold">Year</label>
                    <select name="year" id="year" class="form-select shadow-sm rounded-3">
                        <option value="">Select Year</option>
                        @for ($year = now()->year; $year >= 1925; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Month -->
                <div class="col-md-6 col-lg-2">
                    <label for="month" class="form-label fw-semibold">Month</label>
                    <select name="month" id="month" class="form-select shadow-sm rounded-3">
                        <option value="">Select Month</option>
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Document Date -->
                <div class="col-md-6 col-lg-2">
                    <label for="doc_date" class="form-label fw-semibold">Doc Date</label>
                    <input type="date" name="doc_date" id="doc_date" class="form-control shadow-sm rounded-3">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <!-- Filter Button -->
            <div class="d-flex justify-content-end">
                <button id="filterButton" type="button" class="btn btn-secondary p-3 px-5 rounded-3">
                    Search
                </button>
            </div>
        </div>
    </div>

    <!-- Table for results -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered align-middle">
            <thead class="table-primary bg-opacity-25">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>File(s)</th>
                    <th>Tags</th>
                    <th>Sections</th>
                </tr>
            </thead>
            <tbody id="documentsContainer"></tbody>
        </table>
        <p id="noDataMessage" class="text-muted text-center" style="display: none;">No data found.</p>
    </div>
</div>
@endsection

@section('scripts')
<script>

    let currentPage = 1;
    let lastPage = 1;
    const BASE_URL = @json(config('app.dms_url')); // example: http://127.0.0.1:8000
    const STORAGE_URL = @json(config('app.dms_storage_url', '')); // optional if you store files separately

    function loadDocuments(page = 1) {
        const formData = $('#filterForm').serializeArray();
        formData.push({ name: 'type', value: 5 }); // Add fixed type filter if needed
        formData.push({ name: 'page', value: page }); // add page

        const queryParams = new URLSearchParams(formData.map(item => [item.name, item.value]));
        const endpoint = `${BASE_URL}/api/getdocuments?${queryParams.toString()}`;

       // console.log("Requesting:", endpoint);

        axios.get(endpoint)
            .then(response => {
                const documents = response.data.data;
                currentPage = response.data.current_page;
                lastPage = response.data.last_page;

                renderDocuments(documents);
                renderPagination();
            })
            .catch(error => {
                console.error('Failed to load documents:', error);
                $('#documentsContainer').html('');
                $('#noDataMessage').show();
            });
    }

    function renderDocuments(documents) {
        const container = document.getElementById('documentsContainer');
        const noData = document.getElementById('noDataMessage');

        container.innerHTML = '';

        if (!documents || documents.length === 0) {
            noData.style.display = 'block';
            return;
        }

        noData.style.display = 'none';

        documents.forEach((doc, index) => {
            // Build file links
            let filesHtml = '-';
            if (doc.files && doc.files.length > 0) {
                filesHtml = doc.files.map(file => {
                    const filePath = STORAGE_URL ? `${STORAGE_URL}/storage/${file.file_path}` : file.file_path;
                    return `<a href="${filePath}" target="_blank" style="color:blue">${file.file_name}</a><br/>`;
                }).join('');
            }

            const branchDesc = doc.branch?.description || '-';
            const deptDesc = doc.department?.description || '-';
            const divDesc = doc.division?.description || '-';

            // Build row
            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${doc.title || 'Untitled'}</td>
                    <td>${doc.author || '-'}</td>
                    <td>${filesHtml}</td>
                    <td>${doc.tags || '-'}</td>
                    <td>
                        Branch: ${branchDesc}<br/>
                        Department: ${deptDesc}<br/>
                        Division: ${divDesc}
                    </td>
                </tr>
            `;

            container.insertAdjacentHTML('beforeend', row);
        });
    }

    function renderPagination() {
        let paginationContainer = document.getElementById('paginationContainer');
        if (!paginationContainer) {
            // create pagination container if it doesn't exist
            paginationContainer = document.createElement('div');
            paginationContainer.id = 'paginationContainer';
            paginationContainer.className = 'mt-3 d-flex justify-content-center';
            document.querySelector('.table-responsive').appendChild(paginationContainer);
        }

        let html = '';

        if (currentPage > 1) {
            html += `<button class="btn btn-sm btn-primary me-2" onclick="loadDocuments(${currentPage - 1})">Previous</button>`;
        }

        html += `<span class="align-self-center">Page ${currentPage} of ${lastPage}</span>`;

        if (currentPage < lastPage) {
            html += `<button class="btn btn-sm btn-primary ms-2" onclick="loadDocuments(${currentPage + 1})">Next</button>`;
        }

        paginationContainer.innerHTML = html;
    }

    $(document).ready(function () {
        // Load data when Search button is clicked
        $('#filterButton').on('click', function (e) {
            e.preventDefault();
            loadDocuments();
        });

        // Auto-load all documents on page load
        loadDocuments();
    });
</script>
@endsection
