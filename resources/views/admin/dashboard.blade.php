@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-center py-4">
            <h5 class="text-muted mb-3" style="font-family: var(--font-body); text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.8rem;">Total Submissions</h5>
            <h2 class="display-4 m-0" style="color: var(--color-primary);">{{ $submissionsCount }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center py-4">
            <h5 class="text-muted mb-3" style="font-family: var(--font-body); text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.8rem;">Gallery Items</h5>
            <h2 class="display-4 m-0">{{ $galleryCount }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center py-4">
            <h5 class="text-muted mb-3" style="font-family: var(--font-body); text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.8rem;">Portfolio Items</h5>
            <h2 class="display-4 m-0">{{ $portfolioCount }}</h2>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="m-0">Welcome to Yunara Admin</h5>
    </div>
    <div class="card-body">
        <p>Use the sidebar to navigate through your content management system.</p>
        <ul>
            <li><strong>Gallery:</strong> Manage the photos and videos on your Gallery page.</li>
            <li><strong>Portfolio:</strong> Manage the featured events on your Home page slider.</li>
            <li><strong>Submissions:</strong> Read inquiries submitted by clients through the Contact form.</li>
        </ul>
    </div>
</div>
@endsection
