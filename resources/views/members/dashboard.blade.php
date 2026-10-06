@extends('layouts.app')

@section('styles')
<style>
    .dashboard-page .page-header {
        border-bottom: 1px solid rgba(0,0,0,.08);
        padding-bottom: 1rem;
        margin-bottom: 1.5rem;
    }
    .dashboard-page .card {
        border: 1px solid rgba(0,0,0,.06);
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,.06);
    }
    .dashboard-page .card-header {
        background: #f8fafc;
        border-bottom: 1px solid rgba(0,0,0,.06);
        font-weight: 600;
        padding: 0.875rem 1.25rem;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    .dashboard-page .card-body {
        padding: 1.25rem;
    }
    .dashboard-page .form-control,
    .dashboard-page .form-select {
        border-radius: 0.375rem;
        border-color: #e2e8f0;
    }
    .dashboard-page .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    .dashboard-page .doc-table {
        margin-bottom: 0;
    }
    .dashboard-page .doc-table thead th {
        background: #f8fafc;
        color: #475569;
        font-weight: 600;
        font-size: 0.8125rem;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        border-bottom: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        white-space: nowrap;
    }
    .dashboard-page .doc-table tbody td {
        padding: 0.875rem 1rem;
        vertical-align: middle;
        border-color: #f1f5f9;
        font-size: 0.9375rem;
    }
    .dashboard-page .doc-table tbody tr:hover {
        background-color: #f8fafc;
    }
    .dashboard-page .doc-table .text-muted {
        color: #64748b !important;
    }
    .dashboard-page .badge {
        font-weight: 500;
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }
    .dashboard-page .btn-action {
        padding: 0.25rem 0.5rem;
        font-size: 0.8125rem;
    }
    .dashboard-page .table-empty {
        padding: 2.5rem 1rem;
        color: #64748b;
    }
    .dashboard-page .table-empty i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        opacity: 0.6;
    }
    .dashboard-page .alert-success {
        border-radius: 0.5rem;
        border: none;
    }
    .dashboard-page #securityModal .modal-content {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
    }
    .dashboard-page #securityModal .modal-header {
        border-bottom: 1px solid #f1f5f9;
        padding: 1rem 1.25rem;
    }
    .dashboard-page #securityModal .modal-body {
        padding: 1.25rem;
    }
    .dashboard-page #securityModal .modal-footer {
        border-top: 1px solid #f1f5f9;
        padding: 1rem 1.25rem;
    }
</style>
@endsection

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="container mt-4 dashboard-page">

    <div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0 fw-semibold text-body">SB Member Dashboard</h5>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Upload Form --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="fas fa-cloud-upload-alt text-primary"></i>
            Upload Document (PDF Only)
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('members.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-medium">Document Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter document title" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-medium">Description <span class="text-muted fw-normal">(Optional)</span></label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Brief description"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-8">
                                <label class="form-label fw-medium small">Choose PDF file</label>
                                <input type="file" name="file" class="form-control" accept=".pdf" required>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-upload me-1"></i> Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Documents Table --}}
    <div class="card">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="fas fa-folder-open text-primary"></i>
            My Uploaded Documents
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table doc-table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 3rem;">#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th>Date Uploaded</th>
                            <th style="width: 7rem;">Status</th>
                            <th style="width: 10rem;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents as $doc)
                            <tr>
                                <td class="text-muted">{{ $loop->iteration }}</td>
                                <td class="fw-medium">{{ $doc->title }}</td>
                                <td class="text-muted">{{ $doc->description ? Str::limit($doc->description, 40) : '—' }}</td>
                                <td class="text-muted small">{{ Str::limit($doc->file_name, 25) }}</td>
                                <td class="text-muted small">{{ $doc->created_at->format('M d, Y h:i A') }}</td>
                                <td>
                                    @if($doc->status == 'draft')
                                        <span class="badge bg-secondary">Draft</span>
                                    @elseif($doc->status == 'forwarded')
                                        <span class="badge bg-warning text-dark">Forwarded</span>
                                    @elseif($doc->status == 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($doc->status == 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ asset('storage/'.$doc->file_path) }}"
                                           target="_blank"
                                           class="btn btn-outline-primary btn-action"
                                           title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($doc->status == 'draft')
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-action"
                                                    title="Edit"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editDocumentModal"
                                                    data-id="{{ $doc->id }}"
                                                    data-title="{{ $doc->title }}"
                                                    data-description="{{ $doc->description }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-warning btn-action"
                                                    onclick="openSecurityModal({{ $doc->id }}, 'forward')"
                                                    title="Forward">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger btn-action"
                                                    onclick="openSecurityModal({{ $doc->id }}, 'delete')"
                                                    title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="table-empty text-center">
                                    <i class="fas fa-inbox d-block"></i>
                                    <span>No documents uploaded yet.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- Security Modal --}}
<div class="modal fade" id="securityModal" tabindex="-1" aria-labelledby="securityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="secureActionForm">
                @csrf
                <input type="hidden" name="document_id" id="modal_document_id">
                <input type="hidden" name="action" id="modal_action">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="securityModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modalError" class="alert alert-danger py-2 d-none small mb-3"></div>
                    <label class="form-label fw-medium">Enter your password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Document Modal --}}
<div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="editDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="editDocumentForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="editDocumentModalLabel">Edit Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Document Title</label>
                        <input type="text" name="title" id="edit_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Description</label>
                        <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Replace PDF (optional)</label>
                        <input type="file" name="file" class="form-control" accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function() {
    function openSecurityModal(documentId, actionType) {
        document.getElementById('modal_document_id').value = documentId;
        document.getElementById('modal_action').value = actionType;
        document.getElementById('modalError').classList.add('d-none');
        document.getElementById('secureActionForm').querySelector('input[name="password"]').value = '';
        var modal = new bootstrap.Modal(document.getElementById('securityModal'));
        modal.show();
    }
    window.openSecurityModal = openSecurityModal;
})();
</script>
<script>
document.getElementById('editDocumentModal').addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id');
    var title = button.getAttribute('data-title');
    var description = button.getAttribute('data-description') || '';

    var form = document.getElementById('editDocumentForm');
    var actionTemplate = "{{ route('members.document.update', ':id') }}";
    form.action = actionTemplate.replace(':id', id);

    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
});

document.getElementById('secureActionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = this;
    var formData = new FormData(form);
    var errorDiv = document.getElementById('modalError');
    errorDiv.classList.add('d-none');

    fetch("{{ route('members.document.secure') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(function(response) { return response.json(); })
    .then(function(data) {
        if (!data.status) {
            errorDiv.classList.remove('d-none');
            errorDiv.innerText = data.message;
            return;
        }
        if (data.redirect) {
            window.open(data.redirect, '_blank');
            bootstrap.Modal.getInstance(document.getElementById('securityModal')).hide();
            return;
        }
        location.reload();
    })
    .catch(function(err) { console.error(err); });
});
</script>
@endpush
