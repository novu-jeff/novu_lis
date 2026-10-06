@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Document
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('members.document.update', $document->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-medium">Document Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $document->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $document->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Replace PDF (optional)</label>
                            <input type="file" name="file" class="form-control" accept=".pdf">
                            <div class="form-text">
                                Leave this empty to keep the existing file: {{ $document->file_name }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('members.dashboard') }}" class="btn btn-light">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

