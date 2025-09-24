@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-center align-items-center mb-4 px-2 border-bottom pb-3">
        <div class="text-center">
            <h2 class="fw-semibold text-dark mb-1">Calendar Events</h2>
            <p class="text-muted mb-0">View and manage your scheduled events</p>
        </div>
    </div>

    <!-- FullCalendar Container -->
    <div class="shadow-lg p-4 rounded-3" id="calendar"></div>
</div>

<!-- Event Detail Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-semibold" id="eventModalLabel">Event Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> <span id="event-title"></span></p>
                <p><strong>Description:</strong> <span id="event-description"></span></p>
                <p><strong>Start:</strong> <span id="event-start"></span></p>
                <p><strong>End:</strong> <span id="event-end"></span></p>
                <p><strong>All Day:</strong> <span id="event-allDay"></span></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- FullCalendar CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Bootstrap JS (make sure it's included for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const BASE_URL = @json($api);

    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 650,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                axios.get(`${BASE_URL}/api/calendar-event`)
                    .then(response => {
                        const events = response.data.data.map(event => ({
                            id: event.id,
                            title: event.title,
                            start: event.start,
                            end: event.end,
                            color: event.color,
                            allDay: event.all_day === 1,
                            description: event.description || 'No description provided.'
                        }));
                        successCallback(events);
                    })
                    .catch(error => {
                        console.error('Error fetching events:', error);
                        failureCallback(error);
                    });
            },
            eventClick: function(info) {
                // Populate modal fields
                document.getElementById('event-title').textContent = info.event.title;
                document.getElementById('event-description').textContent = info.event.extendedProps.description;
                document.getElementById('event-start').textContent = info.event.start.toLocaleString();
                document.getElementById('event-end').textContent = info.event.end ? info.event.end.toLocaleString() : '—';
                document.getElementById('event-allDay').textContent = info.event.allDay ? 'Yes' : 'No';

                // Show modal
                eventModal.show();
            }
        });

        calendar.render();
    });
</script>
@endsection
