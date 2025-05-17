<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LogVoucherController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TreatmentRecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Mail\NotifyEmailPassword;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


Route::get('/email/verify/{id}/{hash}', function (Request $request, $id, $hash) {
    $pass = $request->query('password');
    // Ambil user berdasarkan ID
    $user = User::findOrFail($id);

    // Cocokkan hash email
    if (sha1($user->email) !== $hash) {
        abort(403, 'Hash email tidak cocok.');
    }

    // Cek apakah link sudah kedaluwarsa
    $expires = $request->query('expires');  // Ambil nilai expires dari URL
    if (!$expires || $expires < now()->timestamp) {
        abort(401, 'Link verifikasi sudah kedaluwarsa.');
    }

    // Ubah status verifikasi jika belum
    if (! $user->status) {
        $user->status = 1;
        $user->save();
        Mail::to($user->email)->send(new NotifyEmailPassword($user, $pass));
    }

    // Tampilkan halaman sukses
    return view('auth.verification-success');
})->name('manual.verification');


Route::middleware(['language'])->group(function () {
    Route::get('/', function () {
        return view('frontend.index');
    });
    
    Route::get('/services', function () {
        return view('frontend.services');
    });
    
    Route::get('/about-us', function () {
        return view('frontend.aboutus');
    });
    
    Route::get('/membership', function () {
        $now = Carbon::now('Asia/Jakarta')->toDateTimeString();

        $activeVouchers = Voucher::whereRaw('? BETWEEN CONCAT(start_date, " ", start_time) AND CONCAT(end_date, " ", end_time)', [$now])
            ->orderBy('created_at', 'desc')
            ->get();
 
        return view('frontend.membership', compact('activeVouchers'));
    })->name('membership');


    Route::get('/privacy-policy', function () {
        return view('frontend.privacy-policy');
    });

    Route::get('/verify-password', function () {
        return view('frontend.verify-password');
    });

    Route::middleware(['auth'])->group(function () {
        // Route For User
        Route::group(['middleware' => ['role:user']], function () {
            Route::get('/home', [UserController::class, 'index'])->name('user.home');
        });
    });
    
});

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/membership/detail/{id}', function (Request $request, $id) {
            $now = Carbon::now('Asia/Jakarta')->toDateTimeString();
            $activeVouchersDetail = Voucher::where('id', $id)
            ->whereRaw('? BETWEEN CONCAT(start_date, " ", start_time) AND CONCAT(end_date, " ", end_time)', [$now])
            ->orderBy('created_at', 'desc')
            ->first();
            return view('frontend.membership-detail', compact('activeVouchersDetail'));
        })->name('membership.detail');
    });
});

Route::get('/change-language/{lang}', function ($lang) {
    $supportedLanguages = ['id', 'en', 'zh']; // Bahasa yang didukung

    if (in_array($lang, $supportedLanguages)) {
        Session::put('locale', $lang);
    }

    return back();
})->name('change.language');

Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/patient', [PatientController::class, 'index'])->name('patient');
        Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
        Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');
        // Route::get('/patient/show/{id?}', [PatientController::class, 'show'])->name('patient.show');
        Route::get('/patient/edit/{id?}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::put('/patient/edit/{id?}', [PatientController::class, 'update'])->name('patient.update');
        Route::delete('/patient/delete/{id?}', [PatientController::class, 'destroy'])->name('patient.destroy');
    
        // Route For Medical History
        Route::get('/medical/history', [MedicalHistoryController::class, 'index'])->name('medical.history');
        Route::get('/medical/history/create/{history}', [MedicalHistoryController::class, 'create'])->name('medical-history.create');
        Route::post('/medical/history/store/{history}', [MedicalHistoryController::class, 'store'])->name('medical.history.store');
        Route::get('/medical/history/show/{history}', [MedicalHistoryController::class, 'show'])->name('medical.history.show');
        Route::get('/medical/history/edit/{history}', [MedicalHistoryController::class, 'edit'])->name('medical.history.edit');
        Route::put('/medical/history/update/{history}', [MedicalHistoryController::class, 'update'])->name('medical.history.update');
        Route::delete('/medical/history/delete/{history}', [MedicalHistoryController::class, 'destroy'])->name('medical.history.destroy');
    
        // Route For Treatments Notes
        Route::get('/treatments', [TreatmentRecordController::class, 'index'])->name('treatment.record');
        Route::get('/treatment/create/{treatmentRecord}', [TreatmentRecordController::class, 'create'])->name('treatment.create');
        Route::get('/treatment/show/{treatmentRecord}', [TreatmentRecordController::class, 'show'])->name('treatment.show');
        Route::post('/treatment/store/{treatmentRecord}', [TreatmentRecordController::class, 'store'])->name('treatment.store');
        Route::get('/treatment/edit/{treatmentRecord}', [TreatmentRecordController::class, 'edit'])->name('treatment.edit');
        Route::put('/treatment/update/{treatmentRecord}', [TreatmentRecordController::class, 'update'])->name('treatment.update');
        Route::delete('/treatment/delete/{treatmentRecord}', [TreatmentRecordController::class, 'destroy'])->name('treatment.destroy');
        Route::get('/export/pdf/{treatmentRecord}/pdf', [PDFController::class, 'exportPDF'])->name('treatment.export.pdf');
        Route::get('/export/pdf/{treatmentRecord}/excel', [PDFController::class, 'exportExcel'])->name('treatment.export.excel');

        // Route For Voucher
        Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher');
        Route::get('/voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
        Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
        Route::get('/voucher/edit/{id?}', [VoucherController::class, 'edit'])->name('voucher.edit');
        Route::put('/voucher/edit/{id?}', [VoucherController::class, 'update'])->name('voucher.update');
        Route::delete('/voucher/delete/{id?}', [VoucherController::class, 'destroy'])->name('voucher.destroy');  

        Route::post('/redeem/{id}', [LogVoucherController::class, 'create'])->name('reedem.voucher');
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    });
});

require __DIR__.'/auth.php';
                                                                                         
