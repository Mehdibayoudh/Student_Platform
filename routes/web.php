<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CentreFormationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\StudentCertificateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExperienceController;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.pageDaccueil');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// routes/web.php

Route::get('/verify-email/{id}/{token}', [AuthController::class, 'verifyEmail'])->name('verify.custom');


// Dashboards (placeholder routes)
Route::middleware('auth')->group(function () {
    Route::get('/student', function () {
        $user = Auth::user();
        $offers = \App\Models\Offer::with('company')->latest()->get();
        $formations = \App\Models\Formation::with('centre.user')->latest()->get();
        $notifications = [];
        if ($user->role === 'student') {
            $notifications = $user->notifications()
                ->where('type', App\Notifications\NewOfferNotification::class)
                ->latest()
                ->get();
        }

        return view('student.dashboard', compact('user', 'notifications','offers', 'formations'));
    })->name('student.dashboard');

    Route::get('/company', function () {
        return view('company.dashboard', ['user' => Auth::user()]);
    })->name('company.dashboard');
    Route::get('/centre formation', function () {
        return view('centre formation.dashboard', ['user' => Auth::user()]);
    })->name('centre formation.dashboard');

    Route::get('/admin', function () {
        return view('admin.dashboard', ['user' => Auth::user()]);
    })->name('admin.dashboard');
    Route::middleware('auth')->get('/profileupdate', [StudentController::class, 'Profileupdateview'])->name('profileviewupdate');

    Route::middleware('auth')->post('/updateprofile', [StudentController::class, 'updateProfile'])->name('profile.update');
    Route::post('/studentportfolio', [StudentController::class, 'updatePortfolio'])->name('student.updatePortfolio');
    Route::post('/studentupdateimage', [StudentController::class, 'updateProfileImage'])->name('student.updateImage');
    Route::resource('student-experiences', StudentExperienceController::class)->middleware('auth');
    Route::resource('student-certificates', StudentCertificateController::class)->only(['store']);
    Route::delete('/student-certificates/{id}', [StudentCertificateController::class, 'destroy'])->name('student-certificates.destroy');
    Route::middleware('auth')->post('/updateprofilecompany', [CompanyController::class, 'updateProfile'])->name('profilecompany.update');
    Route::middleware('auth')->get('/profileupdatecompany', [CompanyController::class, 'Profileupdateview'])->name('profilecompanyviewupdate');
    Route::middleware(['auth'])->group(function () {
        Route::post('/offers', [CompanyController::class, 'store'])->name('offers.store');
    });
    Route::delete('/offer-company/{id}', [CompanyController::class, 'destroy'])->name('offer.destroy');

    Route::get('/offers/{id}', [CompanyController::class, 'show'])->name('offers.show');
    Route::post('/offer/post-student', [CompanyController::class, 'postStudent'])->name('offer.postStudent');
    Route::get('/student/profile/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.publicprofile');
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'showusers'])->name('admin.users.index');
    Route::middleware('auth')->get('/profileupdatecentre', [\App\Http\Controllers\CentreFormationController::class, 'Profileupdateview'])->name('profileupdatecentre');
    Route::middleware(['auth'])->group(function () {
        Route::post('/formation', [\App\Http\Controllers\CentreFormationController::class, 'store'])->name('formations.store');
    });
    Route::delete('/formation-centre/{id}', [CentreFormationController::class, 'destroy'])->name('formations.destroy');
    Route::middleware('auth')->post('/updateprofile', [CentreFormationController::class, 'updateProfile'])->name('profile.updatecentre');

});


