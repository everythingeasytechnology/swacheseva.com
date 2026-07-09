@extends('layouts.guest')

@section('title', 'Top Skills in Demand for Better Career Opportunities - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <span class="badge bg-secondary-theme text-white mb-2 px-3 py-1 rounded-pill small fw-semibold">CAREER TIPS</span>
            <h1 class="fw-bold mb-2 text-white" style="font-size: 2.2rem; max-width: 800px;">Top Skills in Demand for Better Career Opportunities</h1>
            <p class="mb-0 text-white-50 small d-flex align-items-center gap-3">
                <span><i class="bi bi-person-fill"></i> Admin</span>
                <span><i class="bi bi-calendar-event-fill"></i> May 20, 2026</span>
                <span><i class="bi bi-chat-fill"></i> 4 Comments</span>
            </p>
        </div>
    </section>

    <!-- Main Content and Sidebar -->
    <section class="py-5 bg-light">
        <div class="container py-3">
            <div class="row g-4">
                <!-- Blog Content -->
                <div class="col-lg-8">
                    <x-card :hover="false" class="p-4 mb-4">
                        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1200&q=80" alt="Career Tips Detail" class="img-fluid rounded-4 mb-4 w-100" style="max-height: 400px; object-fit: cover;">
                        
                        <p class="lead text-dark">
                            As technology evolves and operational models shift, job markets are demanding advanced technical skills coupled with robust cognitive abilities. In 2026, building a versatile skill set is the most critical preparation for long-term career growth.
                        </p>
                        
                        <h4 class="fw-bold text-primary-theme mt-4 mb-3">1. Technical Proficiency & Digital Literacy</h4>
                        <p class="text-muted">
                            It is no longer enough to understand standard spreadsheet applications. Today's corporations require junior professionals to possess competency in cloud tools, basic coding paradigms (such as Python or JavaScript), and automated workflows. Data analytics capability has become a core requirement across sales, finance, operations, and administrative functions.
                        </p>

                        <h4 class="fw-bold text-primary-theme mt-4 mb-3">2. Emotional Intelligence & Interpersonal Communication</h4>
                        <p class="text-muted">
                            While hard skills secure interviews, soft skills finalize employment. Professionals who can manage conflict, coordinate tasks across cross-functional remote teams, and clearly present data-driven solutions to management are highly valued. Adaptability and continuous learning drive this category.
                        </p>

                        <blockquote class="bg-primary-theme bg-opacity-5 border-start border-primary border-4 p-4 my-4 rounded-end">
                            <p class="mb-0 fw-semibold text-primary-theme fs-6 italic">
                                "The capacity to learn is a gift; the ability to learn is a skill; the willingness to learn is a choice."
                            </p>
                            <footer class="blockquote-footer mt-2 small">Brian Herbert</footer>
                        </blockquote>

                        <h4 class="fw-bold text-primary-theme mt-4 mb-3">3. Growth Mindset and Problem Solving</h4>
                        <p class="text-muted">
                            Employers are searching for candidates who approach obstacles as learning opportunities. The capacity to analyze a process bottleneck, research alternative solutions, and present structured recommendations is crucial.
                        </p>
                    </x-card>

                    <!-- Comments Section -->
                    <x-card :hover="false" class="p-4 mb-4" title="Discussion (4)">
                        <div class="d-flex gap-3 mb-4">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="Commenter avatar" class="rounded-circle border" style="width: 48px; height: 48px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Vikash Yadav <small class="text-muted fw-normal ms-2">2 days ago</small></h6>
                                <p class="text-muted small mt-1">
                                    This is a timely post. I applied for the Skill Development course last week and am excited to learn Python to boost my operations background.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mb-4">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=facearea&facepad=2&w=100&h=100&q=80" alt="Commenter avatar" class="rounded-circle border" style="width: 48px; height: 48px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Neha Singh <small class="text-muted fw-normal ms-2">3 days ago</small></h6>
                                <p class="text-muted small mt-1">
                                    Could you write more about which AI tools are expected to be mandatory for project managers?
                                </p>
                            </div>
                        </div>

                        <!-- Post a Comment Form -->
                        <h6 class="fw-bold text-primary-theme mt-5 mb-3">Post a Reply</h6>
                        <form>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea rows="4" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-4 shadow-sm">Submit Comment</button>
                        </form>
                    </x-card>
                </div>

                <!-- Sidebar Content -->
                <div class="col-lg-4">
                    <!-- Categories -->
                    <x-card :hover="false" class="p-4 mb-4" title="Categories">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0">
                                <a href="#" class="text-decoration-none text-dark small"><i class="bi bi-chevron-right text-primary-theme me-2"></i> Career Tips</a>
                                <span class="badge bg-primary-theme text-white rounded-pill">12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0">
                                <a href="#" class="text-decoration-none text-dark small"><i class="bi bi-chevron-right text-primary-theme me-2"></i> Government Schemes</a>
                                <span class="badge bg-primary-theme text-white rounded-pill">8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0">
                                <a href="#" class="text-decoration-none text-dark small"><i class="bi bi-chevron-right text-primary-theme me-2"></i> Success Stories</a>
                                <span class="badge bg-primary-theme text-white rounded-pill">15</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0">
                                <a href="#" class="text-decoration-none text-dark small"><i class="bi bi-chevron-right text-primary-theme me-2"></i> Tech Trends</a>
                                <span class="badge bg-primary-theme text-white rounded-pill">9</span>
                            </li>
                        </ul>
                    </x-card>

                    <!-- Popular Articles -->
                    <x-card :hover="false" class="p-4 mb-4" title="Popular Posts">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=150&q=80" alt="post thumbnail" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-1" style="font-size: 0.8rem; line-height: 1.4;"><a href="#" class="text-decoration-none text-dark hover-primary">How Government Schemes Help Youth</a></h6>
                                <small class="text-muted" style="font-size: 0.7rem;">May 18, 2026</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?auto=format&fit=crop&w=150&q=80" alt="post thumbnail" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-1" style="font-size: 0.8rem; line-height: 1.4;"><a href="#" class="text-decoration-none text-dark hover-primary">From Training to Success: Stories</a></h6>
                                <small class="text-muted" style="font-size: 0.7rem;">May 15, 2026</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=150&q=80" alt="post thumbnail" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            <div>
                                <h6 class="fw-bold mb-1" style="font-size: 0.8rem; line-height: 1.4;"><a href="#" class="text-decoration-none text-dark hover-primary">AI and the Future of Junior Coding Jobs</a></h6>
                                <small class="text-muted" style="font-size: 0.7rem;">May 12, 2026</small>
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
@endsection
