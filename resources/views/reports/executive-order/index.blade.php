@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 pb-3">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Executive Order</h2>
            <p class="text-muted mb-0">View the list Executive Order</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <!-- Filter Form -->
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
                    <th>File</th>
                    <th>Tags</th>
                </tr>
            </thead>
            <tbody id="membersContainer"></tbody>
        </table>
        <p id="noDataMessage" class="text-muted text-center" style="display: none;">No data found.</p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const BASE_URL = @json(config('app.dms_url'));
    const token = @json(config('app.dms_token'));
    const BASE_STORAGE_URL = @json(config('app.dms_storage_url'));

    $(document).ready(function () {
        $('#filterButton').on('click', function (e) {
            e.preventDefault();
            loadData();
        });
    });

    function loadData() {
        const formData = $('#filterForm').serializeArray();
        formData.push({ name: 'type', value: 5 });

        const queryParams = new URLSearchParams(formData.map(item => [item.name, item.value]));

        axios.get(`${BASE_URL}/api/documents?${queryParams.toString()}`, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(response => {
            const documents = response.data.data;
            console.log(documents[0]);
            const container = document.getElementById('membersContainer');
            const noData = document.getElementById('noDataMessage');

            container.innerHTML = '';

            if (!documents || documents.length === 0) {
                noData.style.display = 'block';
                return;
            }

            noData.style.display = 'none';

            documents.forEach((doc, index) => {
                let filesHtml = '-';
                if (doc.files && doc.files.length > 0) {
                    filesHtml = doc.files.map(file => {
                        return `<a href="#" onclick="openFile('${BASE_STORAGE_URL}/storage/${file.file_path}')" style="color:blue">${file.file_name}</a><br/>`;
                    }).join('');
                }

                const branchDesc = doc.branch?.description || '-';
                const deptDesc = doc.department?.description || '-';
                const divDesc = doc.division?.description || '-';

                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${doc.title || 'Untitled'}</td>
                        <td>${doc.author || '-'}</td>
                        <td>${filesHtml}</td>
                        <td>
                            <span class="fw-bold">Branch:</span> ${branchDesc}<br />
                            <span class="fw-bold">Department:</span> ${deptDesc}<br />
                            <span class="fw-bold">Division:</span> ${divDesc}
                        </td>
                    </tr>
                `;

                container.insertAdjacentHTML('beforeend', row);
            });
        })
        .catch(error => {
            console.error('Failed to load documents:', error);
        });
    }
    function openFile(filePath) {
        if (!filePath) return;
        window.open(filePath, '_blank');
    }
</script>
@endsection
