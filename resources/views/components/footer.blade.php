<footer class="bg-primary-theme text-white pt-5 pb-3" style="background-color: #002984 !important;">
    <div class="container">
        <div class="row g-4 mb-4">
            <!-- Col 1: About -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('swach-eseva-logo.png') }}" alt="Swacheseva" style="height: 44px; width: auto;">
                </div>
                <p class="text-white mb-3 small" style="line-height: 1.6;">
                    Our mission is to empower youth by providing skills, opportunities, guidance, and schemes for a better and highly productive future.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;"><i class="bi bi-facebook text-white"></i></a>
                    <a href="#" class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;"><i class="bi bi-twitter-x text-white"></i></a>
                    <a href="#" class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;"><i class="bi bi-instagram text-white"></i></a>
                    <a href="#" class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;"><i class="bi bi-linkedin text-white"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-secondary-theme fw-bold mb-3 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Quick Links</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none hover-white small">Home</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white text-decoration-none hover-white small">About Us</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-white text-decoration-none hover-white small">Services</a></li>
                    <li class="mb-2"><a href="{{ route('blog') }}" class="text-white text-decoration-none hover-white small">Blog Feed</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none hover-white small">Contact Us</a></li>
                </ul>
            </div>

            <!-- Col 3: Important Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-secondary-theme fw-bold mb-3 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Portal Actions</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="{{ route('register') }}" class="text-white text-decoration-none hover-white small">Apply Now</a></li>
                    <li class="mb-2"><a href="{{ route('login') }}" class="text-white text-decoration-none hover-white small">Login Portal</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-white small">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-white small">Terms & Conditions</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-white small">Support FAQ</a></li>
                </ul>
            </div>

            <!-- Col 4: Contact Us -->
            <div class="col-lg-4 col-md-6">
                <h6 class="text-secondary-theme fw-bold mb-3 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Contact Details</h6>
                <ul class="list-unstyled text-white small mb-0">
                    <li class="mb-2 d-flex align-items-start">
                        <i class="bi bi-geo-alt-fill text-secondary-theme me-2 mt-1"></i>
                        <span>123, Swacheseva Bhawan, Sansad Marg, Connaught Place, New Delhi - 110001</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <i class="bi bi-telephone-fill text-secondary-theme me-2"></i>
                        <span>+91 123 456 7890</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center">
                        <i class="bi bi-envelope-fill text-secondary-theme me-2"></i>
                        <span>contact@swacheseva.com</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-clock-fill text-secondary-theme me-2"></i>
                        <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary-50 my-4">

        <!-- Bottom Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <p class="mb-0 text-white-50 small">&copy; {{ date('Y') }} Swacheseva Initiative. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 text-white-50 small">Design by <a href="http://everythingeasy.in/" target="_blank" class="text-secondary-theme text-decoration-none fw-bold">Everything Easy</a></p>
            </div>
        </div>
    </div>
</footer>
