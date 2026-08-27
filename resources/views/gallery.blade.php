@extends('layouts.app')

@section('content')
    <!-- Premium Header -->
    <section class="section gallery-header" style="padding-top: 200px; padding-bottom: 50px; text-align: center;">
        <p class="section-label fade-up">Visual Journey</p>
        <h1 class="section-title split-text">Curated Gallery</h1>
    </section>

    <!-- Gallery Grid -->
    <section class="section gallery-content bg-surface" style="padding-top: 5rem;">
        <div class="container">
            
            @forelse($galleryItems as $index => $item)
                <!-- Item: Alternating layout (even index = reverse) -->
                <div class="gallery-row fade-up {{ $index % 2 != 0 ? 'reverse' : '' }}">
                    <div class="g-media ratio-{{ $item->aspect_ratio }}">
                        @if($item->media_type === 'video')
                            <div class="video-container">
                                <video src="{{ asset('storage/' . $item->media_url) }}" autoplay loop muted playsinline style="object-fit: cover;"></video>
                                <button class="mute-btn-overlay" aria-label="Toggle Mute">
                                    <svg class="icon-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg>
                                    <svg class="icon-unmuted hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
                                </button>
                            </div>
                        @else
                            <img src="{{ asset('storage/' . $item->media_url) }}" alt="{{ $item->title }}" class="reveal-img">
                        @endif
                    </div>
                    <div class="g-text">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center w-100 py-5">
                    <p class="large-text fade-up">No gallery items have been added yet.</p>
                </div>
            @endforelse

        </div>
    </section>
@endsection