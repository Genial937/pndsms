<?php

use App\Http\Controllers\admin\adminBroadcastController;
use App\Http\Controllers\admin\adminClientsController;
use App\Http\Controllers\admin\adminContactsController;
use App\Http\Controllers\admin\adminHomeController;
use App\Http\Controllers\admin\adminInboxController;
use App\Http\Controllers\admin\adminOutboxController;
use App\Http\Controllers\admin\adminProfileController;
use App\Http\Controllers\admin\adminTemplatesController;
use App\Http\Controllers\admin\overviewController;
use App\Http\Controllers\admin\providerController;
use App\Http\Controllers\admin\subscriptionsController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\logoutController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\client\clientBroadcastController;
use App\Http\Controllers\client\clientContactController;
use App\Http\Controllers\client\clientHomeController;
use App\Http\Controllers\client\clientInboxController;
use App\Http\Controllers\client\clientOutboxController;
use App\Http\Controllers\client\clientPaymentController;
use App\Http\Controllers\client\clientProfileController;
use App\Http\Controllers\client\clientReportsController;
use App\Http\Controllers\client\clientSMSController;
use App\Http\Controllers\client\clientTagsController;
use App\Http\Controllers\client\clientTemplateController;
use App\Http\Controllers\client\clientUnsendController;
use App\Http\Controllers\client\importContactController;
use App\Http\Controllers\client\tagContactsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//
Route::resource('login', loginController::class);
Route::get('/verify', [registerController::class, 'verifyUser'])->name('verify.user');
Route::post('/password', [registerController::class, 'setPassword'])->name('set.password');
//clients
Route::middleware(['auth'])->group(function () {
    Route::resource('/', clientHomeController::class);
    Route::prefix('client')->group(function() {
        Route::resource('my-profile', clientProfileController::class);
        Route::resource('template', clientTemplateController::class);
        Route::resource('contacts', clientContactController::class);
        Route::resource('tags', clientTagsController::class);
        Route::resource('sms', clientSMSController::class);
        Route::resource('broadcast', clientBroadcastController::class);
        Route::resource('inbox', clientInboxController::class);
        Route::resource('outbox', clientOutboxController::class);
        Route::resource('unsend', clientUnsendController::class);
        Route::resource('reports', clientReportsController::class);
        Route::resource('tag-contacts', tagContactsController::class);
        Route::resource('payments', clientPaymentController::class);
        Route::put('/change/{id}',[clientProfileController::class,'changePassword'])->name('pass.change');
        Route::resource('import', importContactController::class);
    });
});

Route::resource('logout', logoutController::class);

//main admin
Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::resource('/', adminHomeController::class);
        Route::resource('overview', overviewController::class);
        Route::resource('client-templates', adminTemplatesController::class);
        Route::resource('client-contacts', adminContactsController::class);
        Route::resource('client-broadcast', adminBroadcastController::class);
        Route::resource('client-inbox', adminInboxController::class);
        Route::resource('client-outbox', adminOutboxController::class);
        Route::resource('clients', adminClientsController::class);
        Route::resource('subscriptions', subscriptionsController::class);
        Route::resource('profile', adminProfileController::class);
        Route::post('/search-contacts',[adminContactsController::class,'search'])->name('contacts.search');
        Route::post('/search-outbox',[adminOutboxController::class,'search'])->name('outbox.search');
        Route::post('/search-templates', [adminTemplatesController::class, 'search'])->name('template.search');
        Route::post('/search-subscriptions', [subscriptionsController::class, 'search'])->name('sub.search');
        Route::resource('providers', providerController::class);
    });
});

