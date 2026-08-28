@extends('admin.layout')

@section('title', 'Manage Gallery')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="m-0">Gallery Items</h5>
        <button class="btn-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#addGalleryForm">
            <i class="fas fa-plus"></i> Add New
        </button>
    </div>
    
    <div class="collapse" id="addGalleryForm">
        <div class="card-body border-bottom" style="background: rgba(0,0,0,0.02);">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Title</label>
                        <input type="text" name="title" class="form-control rounded-0" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Media File</label>
                        <input type="file" name="media_file" class="form-control rounded-0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Description</label>
                    <textarea name="description" class="form-control rounded-0" rows="2"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Media Type</label>
                        <select name="media_type" class="form-select rounded-0">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Aspect Ratio</label>
                        <select name="aspect_ratio" class="form-select rounded-0">
                            <option value="16-9">16:9 (Horizontal)</option>
                            <option value="9-16">9:16 (Vertical)</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control rounded-0" value="0" required>
                    </div>
                </div>
                <button type="submit" class="btn-primary-custom w-100 mt-2">Save Gallery Item</button>
            </form>
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4" style="width: 80px;">Order</th>
                    <th>Media</th>
                    <th>Details</th>
                    <th class="text-end pe-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleryItems as $item)
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-secondary rounded-pill px-3">{{ $item->sort_order }}</span>
                        </td>
                        <td>
                            @if($item->media_type == 'video')
                                <video src="{{ asset('storage/' . $item->media_url) }}" muted style="width: 120px; height: 80px; object-fit: cover;"></video>
                            @else
                                <img src="{{ asset('storage/' . $item->media_url) }}" style="width: 120px; height: 80px; object-fit: cover;">
                            @endif
                        </td>
                        <td>
                            <h6 class="m-0 font-weight-bold" style="font-family: var(--font-heading); font-size:1.2rem;">{{ $item->title }}</h6>
                            <small class="text-muted text-uppercase" style="font-size:0.7rem; letter-spacing: 0.1em;">{{ $item->media_type }} • {{ $item->aspect_ratio }}</small>
                            <p class="m-0 mt-1 text-muted small" style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $item->description }}</p>
                        </td>
                        <td class="text-end pe-4">
                            <button type="button" class="btn btn-outline-primary btn-sm rounded-0 me-1" data-bs-toggle="modal" data-bs-target="#editGalleryModal{{ $item->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('admin.gallery.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-0" onclick="return confirm('Delete this item? This action cannot be undone.')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>

                            <!-- Edit Modal -->
                            <div class="modal fade text-start" id="editGalleryModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content rounded-0">
                                        <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Gallery Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Title</label>
                                                    <input type="text" name="title" class="form-control rounded-0" value="{{ $item->title }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Media File (Leave blank to keep current)</label>
                                                    <input type="file" name="media_file" class="form-control rounded-0">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Description</label>
                                                    <textarea name="description" class="form-control rounded-0" rows="2">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Media Type</label>
                                                        <select name="media_type" class="form-select rounded-0">
                                                            <option value="image" {{ $item->media_type == 'image' ? 'selected' : '' }}>Image</option>
                                                            <option value="video" {{ $item->media_type == 'video' ? 'selected' : '' }}>Video</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Aspect Ratio</label>
                                                        <select name="aspect_ratio" class="form-select rounded-0">
                                                            <option value="16-9" {{ $item->aspect_ratio == '16-9' ? 'selected' : '' }}>16:9 (Horizontal)</option>
                                                            <option value="9-16" {{ $item->aspect_ratio == '9-16' ? 'selected' : '' }}>9:16 (Vertical)</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label text-uppercase" style="font-size:0.75rem; letter-spacing:0.1em; font-weight:600;">Sort Order</label>
                                                        <input type="number" name="sort_order" class="form-control rounded-0" value="{{ $item->sort_order }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary rounded-0" style="background:var(--color-primary); border:none;">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-5 text-muted">No gallery items have been added.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Need bootstrap JS for collapse -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
