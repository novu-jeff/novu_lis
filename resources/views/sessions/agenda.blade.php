@extends('layouts.app')

@section('content')

<div class="container py-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 px-2">
        <div>
            <h2 class="fw-semibold text-dark mb-1">Upcoming Session Agenda</h2>
        </div>

        
    </div>


<div class="card mb-4">

<div class="card-body">

<h5>{{ $session->title }}</h5>

<p class="text-muted">
{{ \Carbon\Carbon::parse($session->session_date)->format('F d, Y') }}
</p>

@if($session->packet_file)
<a href="{{ env('CMS_STORAGE_URL').'/'.$session->packet_file }}"
target="_blank"
class="btn btn-primary">

Download Agenda Packet

</a>

@endif


</div>


</div>
@if($session->status == 'completed')
<p class="text-muted mt-3 text-center fw-semibold">Discussion closed.
This session has already been completed.
@endif

<div class="accordion" id="agendaAccordion">
@foreach($documents as $index => $doc)
@php

    $itemId = 'agenda-item-' . ($doc->document->id ?? $index);
    $collapseId = 'collapse-' . $itemId;
    $showFirst = $index === 0;
@endphp

<div class="accordion-item border rounded mb-2">
    <h2 class="accordion-header">
        <button class="accordion-button {{ $showFirst ? '' : 'collapsed' }} fw-semibold py-3"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $collapseId }}"
                aria-expanded="{{ $showFirst ? 'true' : 'false' }}"
                aria-controls="{{ $collapseId }}">
            <span class="me-2">{{ $doc->agenda_order }}.</span>
            {{ $doc->document->title }}
        </button>
    </h2>
    <div id="{{ $collapseId }}"
         class="accordion-collapse collapse {{ $showFirst ? 'show' : '' }}"
         data-bs-parent="#agendaAccordion">
        <div class="accordion-body">

<p class="text-muted mb-2">
    @php
    $isMine = $doc->document->member_account_id === auth('member')->id();
    @endphp
    Proponent: <strong>{{ $isMine ? 'You' : optional($doc->document->member)->name }}</strong>
</p>

<a href="{{ asset('storage/'.$doc->document->file_path) }}"
   target="_blank"
   class="btn btn-sm btn-primary mb-3">
    View Document
</a>

<hr>

<h6>Remarks</h6>

@forelse(($doc->document->documentRemarks ?? []) as $remark)

@php
    $isMine = $remark->member_account_id === auth('member')->id();
@endphp

<div class="border rounded p-2 mb-2 {{ $isMine ? 'bg-light border-success' : '' }}">
    <strong>
        @if($isMine)
            You 
        @else
            {{ $remark->member->member->name ?? 'Member' }}
        @endif
    </strong>
    <br>

    {{ $remark->remark }}

    <small class="text-muted d-block">
        {{ $remark->created_at->diffForHumans() }}
    </small>

    {{-- Replies --}}
    @if($remark->replies->count())

    <div class="ms-4 mt-2">

    @foreach($remark->replies as $reply)
    @php
   // dd($reply);
         $isMine = $reply->member_account_id === auth('member')->id();
    @endphp

    <div class="border rounded p-2 mb-2 {{ $isMine ? 'bg-light border-success' : '' }}">

    
    <strong>
        @if($isMine)
            You 
        @else
            {{ $reply->member->member->name ?? 'Member' }}
        @endif
    </strong>

    <br>

    {{ $reply->remark }}

    <small class="text-muted d-block">
    {{ $reply->created_at->diffForHumans() }}
    </small>

    </div>

    @endforeach

    </div>

    @endif

    @if($session->status !== 'completed')

    {{-- Reply Form --}}
    <form method="POST"
    action="{{ route('sessions.remark',$session->id) }}"
    class="mt-2 ms-4">

    @csrf

    <input type="hidden"
    name="document_id"
    value="{{ $doc->document->id }}">

    <input type="hidden"
    name="parent_id"
    value="{{ $remark->id }}">

    <textarea
    name="remark"
    class="form-control mb-2"
    rows="2"
    placeholder="Reply..."></textarea>

    <button class="btn btn-sm btn-secondary">
    Reply
    </button>

    </form>
    @endif
    
</div>
    
    @empty
    
    <p class="text-muted">No remarks yet.</p>
    
    @endforelse
 
@if($session->status !== 'completed')

<form method="POST" action="{{ route('sessions.remark',$session->id) }}">
    @csrf
    <input type="hidden" name="document_id" value="{{ $doc->document->id }}">
    <textarea name="remark" class="form-control mb-2" rows="2" placeholder="Add remark..."></textarea>
    <button class="btn btn-sm btn-success">Submit Remark</button>
</form>
 @endif
        </div>
    </div>
</div>
@endforeach
@if($session->status == 'completed')
<p class="text-muted mt-3 text-center fw-semibold">Discussion closed.
This session has already been completed.
@endif
</div>


</div>

@endsection