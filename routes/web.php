<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Models\VolunteerEvent;

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ExploreCampaignController;
use App\Http\Controllers\Auth\DonorAuthController;
use App\Http\Controllers\Auth\VolunteerAuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GeneralDonationController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\VolunteerEventController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CampaignAdminController;
use App\Http\Controllers\Admin\ExploreCampaignAdminController;
use App\Http\Controllers\Admin\VolunteerEventAdminController;

// ------------------------------------------
// Public Routes
// ------------------------------------------
Route::get('/', [CampaignController::class, 'homepage'])->name('home');

// Static pages
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/donate', fn() => view('donate'))->name('Donate');
Route::get('/contact', fn() => view('Contactus'))->name('Contactus');

// Explore Campaigns
Route::get('/explore', [ExploreCampaignController::class, 'index'])->name('Explore');
Route::get('/explore-campaigns', [ExploreCampaignController::class, 'index'])->name('explore.index');
Route::get('/explore-campaigns/{slug}', [ExploreCampaignController::class, 'show'])->name('explore.show');

// Campaigns
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/donate/{slug}', [CampaignController::class, 'show'])->name('donate.show');
Route::post('/donate/{slug}', [CampaignController::class, 'donate'])->name('donate.store');

// Volunteer Page
Route::get('/volunteer', function () {
    $events = VolunteerEvent::all();
    return view('volunteer', compact('events'));
})->name('Volunteer');

// Volunteer Events (user side)
Route::get('/volunteer-events', [VolunteerEventController::class, 'index'])->name('volunteer.events');
Route::get('/volunteer-events/{id}', [VolunteerEventController::class, 'show'])->name('volunteer.events.show');

// ------------------------------------------
// Login / Register Routes
// ------------------------------------------
// Donor
Route::get('/login/donor', [DonorAuthController::class, 'showLoginForm'])->name('donor.login.form');
Route::post('/login/donor', [DonorAuthController::class, 'login'])->name('donor.login');
Route::get('/register/donor', [DonorAuthController::class, 'showRegisterForm'])->name('donor.register.form');
Route::post('/register/donor', [DonorAuthController::class, 'register'])->name('donor.register');

// Volunteer
Route::get('/login/volunteer', [VolunteerAuthController::class, 'showLoginForm'])->name('volunteer.login.form');
Route::post('/login/volunteer', [VolunteerAuthController::class, 'login'])->name('volunteer.login');
Route::get('/register/volunteer', [VolunteerAuthController::class, 'showRegisterForm'])->name('volunteer.register.form');
Route::post('/register/volunteer', [VolunteerAuthController::class, 'register'])->name('volunteer.register');

// Dashboard (after login)
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// ------------------------------------------
// Donation Forms
// ------------------------------------------

// Regular
Route::get('/donate/{slug}/fill-details', [CampaignController::class, 'showForm'])->name('donate.fill');
Route::post('/donate/{slug}/fill-details', [DonationController::class, 'store'])->name('donate.store');

// 🔁 Make both routes use same base path: "explore-campaigns"
Route::get('/explore-campaigns/{slug}/donate', [ExploreCampaignController::class, 'showForm'])->name('explore.showForm');
Route::post('/explore-campaigns/{slug}/donate', [DonationController::class, 'store'])->name('explore.donate.store');



// General Donation (no campaign)
Route::post('/donate', [DonationController::class, 'storeGeneral'])->name('donation.store.general');

// OPTIONAL Legacy fallback (ONLY if required)
Route::post('/explore/{slug}/fill-details', [DonationController::class, 'store'])->name('explore.donate.legacy');


// ------------------------------------------
// Volunteer Event Participation
// ------------------------------------------
Route::get('/participate/{eventId}', [ParticipationController::class, 'showForm'])->name('participate.form');
Route::post('/participate', [ParticipationController::class, 'submit'])->name('participate.submit');
Route::post('/participate/general', [ParticipationController::class, 'storeGeneral'])->name('participation.general');

// ------------------------------------------
// Admin Routes
// ------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Campaigns CRUD
    Route::resource('campaigns', CampaignAdminController::class);

    // Admin Explore Campaigns CRUD
    Route::resource('explore', ExploreCampaignAdminController::class);

    // ✅ Admin Volunteer Events CRUD (Final Add)
    Route::resource('volunteer-events', VolunteerEventAdminController::class);
});

// ------------------------------------------
// Admin Login / Logout (DB-Based)
// ------------------------------------------
use App\Http\Controllers\Admin\AdminLoginController;

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// ------------------------------------------
// Logout Routes
// ------------------------------------------
// logout route for all users
Route::post('/logout', function () {
    session()->flush(); // remove all session variables
    return redirect()->route('home');
})->name('logout');


// ------------------------------------------
//profile routes
// ------------------------------------------
//door profile routes
Route::middleware('auth:donor')->group(function () {
    Route::get('/my-profile', [App\Http\Controllers\Donor\ProfileController::class, 'index'])->name('donor.profile');
});
// Volunteer profile routes
use App\Http\Controllers\Volunteer\ProfileController as VolunteerProfileController;
Route::middleware(['auth:volunteer'])->group(function () {
    Route::get('/volunteer/profile', [VolunteerProfileController::class, 'show'])->name('volunteer.profile');
});

//-------------------------------------------
// Contact Us Form
//-------------------------------------------
use App\Http\Controllers\ContactController;
// routes/web.php
Route::post('/submit-contact', [ContactController::class, 'submit'])->name('contact.submit');

// ------------------------------------------
// admin campaigns donor list
// ------------------------------------------

// priority campaigns donor list
Route::get('/admin/campaigns/{id}/donors', [CampaignAdminController::class, 'showDonors'])->name('admin.campaigns.donors');

//explore campaigns donor list
Route::get('/admin/explore/{id}/donors', [ExploreCampaignAdminController::class, 'showDonors'])->name('admin.explore.donors');

// volunteer events donor list
Route::get('/admin/volunteer-events/{id}/participants', [VolunteerEventAdminController::class, 'showParticipants'])->name('admin.volunteer-events.participants');
