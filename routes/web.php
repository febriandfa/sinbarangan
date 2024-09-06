<?php

use App\Http\Controllers\Admin\KelompokAdminController;
use App\Http\Controllers\Admin\ModulAdminController;
use App\Http\Controllers\Admin\SimulasiAdminController;
use App\Http\Controllers\Admin\TugasAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Guru\KelompokGuruController;
use App\Http\Controllers\Guru\ModulGuruController;
use App\Http\Controllers\Guru\SimulasiGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\UserGuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\KelompokSiswaController;
use App\Http\Controllers\Siswa\ModulSiswaController;
use App\Http\Controllers\Siswa\SessionSiswaController;
use App\Http\Controllers\Siswa\SimulasiSiswaController;
use App\Http\Controllers\Siswa\TugasJobSiswaController;
use App\Http\Controllers\Siswa\TugasSiswaController;
use Illuminate\Foundation\Application;
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

Route::get('/foo', function () {
    $target = '/home/sinbaran/sinbarangan/storage/app/public';
    $shortcut = '/home/sinbaran/public_html/storage';
    symlink($target, $shortcut);
});


Route::group(['middleware' => 'role:siswa'], function () {
    Route::prefix('siswa')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'siswa'])->name('siswa.dashboard');
        Route::post('/session/store', [SessionSiswaController::class, 'store'])->name('session.store');
        Route::resources([
            'kelompok' => KelompokSiswaController::class,
            'tugas' => TugasSiswaController::class,
            'tugas-job' => TugasJobSiswaController::class
        ]);
        Route::get('/tugas/{tugasId}/tugas-job/create', [TugasJobSiswaController::class, 'create'])->name('tugas-job.create');
        Route::patch('/tugas-job/{jobId}/update-status', [TugasJobSiswaController::class, 'updateStatus'])
            ->name('tugas-job.updateStatus');

        Route::get('/tugas/{id}/rumusan-masalah', [TugasSiswaController::class, 'rumusanMasalah'])
            ->name('tugas.rumusanMasalah');
        Route::get('/tugas/{id}/daftar-tugas', [TugasSiswaController::class, 'daftarTugas'])
            ->name('tugas.daftarTugas');
        Route::get('/tugas/{id}/laporan', [TugasSiswaController::class, 'laporan'])
            ->name('tugas.laporan');
        Route::get('/tugas/{id}/feedback', [TugasSiswaController::class, 'feedback'])
            ->name('tugas.feedback');
        Route::post('/kelompok/{id}/join', [KelompokSiswaController::class, 'join'])->name('kelompok.join');
        Route::patch('/kelompok/{id}/leader', [KelompokSiswaController::class, 'leader'])->name('kelompok.leader');
        Route::prefix('materi')->group(function () {
            Route::resources([
                'modul' => ModulSiswaController::class,
                'simulasi' => SimulasiSiswaController::class,
            ]);
        });
        Route::get('/panduan', [PanduanController::class, 'siswa'])->name('panduan.siswa');
    });
});

Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('guru.dashboard');
        Route::prefix('dashboard')->group(function () {
            Route::resources([
                'user-guru' => UserGuruController::class,
            ]);
        });
        Route::resources([
            'kelompok-guru' => KelompokGuruController::class,
            'tugas-guru' => TugasGuruController::class,
        ]);
        Route::get('/tugas-guru/tugas-answer/{answerId}/create', [TugasGuruController::class, 'create'])->name('tugas-guru.create');
        Route::prefix('materi')->group(function () {
            Route::resources([
                'modul-guru' => ModulGuruController::class,
                'simulasi-guru' => SimulasiGuruController::class,
            ]);
        });
        Route::get('/panduan', [PanduanController::class, 'guru'])->name('panduan.guru');
    });
});

Route::group(['middleware' => 'role:admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');
        Route::prefix('dashboard')->group(function () {
            Route::resources([
                'user-admin' => UserAdminController::class,
            ]);
        });
        Route::post('/tugas-guru', [TugasGuruController::class, 'store'])->name('tugas-admin.nilai');
        Route::get('/dashboard/user-admin/{role}/create', [UserAdminController::class, 'create'])->name('user-admin.create');
        Route::post('/dashboard/user-admin/{role}/create', [UserAdminController::class, 'store'])->name('user-admin.store');
        Route::get('/dashboard/user-admin/{id}/{role}/edit', [UserAdminController::class, 'edit'])->name('user-admin.edit');
        Route::get('/dashboard/user-admin/{id}/{role}/show', [UserAdminController::class, 'show'])->name('user-admin.show');
        Route::resources([
            'kelompok-admin' => KelompokAdminController::class,
            'tugas-admin' => TugasAdminController::class,
        ]);
        Route::get('/tugas-admin/tugas-answer/{answerId}', [TugasAdminController::class, 'hasil'])->name('tugas-admin.hasil');
        Route::prefix('materi')->group(function () {
            Route::resources([
                'modul-admin' => ModulAdminController::class,
                'simulasi-admin' => SimulasiAdminController::class,
            ]);
        });
        Route::get('/panduan', [PanduanController::class, 'admin'])->name('panduan.admin');
    });
});

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan.index');
});

require __DIR__ . '/auth.php';
