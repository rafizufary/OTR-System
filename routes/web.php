<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\InspectorController;
use App\Http\Controllers\PrintController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['roles:admin,coordinator,inspector,engineer'])->group(function () {
    Route::get('/status', [StatusController::class, 'status'])->name('status');
    Route::get('/print/{id}', [PrintController::class, 'print'])->name('print');
    // Route::get('/print/pdf/{id}', [PrintController::class, 'downloadPdf'])->name('print.pdf');

});

 // Routes untuk Engineer
Route::middleware(['roles:engineer'])->group(function () {
    Route::get('/form', [FormController::class, 'form'])->name('form');
    Route::post('/form', [FormController::class, 'store'])->name('form.store');
    Route::get('/engineer', [EngineerController::class, 'engineer'])->name('engineer');

});

Route::middleware(['roles:coordinator'])->group(function () {
    Route::get('/coordinator', [CoordinatorController::class, 'coordinator'])->name('coordinator');
    Route::get('/detail/{id}', [CoordinatorController::class, 'detail'])->name('detail');
    Route::put('/detail/{id}/status', [CoordinatorController::class, 'updateStatus'])->name('detail.updateStatus');
    // Route::get('/status', [StatusController::class, 'status'])->name('status');

});

Route::middleware(['roles:inspector'])->group(function () {
    // Halaman utama inspector
    Route::get('/inspector', [InspectorController::class, 'inspector'])->name('inspector');
    Route::get('/assessment/{id}', [InspectorController::class, 'assessment'])->name('assessment');
    // Menyimpan hasil assessment
    Route::post('/assessment', [InspectorController::class, 'store'])->name('assessment.store');
    // Mengupdate data assessment (termasuk skor dan status)
    Route::put('/assessment/{id}', [InspectorController::class, 'update'])->name('assessment.update');
});

// // Routes untuk Menu2
// Route::middleware(['roles:role2,super-admin'])->group(function () {
//     Route::get('/menu2', [Menu2Controller::class, 'index'])->name('menu2.index');
// });

// Route::middleware(['auth', 'roles:admin'])->group(function () {
//     Route::get('/admin-dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

// Route::middleware(['auth', 'roles:user'])->group(function () {
//     Route::get('/user-dashboard', function () {
//         return view('user.dashboard');
//     })->name('user.dashboard');
//     Route::get('/user-form', function () {
//         return view('user.form');
//     })->name('user.form');
// });


// Route::get('/dashboard', function () {
//     //     return view('dashboard');
//     // })->middleware(['auth', 'verified'])->name('dashboard');
//         $roles = auth()->user()->role;
    
//         switch ($roles) {
//             case 'admin':
//                 return redirect()->route('admin.dashboard');
//             case 'user':
//                 return redirect()->route('user.dashboard');
//             default:
//                 return abort(403, 'Unauthorized');
//     }
//     })->middleware(['auth'])->name('dashboard');









// Route::middleware(['auth', 'role:user,admin'])->group(function () {
//     Route::get('/admin-dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user-dashboard', function () {
//         return view('user.dashboard');
//     })->name('user.dashboard');
//     // Route::get('/form-input', [EngineerController::class, 'create'])->name('form.input');
//     // Route::post('/form-input', [EngineerController::class, 'store'])->name('form.store');
// });

require __DIR__.'/auth.php';
