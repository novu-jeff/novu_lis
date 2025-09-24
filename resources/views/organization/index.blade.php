@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 border-bottom pb-4">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Organizational Chart</h2>
            <p class="text-muted mb-0">This module provides an overview of the Organizational Chart</p>
        </div>
    </div>

    <!-- Org Chart Container -->
    <div id="orgchart-container" class="border rounded shadow-sm bg-primary bg-opacity-10" style="height: 700px;"></div>
</div>
@endsection

@section('scripts')
<!-- Axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- OrgChart JS CDN -->
<script src="https://cdn.balkan.app/orgchart.js"></script>

<!-- Custom Script -->
<script>
    const BASE_URL = @json($api); // Ensure this contains the base API URL

    $(document).ready(function () {
        axios.get(`${BASE_URL}/api/organization`)
            .then(function (response) {
                const orgData = response.data?.data || [];

                if (orgData.length === 0) {
                    $('#orgchart-container').html(
                        "<div class='text-center text-muted mt-5'>No data available to display the organizational chart.</div>"
                    );
                    return;
                }

                const nodes = orgData.map(item => ({
                    id: item.id,
                    pid: item.parent_id ?? undefined,
                    name: item.name,
                    position: item.position,
                    img: item.image_path ? `${BASE_URL}/storage/${item.image_path}` : 'https://cdn.balkan.app/shared/2.jpg'
                }));

                const chart = new OrgChart(document.getElementById("orgchart-container"), {
                    template: "olivia",
                    enableDragDrop: false,
                    scaleInitial: OrgChart.match.boundary,
                    nodeBinding: {
                        field_0: "name",
                        field_1: "position",
                        img_0: "img"
                    },
                    nodes: nodes,
                    nodeMenu: null, // Disable right-click menu
                    nodeMouseClick: OrgChart.action.none // Disable click events
                });
            })
            .catch(function (error) {
                console.error("Failed to load organizational chart data:", error);
                $('#orgchart-container').html(
                    "<div class='text-center text-danger mt-5'>Failed to load chart. Please try again later.</div>"
                );
            });
    });
</script>
@endsection
