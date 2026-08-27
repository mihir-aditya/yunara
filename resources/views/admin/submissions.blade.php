@extends('admin.layout')

@section('title', 'Contact Submissions')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="m-0">Client Inquiries</h5>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Date</th>
                    <th>Client Details</th>
                    <th>Inquiry Type</th>
                    <th class="pe-4">Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse($submissions as $sub)
                    <tr>
                        <td class="ps-4 text-nowrap">
                            <span class="text-muted small">{{ $sub->created_at->format('M d, Y') }}</span><br>
                            <span class="text-muted small">{{ $sub->created_at->format('H:i A') }}</span>
                        </td>
                        <td>
                            <strong style="font-family: var(--font-heading); font-size:1.1rem;">{{ $sub->name }}</strong><br>
                            <a href="mailto:{{ $sub->email }}" class="text-decoration-none small" style="color: var(--color-primary);">{{ $sub->email }}</a>
                        </td>
                        <td>
                            <span class="badge" style="background: var(--color-text); font-weight: normal; letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.7rem;">{{ $sub->type }}</span>
                        </td>
                        <td class="pe-4">
                            <div style="max-height: 80px; overflow-y: auto; font-size: 0.85rem; color: var(--color-text-light); line-height: 1.5; padding: 10px 0;">
                                {{ $sub->message }}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-5 text-muted">No inquiries have been received yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
