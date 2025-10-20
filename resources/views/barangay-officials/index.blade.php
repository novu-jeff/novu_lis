@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center align-items-center mb-4 px-2">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Barangay Officials</h2>
            <p class="text-muted mb-0">View barangay Officials in this module</p>
        </div>
    </div>

    <!-- Barangay Filter -->
    <div class="mb-4 text-center">
        <select id="barangaySelect" class="form-select w-auto d-inline-block">
            <option value="">All Barangays</option>
            @foreach ($barangays as $barangay)
                <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row" id="membersContainer"></div>
    <div id="noDataMessage" class="text-center text-muted mt-4" style="display: none;">
        No data available.
    </div>
</div>
@endsection

@section('scripts')
<script>
    //const BASE_URL = @json(url('api_url'));
    const BASE_URL = @json($api);

    $(document).ready(function () {
        loadData();

        $('#barangaySelect').on('change', function () {
            loadData($(this).val());
        });
    });

    function loadData(barangayId = '') {
         console.log('Loading data from:', `${BASE_URL}/api/barangay-officials`);
        let url = `${BASE_URL}/api/barangay-officials`;
        if (barangayId) url += `?barangay_id=${barangayId}`;

        axios.get(url)
            .then(response => {
                const members = response.data.data;
                const container = $('#membersContainer');
                const noData = $('#noDataMessage');

                container.empty();
                if (!members.length) {
                    noData.show();
                    return;
                }

                noData.hide();

                members.forEach((member, index) => {
                    const columnClass = index === 0 ? 'col-12' : 'col-md-3 col-sm-4 col-xs-6';
                    const card = `
                        <div class="${columnClass} d-flex justify-content-center mb-4">
                            <div class="card-container text-center" style="max-width:220px">
                                <img src="${BASE_URL}/storage/${member.image_path || 'placeholder.jpg'}" class="img-fluid rounded mb-2" alt="${member.name}">
                                <div class="fw-semibold">${member.name}</div>
                                <div class="text-muted small">${member.position || ''}</div>
                                <div class="badge bg-primary mt-1">${member.barangay?.name || 'No Barangay'}</div>
                            </div>
                        </div>
                    `;
                    container.append(card);
                });
            })
            .catch(error => console.error('Error loading officials:', error));
    }
</script>
@endsection
