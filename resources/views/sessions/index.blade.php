@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Upcoming Sessions</h2>
            <p class="text-muted small mb-0">View scheduled sessions and their agendas</p>
        </div>
    </div>

    <!-- Card Container -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Session</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th class="text-center pe-4">Agenda</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($sessions as $session)
                        <tr>
                            <td class="ps-4 fw-semibold">
                                {{ $session->title }}
                            </td>

                            <td class="text-muted">
                                {{ \Carbon\Carbon::parse($session->session_date)->format('M d, Y') }}
                            </td>

                            <td>
                              
                                @if($session->status == 'upcoming')
                                    <span class="badge bg-warning">Upcoming</span>
                                @elseif($session->status == 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif($session->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @elseif($session->status == 'ongoing')

                                    <span class="badge bg-info">Ongoing</span>
                                @endif

                            </td>

                            <td class="text-center pe-4">
                                <a href="{{ route('sessions.agenda',$session->id) }}"
                                   class="btn btn-outline-primary btn-sm px-3">
                                    View Agenda
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                No upcoming sessions available.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection