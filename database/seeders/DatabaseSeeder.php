<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Super Admin
        User::create([
            'name' => 'Super Administrator',
            'email' => 'admin@swacheseva.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '+91 9876543210',
            'district' => 'karimnagar',
            'state' => 'Telangana'
        ]);

        // 2. Seed Default Settings
        \App\Models\Setting::create(['key' => 'franchisee_fee', 'value' => '164']);
        \App\Models\Setting::create(['key' => 'payment_upi_id', 'value' => '9154252555-1@okbizaxis']);
        \App\Models\Setting::create(['key' => 'qr_code_path', 'value' => 'images/qr-code.png']);
        \App\Models\Setting::create(['key' => 'admin_email', 'value' => 'admin@swacheseva.com']);
        \App\Models\Setting::create(['key' => 'admin_phone', 'value' => '+91 9876543210']);

        // 3. Seed 20 Default Services
        $services = [
            [
                'name' => 'Aadhaar Card',
                'description' => 'Apply for New Aadhaar or Update Details',
                'link' => 'https://myaadhaar.uidai.gov.in/',
                'icon_class' => 'bi bi-fingerprint',
                'theme_color' => 'card-grad-orange-yellow',
                'is_featured' => true
            ],
            [
                'name' => 'PAN Card',
                'description' => 'Apply for New PAN or Corrections',
                'link' => 'https://www.onlineservices.nsdl.com/paam/endUserRegisterContact.html',
                'icon_class' => 'bi bi-card-heading',
                'theme_color' => 'card-grad-blue',
                'is_featured' => true
            ],
            [
                'name' => 'GST Registration',
                'description' => 'Register New GST or Update Details',
                'link' => 'https://www.gst.gov.in/',
                'icon_class' => 'bi bi-percent',
                'theme_color' => 'card-grad-green',
                'is_featured' => true
            ],
            [
                'name' => 'Driving License',
                'description' => 'Apply for New DL or Renewal',
                'link' => 'https://sarathi.parivahan.gov.in/',
                'icon_class' => 'bi bi-person-badge-fill',
                'theme_color' => 'card-grad-purple',
                'is_featured' => true
            ],
            [
                'name' => 'Voter ID Card',
                'description' => 'Apply for New Voter ID or Corrections',
                'link' => 'https://voters.eci.gov.in/',
                'icon_class' => 'bi bi-person-square',
                'theme_color' => 'card-grad-red',
                'is_featured' => false
            ],
            [
                'name' => 'Passport',
                'description' => 'Apply for New Passport or Re-issue',
                'link' => 'https://www.passportindia.gov.in/',
                'icon_class' => 'bi bi-globe2',
                'theme_color' => 'card-grad-teal',
                'is_featured' => false
            ],
            [
                'name' => 'Income Tax Return',
                'description' => 'File Your Income Tax Return Online',
                'link' => 'https://www.incometax.gov.in/',
                'icon_class' => 'bi bi-file-earmark-ruled',
                'theme_color' => 'card-grad-red',
                'is_featured' => false
            ],
            [
                'name' => 'PF Services',
                'description' => 'Employee Provident Fund Services',
                'link' => 'https://www.epfindia.gov.in/',
                'icon_class' => 'bi bi-piggy-bank',
                'theme_color' => 'card-grad-blue',
                'is_featured' => false
            ],
            [
                'name' => 'ESI Services',
                'description' => 'Employee State Insurance Services',
                'link' => 'https://www.esic.gov.in/',
                'icon_class' => 'bi bi-shield-fill-plus',
                'theme_color' => 'card-grad-green',
                'is_featured' => false
            ],
            [
                'name' => 'Shop Act License',
                'description' => 'Apply for Shop & Establishment License',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-shop',
                'theme_color' => 'card-grad-orange-yellow',
                'is_featured' => false
            ],
            [
                'name' => 'Birth Certificate',
                'description' => 'Apply for Birth Certificate Registry',
                'link' => 'https://crsorgi.gov.in/',
                'icon_class' => 'bi bi-file-earmark-person',
                'theme_color' => 'card-grad-red',
                'is_featured' => false
            ],
            [
                'name' => 'Death Certificate',
                'description' => 'Apply for Death Certificate Registry',
                'link' => 'https://crsorgi.gov.in/',
                'icon_class' => 'bi bi-file-earmark-minus',
                'theme_color' => 'card-grad-blue',
                'is_featured' => false
            ],
            [
                'name' => 'Marriage Certificate',
                'description' => 'Apply for Marriage Certificate',
                'link' => 'https://crsorgi.gov.in/',
                'icon_class' => 'bi bi-heart-fill',
                'theme_color' => 'card-grad-purple',
                'is_featured' => false
            ],
            [
                'name' => 'Caste Certificate',
                'description' => 'Apply for Caste Certificate online',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-file-earmark-text',
                'theme_color' => 'card-grad-green',
                'is_featured' => false
            ],
            [
                'name' => 'Residence Certificate',
                'description' => 'Apply for Residence Certificate',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-house-check',
                'theme_color' => 'card-grad-orange-yellow',
                'is_featured' => false
            ],
            [
                'name' => 'Domicile Certificate',
                'description' => 'Apply for Domicile Certificate',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-house-fill',
                'theme_color' => 'card-grad-green',
                'is_featured' => false
            ],
            [
                'name' => 'BC Certificate',
                'description' => 'Apply for BC Certificate online',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-file-earmark-check',
                'theme_color' => 'card-grad-orange-yellow',
                'is_featured' => false
            ],
            [
                'name' => 'EWS Certificate',
                'description' => 'Apply for EWS Income Certificate',
                'link' => 'https://serviceonline.gov.in/',
                'icon_class' => 'bi bi-file-earmark-lock',
                'theme_color' => 'card-grad-blue',
                'is_featured' => false
            ],
            [
                'name' => 'Udyam Registration',
                'description' => 'Register Your MSME Business online',
                'link' => 'https://udyamregistration.gov.in/',
                'icon_class' => 'bi bi-briefcase',
                'theme_color' => 'card-grad-purple',
                'is_featured' => false
            ],
            [
                'name' => 'MSME Registration',
                'description' => 'Register MSME / Udyam Business',
                'link' => 'https://udyamregistration.gov.in/',
                'icon_class' => 'bi bi-buildings',
                'theme_color' => 'card-grad-teal',
                'is_featured' => false
            ]
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }

        // 4. Seed Default Slideshow
        \App\Models\HeroSlide::create([
            'image_path' => 'hero-india.jpg',
            'caption' => 'India Heritage Banner'
        ]);
        \App\Models\HeroSlide::create([
            'image_path' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
            'caption' => 'Youth Education & Career Support'
        ]);
        \App\Models\HeroSlide::create([
            'image_path' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80',
            'caption' => 'Entrepreneurship & Skills Training'
        ]);

        // 5. Seed Default Blogs
        \App\Models\Blog::create([
            'title' => 'Launch of Swacheseva Skill Initiative',
            'slug' => 'launch-of-swacheseva-skill-initiative',
            'content' => 'The National Youth Employment Scheme has officially launched the Swacheseva e-governance service center network. Through this program, local entrepreneurs can establish their own center nodes to support dynamic candidate registration, government scheme delivery, and computer certification.',
            'image_path' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80',
            'author_name' => 'National Director',
            'status' => 'published'
        ]);
        \App\Models\Blog::create([
            'title' => 'Digital KYC Procedures Simplified',
            'slug' => 'digital-kyc-procedures-simplified',
            'content' => 'We are glad to announce that candidates can now verify their details online. Make sure you fill in all 36 profile columns correctly in the banking and qualification tabs to qualify for instant verification and center approval.',
            'image_path' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1200&q=80',
            'author_name' => 'Verification Officer',
            'status' => 'published'
        ]);
        \App\Models\Blog::create([
            'title' => 'Franchise Application Process & Guidelines',
            'slug' => 'franchise-application-process-guidelines',
            'content' => 'Setting up your own Swacheseva centre is simple: pay the application fee of Rs. 164/- via the registration page, enter your payment UTR reference code, upload the scanning receipt, and fill out the detailed form. The admin moderation board reviews submissions within 24 hours.',
            'image_path' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
            'author_name' => 'Moderation Desk',
            'status' => 'published'
        ]);
    }
}
