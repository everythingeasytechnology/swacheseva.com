@extends('layouts.guest')

@section('title', 'Contact Us - Swacheseva')

@section('content')
    <!-- Inner Page Header -->
    <section class="py-5 bg-primary-theme text-white">
        <div class="container py-3">
            <h1 class="fw-bold mb-2 text-white">Contact Our Support Team</h1>
            <p class="lead mb-0 text-white-50 small" style="max-width: 600px;">
                Have questions about schemes or placements? Get in touch with our verification officers.
            </p>
        </div>
    </section>

    <!-- Support details and Form -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-4">
                <!-- Info cards -->
                <div class="col-lg-4">
                    <x-card :hover="true" class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                            <i class="bi bi-telephone-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-primary-theme">Phone Support</h6>
                            <p class="text-muted small mb-0">+91 123 456 7890</p>
                        </div>
                    </x-card>

                    <x-card :hover="true" class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                            <i class="bi bi-envelope-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-primary-theme">Email Address</h6>
                            <p class="text-muted small mb-0">support@swacheseva.com</p>
                        </div>
                    </x-card>

                    <x-card :hover="true" class="mb-3 d-flex align-items-center gap-3">
                        <div class="bg-primary-theme bg-opacity-10 text-primary-theme p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-primary-theme">Main Office</h6>
                            <p class="text-muted small mb-0">Connaught Place, New Delhi</p>
                        </div>
                    </x-card>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <x-card :hover="false" class="p-4" title="Send a Message">
                        <form>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Full Name</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Rahul Kumar" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Email Address</label>
                                    <input type="email" class="form-control bg-light border-0 py-2 rounded-3" placeholder="rahul@example.com" required>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Phone Number</label>
                                    <input type="tel" class="form-control bg-light border-0 py-2 rounded-3" placeholder="9876543210" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-muted small fw-bold">Subject</label>
                                    <input type="text" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Scheme Application Help" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted small fw-bold">Message Details</label>
                                <textarea rows="5" class="form-control bg-light border-0 py-2 rounded-3" placeholder="Type your message here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">Send message <i class="bi bi-send ms-2"></i></button>
                        </form>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
@endsection
