@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 pb-3 border-bottom">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Assignments & Members</h2>
            <p class="text-muted mb-0">Each assignment with its members</p>
        </div>
    </div>

    <div id="assignmentsContainer" class="row"></div>

    <div id="noDataMessage" class="text-center text-muted mt-4" style="display: none;">
        No data available.
    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const BASE_URL = @json($api);

    $(document).ready(function () {
        loadData();
    });

    function loadData() {
        axios.get(`${BASE_URL}/api/district-assignments`)
            .then(response => {
                const data = response.data.data;
                const container = document.getElementById('assignmentsContainer');
                const noData = document.getElementById('noDataMessage');

                container.innerHTML = '';

                if (!data || data.length === 0) {
                    noData.style.display = 'block';
                    return;
                }

                noData.style.display = 'none';

                data.forEach((assignment, index) => {
                    const collapseId = `membersCollapse${index}`;

                    const sortedMembers = (assignment.members || []).sort((a, b) => {
                        const posA = (a.position || '').toLowerCase();
                        const posB = (b.position || '').toLowerCase();
                        if (posA === 'chairman') return -1;
                        if (posB === 'chairman') return 1;
                        return 0;
                    });

                    const membersTable = sortedMembers.length > 0 ? `
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${sortedMembers.map(m => `
                                        <tr>
                                            <td>${m.name}</td>
                                            <td>${m.position || 'No Position'}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    ` : `<div class="text-muted px-3 py-2">No members</div>`;

                    const card = `
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm border">
                                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center"
                                     onclick="toggleCollapse('${collapseId}', this)"
                                     style="cursor: pointer;">
                                    <span>${assignment.name}</span>
                                    <i class="bi bi-chevron-down toggle-icon"></i>
                                </div>
                                <div class="collapse" id="${collapseId}">
                                    <div class="card-body p-2">
                                        ${membersTable}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    container.insertAdjacentHTML('beforeend', card);
                });
            })
            .catch(error => {
                console.error('Failed to load assignments:', error);
                document.getElementById('noDataMessage').textContent = 'Error loading data.';
                document.getElementById('noDataMessage').style.display = 'block';
            });
    }

    function toggleCollapse(id, headerEl) {
        const collapseEl = document.getElementById(id);
        const icon = headerEl.querySelector('.toggle-icon');

        if (collapseEl.style.display === 'block') {
            collapseEl.style.display = 'none';
            icon.classList.remove('rotate');
        } else {
            collapseEl.style.display = 'block';
            icon.classList.add('rotate');
        }
    }
</script>

<style>
    .toggle-icon {
        transition: transform 0.3s ease;
    }
    .toggle-icon.rotate {
        transform: rotate(180deg);
    }
    .collapse {
        display: none;
    }
</style>
@endsection
