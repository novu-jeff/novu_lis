@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Barangay Officials</h2>
            <p class="text-muted mb-0">View barangay Officials in this module</p>
        </div>
    </div>
    
    <div class="row" id="membersContainer">
        
    </div>

    <!-- Fallback Message -->
    <div id="noDataMessage" class="text-center text-muted mt-4" style="display: none;">
        No data available.
    </div>
</div>
@endsection

@section('scripts')
<script>
    const BASE_URL = @json($api);
    $(document).ready(function () {
        loadData();
    });
     function loadData() {
        axios.get(`${BASE_URL}/api/barangay-officials`)
            .then(response => {
                const members = response.data.data;
                const container = document.getElementById('membersContainer');
                const noData = document.getElementById('noDataMessage');

                container.innerHTML = '';

                if (!members || members.length === 0) {
                    noData.style.display = 'block';
                    return;
                }

                noData.style.display = 'none';

                members.forEach((member, index) => {
                    const columnClass = index === 0 ? 'col-12' : 'col-md-3 col-sm-4 col-xs-6';

                    const card = `
                        <div class="${columnClass}  d-flex justify-content-center mb-4">
                            <div class="card-container" style="max-width:220px">
                                <img src="${BASE_URL}/storage/${member.image_path || 'https://photostylelab.com/wp-content/uploads/2025/06/smooth-image-high-style-sample.jpeg'}" alt="" class="img-fluid">
                                <div class="card-content">
                                    <div class="name">${member.name}</div>
                                    <div class="position">${member.position}</div>
                                </div>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', card);
                });
            })
            .catch(error => {
                console.error('Failed to load members:', error);
            });
    }
</script>
@endsection
