<?php

use App\Http\Controllers\AboutUspageController;
use App\Http\Controllers\AdminChangePasswordController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEventTypeController;
use App\Http\Controllers\AdminListingsController;
use App\Http\Controllers\AdminManagePackagesController;
use App\Http\Controllers\AdminManageServicesController;
use App\Http\Controllers\AdminManageUserController;
use App\Http\Controllers\AdminPackagesController;
use App\Http\Controllers\AdminVenuesController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AllEventServicesController;
use App\Http\Controllers\AllVenueController;
use App\Http\Controllers\CallRequestController;
use App\Http\Controllers\CateringPageController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EventPageController;
use App\Http\Controllers\EventServicesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageListingsController;
use App\Http\Controllers\PremiumServicesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserAddServicesController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserListingsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NeedHelpController;
use App\Http\Controllers\PhotographyPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\TrendingAdsController;
use App\Http\Controllers\UpgradePackageController;
use App\Http\Controllers\UserMessages;
use App\Http\Controllers\UserMyServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/trending/{id}', [TrendingAdsController::class, 'index']);
Route::get('/event/catering-services', [CateringPageController::class, 'index'])->name('catering-services');
Route::get('/event/event-consultation', [EventPageController::class, 'index'])->name('event-consultation');
Route::get('/event/photography', [PhotographyPageController::class, 'index'])->name('photography');
// Route::get('/event/all-event-services', [AllEventServicesController::class, 'index'])->name('all-services');
Route::get('/event-services', [EventServicesController::class, 'index'])->name('event-services');
Route::post('/event-services', [SearchController::class, 'searchEventServices'])->name('searchEventServices');
Route::get('/event-services/{id}', [EventServicesController::class, 'singleEvent']);
Route::get('/venue-concierge', [NeedHelpController::class, 'index'])->name('venue-concierge');
Route::post('/venue-concierge', [NeedHelpController::class, 'store'])->name('concierge-submit');
Route::get('/about-us', [AboutUspageController::class, 'index'])->name('about-us');
Route::get('/all-venues', [AllVenueController::class, 'index'])->name('all-venues');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact-us-submit');

// google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// facebook login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login-account')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login')->middleware('guest');

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name(
    'register'
)->middleware('guest');
// search functionality
Route::post('/search-venue', [SearchController::class, 'index'])->name('search-venue');



/*********************User dashboard************************/
Route::Group(['prefix' => 'user'], function () {
    Route::get('/', [UserDashboardController::class, 'index'])
        ->name('user.dashboard')
        ->middleware('auth');
    Route::post('/', [LoginController::class, 'logout'])
        ->name('logout.dashboard')
        ->middleware('auth');
    Route::get('/listings', [UserListingsController::class, 'index'])
        ->name('user.listing')
        ->middleware('auth');
    Route::get('/add-listings', [UserListingsController::class, 'addListings'])
        ->name('user.add-listing')
        ->middleware('auth');
    Route::post('/add-listings', [
        UserListingsController::class,
        'storeListings',
    ])
        ->name('user.add-listing')
        ->middleware('auth');
    Route::get('/edit-profile', [
        UserDashboardController::class,
        'editProfileView',
    ])
        ->name('user.edit-profile-view')
        ->middleware('auth');
    Route::post('/edit-profile', [UserDashboardController::class, 'updateUser'])
        ->name('edit-profile')
        ->middleware('auth');
    Route::post('/edit-profile/email', [
        UserDashboardController::class,
        'updateEmail',
    ])
        ->name('edit-email')
        ->middleware('auth');
    Route::post('/edit-profile/avatar', [
        UserDashboardController::class,
        'updateAvatar',
    ])
        ->name('edit-avatar')
        ->middleware('auth');
    Route::get('/edit-venue/{id}', [
        UserDashboardController::class,
        'editVenue',
    ])->middleware('auth');
    Route::post('/edit-venue-name', [UserDashboardController::class, 'updateVenueName'])
        ->name('edit-venue-name')
        ->middleware('auth');
    Route::post('/edit-venue-type', [UserDashboardController::class, 'updateVenueType'])
        ->name('edit-venue-type')
        ->middleware('auth');
    Route::post('/edit-venue-people', [UserDashboardController::class, 'updatePeople'])
        ->name('edit-venue-people')
        ->middleware('auth');
    Route::post('/edit-venue-event', [UserDashboardController::class, 'updateEvent'])
        ->name('edit-venue-event')
        ->middleware('auth');
    Route::post('/edit-venue-state', [UserDashboardController::class, 'updateVenueState'])
        ->name('edit-venue-state')
        ->middleware('auth');
    Route::post('/edit-venue-image-1', [UserDashboardController::class, 'updateVenueImage1'])
        ->name('edit-venue-image-1')
        ->middleware('auth');
    Route::post('/edit-venue-image-2', [UserDashboardController::class, 'updateVenueImage2'])
        ->name('edit-venue-image-2')
        ->middleware('auth');
    Route::post('/edit-venue-image-3', [UserDashboardController::class, 'updateVenueImage3'])
        ->name('edit-venue-image-3')
        ->middleware('auth');
    Route::post('/edit-venue-image-4', [UserDashboardController::class, 'updateVenueImage4'])
        ->name('edit-venue-image-4')
        ->middleware('auth');
    Route::post('/edit-venue-description', [UserDashboardController::class, 'updateDescription'])
        ->name('edit-venue-description')
        ->middleware('auth');
    Route::get('/delete-venue/{id}', [
        UserDashboardController::class,
        'deleteVenue',
    ])->middleware('auth');
    Route::get('/edit-service/{id}', [
        UserMyServiceController::class,
        'editService',
    ])->middleware('auth');
    Route::post('/edit-service', [
        UserMyServiceController::class,
        'updateService',
    ])
        ->name('edit-service')
        ->middleware('auth');
    Route::get('/delete-service/{id}', [
        UserMyServiceController::class,
        'deleteService',
    ])->middleware('auth');
    Route::get('/premium-services', [PremiumServicesController::class, 'index'])
        ->middleware('auth')
        ->name('user.premium-services');
    Route::get('/how-it-works', [
        PremiumServicesController::class,
        'howItworks',
    ])->middleware('auth');
    Route::get('/add-services', [UserAddServicesController::class, 'index'])
        ->name('user.add-services')
        ->middleware('auth');
    Route::post('/add-services', [UserAddServicesController::class, 'store'])
        ->name('user.add-services')
        ->middleware('auth');
    Route::post('/call-request', [
        CallRequestController::class,
        'callRequest',
    ])->name('user.call-request')->middleware('auth');
    Route::get('/my-services', [UserMyServiceController::class, 'index'])
        ->name('user.my-services')
        ->middleware('auth');
    Route::get('/messages', [UserMessages::class, 'index'])->name('user.messages')->middleware('auth');
    // change password
    Route::post('change-password', [
        ChangePasswordController::class,
        'store',
    ])->name('change.password')->middleware('auth');
    Route::get('/change-password', [
        ChangePasswordController::class,
        'changePassword',
    ])
        ->name('user.change-password')
        ->middleware('auth');

    Route::get('/upgrade-package', [UpgradePackageController::class, 'index'])->name('user.upgrade-package');
    Route::get('/verify-paym`ent/{reference}', [UpgradePackageController::class, 'verify']);

});







Route::Group(
    ['prefix' => 'admin', 'middleware' => ['admin', 'auth']],
    function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name(
            'admin.dashboard'
        );
        Route::get('/edit-profile', [
            AdminDashboardController::class,
            'editProfile',
        ])->name('edit.profile');
        Route::post('/edit-profile', [
            AdminDashboardController::class,
            'updateUser',
        ])
            ->name('admin-edit-profile')
            ->middleware('auth');
        Route::post('/edit-profile/avatar', [
            AdminDashboardController::class,
            'updateAvatar',
        ])
            ->name('admin-edit-avatar')
            ->middleware('auth');
        Route::post('/edit-profile/email', [
            AdminDashboardController::class,
            'updateEmail',
        ])
            ->name('admin-edit-email')
            ->middleware('auth');
        // change password
        Route::post('change-password', [
            AdminChangePasswordController::class,
            'store',
        ])->name('admin.change.password');
        Route::get('/change-password', [
            AdminChangePasswordController::class,
            'changePassword',
        ])
            ->name('admin.change-password')
            ->middleware('auth');
        Route::get('/manage-listings', [
            AdminListingsController::class,
            'index',
        ])->name('admin.manage-listings');
        Route::get('/manage-listings-services', [
            AdminListingsController::class,
            'services',
        ])->name('admin.manage-listings-services');
        Route::get('/edit-service/{id}', [
            AdminListingsController::class,
            'editService',
        ]);
        Route::post('/edit-service', [
            AdminListingsController::class,
            'updateService',
        ])->name('admin-edit-service');

        Route::get('/delete-listing/{id}', [
            AdminListingsController::class,
            'deleteService',
        ])->middleware('auth');

        Route::get('/edit-listing-venue/{id}', [
            AdminListingsController::class,
            'editVenue',
        ])->name('admin.edit-venue');
        Route::post('/edit-listing-venue', [
            AdminListingsController::class,
            'updateVenue',
        ])
            ->name('admin.edit-venue')
            ->middleware('auth');
        Route::get('/manage-packages', [
            AdminPackagesController::class,
            'index',
        ])->name('admin.manage-packages');
        Route::get('/manage.events', [
            AdminEventTypeController::class,
            'index',
        ])->name('admin.manage-event');
        Route::get('/manage-venues', [
            AdminVenuesController::class,
            'index',
        ])->name('admin.manage-venues');
        Route::post('/manage-venues', [
            AdminVenuesController::class,
            'store',
        ])->name('admin.manage-venues');
        Route::post('/manage-events', [
            AdminEventTypeController::class,
            'store',
        ])->name('admin.manage-events');
        Route::post('/manage-packages', [
            AdminPackagesController::class,
            'store',
        ])->name('admin.manage-packages');
        Route::get('/edit-venue-type/{id}', [
            AdminVenuesController::class,
            'editVenueType',
        ]);
        Route::post('/edit-venue-type', [
            AdminVenuesController::class,
            'updateVenueType',
        ])->name('updateVenueType');
        Route::get('/delete-venue-type/{id}', [
            AdminVenuesController::class,
            'deleteVenueType',
        ]);
        Route::get('/listings/approve{id}', [
            ManageListingsController::class,
            'approveListing',
        ]);
        Route::get('/listings/disapprove{id}', [
            ManageListingsController::class,
            'disapproveListing',
        ]);
        Route::get('/delete-venue/{id}', [
            ManageListingsController::class,
            'deleteVenue',
        ]);
        Route::get('/delete-event-type/{id}', [
            AdminVenuesController::class,
            'deleteEventType',
        ]);
        Route::get('/edit-event-type/{id}', [
            AdminVenuesController::class,
            'editEventType',
        ]);
        Route::get('/approve-event-type/{id}', [
            AdminVenuesController::class,
            'approveEventType',
        ]);
        Route::get('/disapprove-event-type/{id}', [
            AdminVenuesController::class,
            'disapproveEventType',
        ]);
        Route::post('/edit-event-type', [
            AdminVenuesController::class,
            'updateEventType',
        ])->name('updateEventType');
        Route::get('/manage-users', [
            AdminDashboardController::class,
            'manageUsers',
        ])->name('admin.manage-users');
        Route::get('/manage-services', [
            AdminManageServicesController::class,
            'index',
        ])->name('admin.manage-services');
        Route::post('/manage-services/event-services', [
            AdminManageServicesController::class,
            'manageEServices',
        ])->name('admin.add-event-services');
        Route::post('/manage-services', [
            AdminManageServicesController::class,
            'store',
        ])->name('admin.manage-services');
        Route::get('/call-requests', [
            CallRequestController::class,
            'index',
        ])->name('admin.call-requests');
        Route::get('/manage-users/disable/{id}', [
            AdminManageUserController::class,
            'disableUser',
        ]);
        Route::get('/manage-users/enable/{id}', [
            AdminManageUserController::class,
            'enableUser',
        ]);
        Route::get('/manage-users/delete/{id}', [
            AdminManageUserController::class,
            'deleteUser',
        ]);

        Route::get('/edit-user-profile/{id}', [
            AdminManageUserController::class,
            'editUser',
        ]);
        Route::get('/send-user-message/{id}', [
            SendMessageController::class, 'index',
        ])->name('send-message');
        Route::post('/send-user-message', [
            SendMessageController::class, 'send',
        ])->name('send-message');
        Route::post('/edit-user-profile/email', [
            AdminManageUserController::class,
            'updateEmail',
        ])->name('admin.edit-user-email');
        Route::post('/edit-user-profile/package', [
            AdminManageUserController::class,
            'updatePackage',
        ])->name('admin.edit-user-package');

        Route::post('/edit-user-profile/mobile', [
            AdminManageUserController::class,
            'updateMobile',
        ])->name('admin.edit-user-mobile');

        Route::get('/manage-packages/edit/{id}', [
            AdminManagePackagesController::class,
            'editPackage',
        ]);
        Route::get('/manage-packages/delete/{id}', [
            AdminManagePackagesController::class,
            'deletePackage',
        ]);
        Route::post('/manage-packages/edit', [
            AdminManagePackagesController::class,
            'updatePackage',
        ])->name('updatePackage');
        Route::get('/ads', [AdsController::class, 'index'])->name('ads');
        Route::post('/ads', [AdsController::class, 'upload'])->name('upload_ads');
        // /admin/delete-venue/{{$listing->id}}
        Route::get('/delete-ads/{id}', [
            AdsController::class,
            'deleteAds',
        ]);
        Route::get('/send-message', [SendMessageController::class, 'index'])->name('admin.send-message');
    }
);


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get')->middleware('guest');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post')->middleware('guest');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get')->middleware('guest');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post')->middleware('guest');
