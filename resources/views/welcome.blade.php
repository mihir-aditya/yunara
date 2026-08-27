@extends('layouts.app')

@section('content')
    <!-- 1. Premium Hero -->
    <section class="section hero" id="home">
        <!-- Parallax Background -->
        <div class="hero-bg parallax-img" style="background-image: url('https://images.unsplash.com/photo-1522383225653-ed111181a951?auto=format&fit=crop&w=2500&q=80')"></div>
        <!-- Canvas for Petals -->
        <canvas id="petalsCanvas"></canvas>
        <div class="hero-content">
            
            <p class="hero-kicker fade-up">Bespoke Event Production</p>
            <h1 class="hero-title fade-up">Elevating<br>Luxury</h1>
            
            <div class="hero-ctas fade-up mt-4">
                <a href="#portfolio" class="btn-luxury magnetic">View Our Work</a>
            </div>
        </div>
    </section>

    <!-- 2. Omotenashi Philosophy -->
    <section class="section philosophy bg-surface editorial-border" id="philosophy">
        <div class="container layout-split">
            <div class="col left">
                <h2 class="section-title fade-up">The Art of<br>Hospitality</h2>
                <div class="graphic-lines"></div>
            </div>
            <div class="col right">
                <p class="large-text fade-up">Rooted in the tradition of Omotenashi, we anticipate needs before they arise. Our approach is quiet, deliberate, and uncompromisingly precise, ensuring every event unfolds seamlessly.</p>
                <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&fit=crop&w=1200&q=80" alt="Omotenashi" class="reveal-img parallax-img mt-5 filter-sepia">
            </div>
        </div>
    </section>

    <!-- 3. Why Yunara -->
    <section class="section why-yunara bg-surface" id="why">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-label">The Yunara Standard</p>
                <h2 class="section-title split-text">Excellence in Every Detail</h2>
            </div>
            <div class="values-grid">
                <div class="value-card fade-up">
                    <div class="value-icon">✧</div>
                    <h3>Global Reach</h3>
                    <p>Executing flawless experiences across Florida, the USA, and international luxury destinations.</p>
                </div>
                <div class="value-card fade-up">
                    <div class="value-icon">✿</div>
                    <h3>Discreet Precision</h3>
                    <p>Our team works invisibly behind the scenes to ensure your event flows like a masterpiece.</p>
                </div>
                <div class="value-card fade-up">
                    <div class="value-icon">✦</div>
                    <h3>Bespoke Design</h3>
                    <p>No two events are alike. We curate highly personalized aesthetic journeys.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Company Statistics -->
    <section class="section stats" id="stats">
        <div class="stats-bg" style="background-image: url('https://images.unsplash.com/photo-1478146896981-b80fe463b330?auto=format&fit=crop&w=2500&q=80')"></div>
        <div class="container stats-container">
            <div class="stat-box">
                <h3 class="counter" data-target="500">0</h3>
                <p>Events Perfected</p>
            </div>
            <div class="stat-box">
                <h3 class="counter" data-target="25">0</h3>
                <p>Years Combined Experience</p>
            </div>
            <div class="stat-box">
                <h3 class="counter" data-target="15">0</h3>
                <p>Industry Awards</p>
            </div>
            <div class="stat-box">
                <h3 class="counter" data-target="100">0</h3>
                <p>% Client Discretion</p>
            </div>
        </div>
    </section>

    <!-- 5. Signature Services -->
    <section class="section services" id="services">
        <div class="container text-center mb-5 relative">
            <div class="graphic-circle" style="width: 150px; height: 150px; left: 50%; transform: translateX(-50%); top: -20px; opacity: 0.5;"></div>
            <p class="section-label" style="position: relative; z-index: 2;">Expertise</p>
            <h2 class="section-title split-text">Event Production</h2>
        </div>
        
        <!-- Service 1 -->
        <div class="service-row editorial-border">
            <div class="service-img-wrapper reveal-img">
                <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=1200&q=80" class="parallax-img filter-sepia" alt="Corporate Events">
            </div>
            <div class="service-content relative">
                <h3 class="fade-up" style="position: absolute; right: 0; top: -3rem; color: rgba(44,42,37,0.03); z-index: 0; pointer-events: none;">Corporate</h3>
                <h3 class="split-text mb-4">Corporate Galas</h3>
                <p class="fade-up">From high-profile brand launches to executive summits, we architect corporate experiences that align with your strategic vision and elevate brand prestige.</p>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="service-row reverse editorial-border">
            <div class="service-img-wrapper reveal-img">
                <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1200&q=80" class="parallax-img filter-sepia" alt="Luxury Weddings">
            </div>
            <div class="service-content relative">
                <h3 class="fade-up" style="position: absolute; left: 0; top: -3rem; color: rgba(44,42,37,0.03); z-index: 0; pointer-events: none;">Weddings</h3>
                <h3 class="split-text mb-4">Luxury Weddings</h3>
                <p class="fade-up">Uncompromising aesthetic direction, spectacular venues, and flawless execution. We manage complex logistics so you can remain present in the moment.</p>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="service-row editorial-border">
            <div class="service-img-wrapper reveal-img">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1200&q=80" class="parallax-img filter-sepia" alt="Stage Production">
            </div>
            <div class="service-content relative">
                <h3 class="fade-up" style="position: absolute; right: 0; top: -3rem; color: rgba(44,42,37,0.03); z-index: 0; pointer-events: none;">Production</h3>
                <h3 class="split-text mb-4">Stage & Production</h3>
                <p class="fade-up">State-of-the-art lighting, immersive soundscapes, and breathtaking set design. We transform empty spaces into cinematic worlds.</p>
            </div>
        </div>
    </section>

    <!-- 6. Featured Portfolio (Horizontal Scroll) -->
    <section class="section portfolio bg-surface" id="portfolio">
        <div class="container mb-5">
            <p class="section-label">Masterpieces</p>
            <h2 class="section-title split-text">Featured Portfolio</h2>
        </div>
        <div class="swiper portfolio-swiper">
            <div class="swiper-wrapper">
                @forelse($portfolioItems as $item)
                    <div class="swiper-slide portfolio-item hover-view">
                        <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->title }}" class="p-img">
                        <div class="p-overlay">
                            <div class="p-info">
                                <span class="p-cat">{{ $item->category }}</span>
                                <h3>{{ $item->title }}</h3>
                                <span class="p-loc">{{ $item->location }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide portfolio-item hover-view" style="display: flex; align-items: center; justify-content: center; background: #eaddcf;">
                        <div style="text-align: center;">
                            <h3>Coming Soon</h3>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <!-- 7. Case Study Showcase -->
    <section class="section casestudy" id="casestudy">
        <div class="container layout-split">
            <div class="col left sticky-col">
                <p class="section-label">Featured Case Study</p>
                <h2 class="section-title split-text">The Aman Residency Gala</h2>
                <div class="cs-details fade-up">
                    <div class="cs-meta">
                        <span><strong>Client:</strong> Aman Group</span>
                        <span><strong>Location:</strong> Miami Beach</span>
                    </div>
                    <a href="#" class="btn-luxury magnetic mt-3">Read Full Case Study</a>
                </div>
            </div>
            <div class="col right cs-content">
                <div class="cs-block fade-up">
                    <h3>The Challenge</h3>
                    <p>Transforming a raw beachside warehouse into an ultra-luxury, Japanese-inspired sanctuary within 48 hours for 300 VIP guests.</p>
                </div>
                <div class="cs-block fade-up">
                    <h3>The Execution</h3>
                    <p>Utilizing 5,000 real cherry blossoms, custom projection mapping, and a Michelin-star culinary flow coordinated to the second.</p>
                </div>
                <div class="cs-gallery">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1000&q=80" alt="CS1" class="reveal-img">
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Behind the Scenes -->
    <section class="section bts bg-surface" id="bts">
        <div class="container text-center mb-5">
            <p class="section-label">The Process</p>
            <h2 class="section-title split-text">Behind the Scenes</h2>
        </div>
        <div class="masonry-gallery">
            <div class="m-item hover-view"><img src="https://images.unsplash.com/photo-1516280440504-45ea07f59987?auto=format&fit=crop&w=600&q=80" alt="BTS"></div>
            <div class="m-item hover-view tall"><img src="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=600&q=80" alt="BTS"></div>
            <div class="m-item hover-view"><img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80" alt="BTS"></div>
            <div class="m-item hover-view wide"><img src="https://images.unsplash.com/photo-1470229722913-7c090be5efae?auto=format&fit=crop&w=1200&q=80" alt="BTS"></div>
            <div class="m-item hover-view"><img src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?auto=format&fit=crop&w=600&q=80" alt="BTS"></div>
        </div>
    </section>

    <!-- 9. Event Production Process -->
    <section class="section process" id="process">
        <div class="container">
            <h2 class="section-title text-center split-text mb-5">The Yunara Process</h2>
            <div class="vertical-timeline">
                <div class="vt-line"></div>
                <div class="vt-item fade-up">
                    <div class="vt-dot"></div>
                    <div class="vt-content">
                        <h3>01. Discovery</h3>
                        <p>Understanding your vision, brand identity, and the exact feelings you want your guests to experience.</p>
                    </div>
                </div>
                <div class="vt-item fade-up">
                    <div class="vt-dot"></div>
                    <div class="vt-content">
                        <h3>02. Design Architecture</h3>
                        <p>Creating 3D renders, spatial layouts, and sensory moodboards that define the event's soul.</p>
                    </div>
                </div>
                <div class="vt-item fade-up">
                    <div class="vt-dot"></div>
                    <div class="vt-content">
                        <h3>03. Production</h3>
                        <p>Sourcing materials, fabricating custom stages, and coordinating with global premium vendors.</p>
                    </div>
                </div>
                <div class="vt-item fade-up">
                    <div class="vt-dot"></div>
                    <div class="vt-content">
                        <h3>04. Execution</h3>
                        <p>Flawless on-site management. We control the lighting, sound, and flow with military precision.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Industries We Serve -->
    <section class="section industries bg-surface" id="industries">
        <div class="container text-center mb-5">
            <p class="section-label">Our Reach</p>
            <h2 class="section-title split-text">Industries We Serve</h2>
        </div>
        <div class="industries-grid container">
            <div class="ind-card fade-up"><h4>Corporate</h4></div>
            <div class="ind-card fade-up"><h4>Luxury Brands</h4></div>
            <div class="ind-card fade-up"><h4>Hospitality</h4></div>
            <div class="ind-card fade-up"><h4>Technology</h4></div>
            <div class="ind-card fade-up"><h4>Fashion</h4></div>
            <div class="ind-card fade-up"><h4>Government</h4></div>
        </div>
    </section>


    <!-- 12. Video Showcase -->
    <section class="section video-showcase hover-play" id="video">
        <div class="video-wrapper">
            <img src="https://images.unsplash.com/photo-1549451371-64aa98a6f660?auto=format&fit=crop&w=2500&q=80" alt="Video Cover" class="parallax-img">
            <div class="play-button">
                <span>PLAY</span>
            </div>
        </div>
    </section>

    <!-- 13. Testimonials -->
    <section class="section testimonials bg-surface" id="testimonials">
        <div class="container">
            <h2 class="section-title text-center split-text mb-5">Client Praise</h2>
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="glass-card">
                            <p class="quote">"Yunara didn't just throw an event; they crafted a masterpiece. The attention to the smallest detail was astonishing."</p>
                            <h4>Elena Rostova</h4>
                            <span>VP Marketing, Luxuria</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="glass-card">
                            <p class="quote">"Their execution is flawless. They embody Omotenashi entirely—we didn't have to worry about a single thing."</p>
                            <h4>James Kennington</h4>
                            <span>Director, TechNova</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- 14. Awards -->
    <section class="section awards" id="awards">
        <div class="container text-center">
            <p class="section-label">Recognition</p>
            <h2 class="section-title split-text mb-5">Award-Winning Excellence</h2>
            <div class="awards-list">
                <div class="award-item fade-up">
                    <span class="aw-year">2025</span>
                    <h4 class="aw-title">Best Luxury Event Production</h4>
                    <span class="aw-org">Global Event Awards</span>
                </div>
                <div class="award-item fade-up">
                    <span class="aw-year">2024</span>
                    <h4 class="aw-title">Excellence in Stage Design</h4>
                    <span class="aw-org">EventTech Excellence</span>
                </div>
                <div class="award-item fade-up">
                    <span class="aw-year">2023</span>
                    <h4 class="aw-title">Top Wedding Planners USA</h4>
                    <span class="aw-org">Vogue Weddings</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. Meet Our Team -->
    <section class="section team bg-surface" id="team">
        <div class="container">
            <h2 class="section-title text-center split-text mb-5">The Artisans</h2>
            <div class="team-grid">
                <div class="team-card fade-up">
                    <div class="tc-img"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="CEO"></div>
                    <div class="tc-info">
                        <h4>Yuna Tanaka</h4>
                        <p>Founder & Creative Director</p>
                    </div>
                </div>
                <div class="team-card fade-up">
                    <div class="tc-img"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" alt="Director"></div>
                    <div class="tc-info">
                        <h4>Marcus Vance</h4>
                        <p>Head of Production</p>
                    </div>
                </div>
                <div class="team-card fade-up">
                    <div class="tc-img"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80" alt="Design"></div>
                    <div class="tc-info">
                        <h4>Sarah Jenkins</h4>
                        <p>Lead Spatial Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 16. Service Areas (Map Concept) -->
    <section class="section map-section" id="areas">
        <div class="container text-center">
            <h2 class="section-title split-text mb-4">Based in Florida.<br>Executing Globally.</h2>
            <p class="large-text fade-up mb-5">While our headquarters sit in the heart of Florida, our network of premium vendors and logistics experts allows us to produce flawless events anywhere in the United States and select international destinations.</p>
            <div class="map-visual fade-up">
                <!-- Abstract Map Graphic -->
                <div class="abstract-map">
                    <div class="pin fl-pin">
                        <span class="pulse"></span>
                        <span class="pin-text">FLORIDA HQ</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 17. Contact Experience -->
    <section class="section contact" id="contact">
        <!-- Floating blossoms in background -->
        <div class="contact-bg"></div>
        <div class="container layout-split">
            <div class="col left">
                <h2 class="section-title split-text">Begin Your<br>Journey</h2>
                <p class="mt-3 fade-up">Contact our team to discuss your next masterpiece.</p>
                <div class="contact-details mt-5 fade-up">
                    <p><strong>Email</strong><br>concierge@yunaraproductions.com</p>
                    <p class="mt-3"><strong>Phone</strong><br>+1 (800) 555-YUNA</p>
                    <p class="mt-3"><strong>Office</strong><br>Miami, Florida</p>
                </div>
            </div>
            <div class="col right">
                @if(session('success'))
                    <div class="alert-success fade-up mb-4" style="padding: 1rem; border: 1px solid rgba(44,42,37,0.2); background: rgba(44,42,37,0.05); text-align: center;">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.submit') }}" method="POST" class="glass-form fade-up">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="name" name="name" required>
                        <label for="name">Your Name</label>
                    </div>
                    <div class="input-group">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Email Address</label>
                    </div>
                    <div class="input-group">
                        <select id="type" name="type" required>
                            <option value="" disabled selected></option>
                            <option value="corporate">Corporate Gala</option>
                            <option value="wedding">Luxury Wedding</option>
                            <option value="private">Private VIP Event</option>
                        </select>
                        <label for="type">Event Type</label>
                    </div>
                    <div class="input-group">
                        <textarea id="message" name="message" rows="4" required></textarea>
                        <label for="message">Your Vision</label>
                    </div>
                    <button type="submit" class="btn-luxury magnetic w-100">Send Inquiry</button>
                </form>
            </div>
        </div>
    </section>

@endsection