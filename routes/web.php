<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\ContactMessageController;
use App\Models\HeroSlide;
use App\Models\Service;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Frontend Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $slides = HeroSlide::all();
    $featuredServices = Service::where('is_featured', true)->orderBy('sort_order')->orderBy('id')->get();
    $latestBlogs = Blog::where('status', 'published')->latest()->take(3)->get();
    return view('frontend.home', compact('slides', 'featuredServices', 'latestBlogs'));
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/services', function () {
    $services = Service::orderBy('sort_order')->orderBy('id')->get();
    return view('frontend.services', compact('services'));
})->name('services');

Route::get('/blog', function () {
    $blogs = Blog::where('status', 'published')->latest()->paginate(9);
    return view('frontend.blog', compact('blogs'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug', $slug)->where('status', 'published')->firstOrFail();
    $recentBlogs = Blog::where('slug', '!=', $slug)->where('status', 'published')->latest()->take(5)->get();
    return view('frontend.blog-detail', compact('blog', 'recentBlogs'));
})->name('blog.detail');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');
Route::post('/contact', [ContactMessageController::class, 'submitMessage'])->name('contact.submit');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('admin.users');
    Route::post('/users/create', [AdminDashboardController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users/{id}/update', [AdminDashboardController::class, 'updateUser'])->name('admin.users.update');
    Route::post('/users/{id}/approve', [AdminDashboardController::class, 'approveUser'])->name('admin.users.approve');
    Route::post('/users/{id}/reject', [AdminDashboardController::class, 'rejectUser'])->name('admin.users.reject');
    Route::post('/users/{id}/impersonate', [AdminDashboardController::class, 'impersonateUser'])->name('admin.users.impersonate');
    Route::get('/users/{id}/pdf', [AdminDashboardController::class, 'downloadPdf'])->name('admin.users.pdf');
    Route::get('/users/export/csv', [AdminDashboardController::class, 'exportCsv'])->name('admin.users.export.csv');

    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services');
    Route::post('/services/store', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::post('/services/{id}/update', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::post('/services/{id}/delete', [AdminServiceController::class, 'destroy'])->name('admin.services.delete');
    Route::post('/services/reorder', [AdminServiceController::class, 'reorder'])->name('admin.services.reorder');

    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs');
    Route::post('/blogs/store', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::post('/blogs/{id}/update', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::post('/blogs/{id}/delete', [AdminBlogController::class, 'destroy'])->name('admin.blogs.delete');

    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('admin.reports');

    Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings/profile', [AdminSettingController::class, 'updateProfileSettings'])->name('admin.settings.profile');
    Route::post('/settings/contact', [AdminSettingController::class, 'updateContactSettings'])->name('admin.settings.contact');
    Route::post('/settings/payment', [AdminSettingController::class, 'updatePaymentSettings'])->name('admin.settings.payment');
    Route::post('/settings/slide/add', [AdminSettingController::class, 'addSlide'])->name('admin.settings.slide.add');
    Route::post('/settings/slide/{id}/delete', [AdminSettingController::class, 'deleteSlide'])->name('admin.settings.slide.delete');
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages');
    Route::post('/messages/{id}/read', [ContactMessageController::class, 'markRead'])->name('admin.messages.read');
    Route::post('/messages/{id}/delete', [ContactMessageController::class, 'deleteMessage'])->name('admin.messages.delete');
});

/*
|--------------------------------------------------------------------------
| User Portal Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware(['auth', 'candidate'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserDashboardController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/services', [UserDashboardController::class, 'services'])->name('user.services');
    Route::get('/blogs', [UserDashboardController::class, 'blogs'])->name('user.blogs');
    Route::get('/password', [UserDashboardController::class, 'password'])->name('user.password');
    Route::post('/password/update', [UserDashboardController::class, 'updatePassword'])->name('user.password.update');
});
