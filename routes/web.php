<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMTSController;
use App\Http\Controllers\BeritaController;
use App\Models\Berita;
use App\Models\Carousel;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\SambutanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GambarMenuPPDBController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\StrukturalController;
use App\Http\Controllers\StudentController;
use App\Models\GambarKegiatanPPDB;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GambarJadwalPPDBController;
use App\Http\Controllers\GambarKegiatanPPDBController;
use App\Http\Controllers\Sambutan_mtsController;
use App\Http\Controllers\GuruMTSController;
use App\Http\Controllers\KegiatanMTSController;
use App\Http\Controllers\SosmedMTSController;
use App\Http\Controllers\CarouselMTSController;
use App\Http\Controllers\AdminMAController;
use App\Http\Controllers\Sambutan_maController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KegiatanMAController;
use App\Http\Controllers\SosmedMAController;
use App\Http\Controllers\CarouselMAController;
use App\Http\Controllers\MTSController;
use App\Http\Controllers\MAController;

// ===============================
// PUBLIC ROUTES 
// ===============================
Route::get('/', function () {
    $berita = Berita::latest()->get();
    return view('dashboard.beranda', compact('berita'));
})->name('dashboard.beranda');

Route::get('/dashboard/sambutan', fn() => view('dashboard.sambutan'));
Route::get('/dashboard/tentang-kami', fn() => view('dashboard.tentang-kami'));

Route::get('/dashboard/berita-terkini', [BeritaController::class, 'index'])->name('dashboard.berita-terkini');
Route::get('/Homepage', [HomepageController::class, 'index'])->name('homepage.index');
Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'adminIndex'])->name('students.index');

// Public berita routes
Route::get('/berita/home', function () {
    $berita = Berita::latest()->get();
    return view('berita.home', compact('berita'));
})->name('berita.home');

Route::get('berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/ma', [MAController::class, 'index'])->name('ma.index');
Route::get('/mts', [MTSController::class, 'index'])->name('mts.index');


Route::get('/export-excel', [ExportController::class, 'export'])->name('export.excel');
Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
Route::get('/informasi', function () {
    return view('Informasi.informasi');
})->name('informasi');
// ===============================
// ADMIN AUTH ROUTES (PUBLIC)
// ===============================
Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    });
});

// ===============================
// ADMIN PROTECTED ROUTES 
// ===============================
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');

    // ---------------------------
    // ADMIN PPDB ROUTES
    // ---------------------------
    Route::get('/dashboardPPDB', [GambarKegiatanPPDBController::class, 'index'])->name('dashboardPPDB');
    Route::get('/ubah-background', [GambarMenuPPDBController::class, 'index'])->name('ubah-background');
    Route::post('/ubah-background', [GambarMenuPPDBController::class, 'update'])->name('update-background');
    Route::get('/ubah-jadwal', [GambarJadwalPPDBController::class, 'edit'])->name('jadwal.edit');
    Route::put('/ubah-jadwal', [GambarJadwalPPDBController::class, 'update'])->name('jadwal.update');

    // Students
    Route::get('students', [AdminController::class, 'index'])->name('students.index');
    Route::post('students/verify/{id}', [AdminController::class, 'verify'])->name('students.verify');
    Route::get('students/download/{id}', [AdminController::class, 'downloadPrestasi'])->name('students.download');
    Route::delete('students/{id}', [AdminController::class, 'destroy'])->name('students.destroy');
    Route::get('students/{id}', [AdminController::class, 'show'])->name('students.show');

    // Gambar Kegiatan
    Route::get('/gambar-kegiatan/create', [GambarKegiatanPPDBController::class, 'create'])->name('gambarKegiatan.create');
    Route::post('/gambar-kegiatan', [GambarKegiatanPPDBController::class, 'store'])->name('gambarKegiatan.store');
    Route::get('/gambar-kegiatan/{id}/edit', [GambarKegiatanPPDBController::class, 'edit'])->name('gambarKegiatan.edit');
    Route::put('/gambar-kegiatan/{id}', [GambarKegiatanPPDBController::class, 'update'])->name('gambarKegiatan.update');
    Route::delete('/gambar-kegiatan/{id}', [GambarKegiatanPPDBController::class, 'destroy'])->name('gambarKegiatan.destroy');

    // ---------------------------
    // ADMIN MTS ROUTES
    // ---------------------------
    Route::get('/admin_mts', [AdminMTSController::class, 'index'])->name('admin_mts.index');
    Route::get('/admin_mts', [SosmedMTSController::class, 'index'])->name('MTs.admin_mts.admin');

    // Sambutan
    Route::get('sambutan_mts', [Sambutan_mtsController::class, 'edit'])->name('sambutan_mts.edit');
    Route::put('/sambutan_mts/update', [Sambutan_mtsController::class, 'update'])->name('sambutan_mts.update');

    // Guru
    Route::resource('guru_mts', GuruMTSController::class)->except(['show']);
    Route::get('/guru-mts', [GuruMTSController::class, 'showGuruInMA'])->name('guru_mts');

    // Kegiatan
    Route::resource('kegiatan_mts', KegiatanMTSController::class);

    // Sosmed
    Route::get('/sosmed_mts/edit', [SosmedMTSController::class, 'edit'])->name('sosmed_mts.edit');
    Route::post('/sosmed_mts/update', [SosmedMTSController::class, 'update'])->name('sosmed_mts.update');

    // Carousel
    Route::resource('carousel_mts', CarouselMTSController::class);
    Route::get('/carousel/data', [CarouselMTSController::class, 'showCarousel'])->name('carousel_mts.data');

    // ---------------------------
    // ADMIN MA ROUTES
    // ---------------------------
    Route::get('/admin_ma', [AdminMAController::class, 'index'])->name('MA.admin_ma.admin');
    Route::get('/sambutan_ma', [Sambutan_maController::class, 'edit'])->name('sambutan_ma.edit');
    Route::put('/sambutan_ma/update', [Sambutan_maController::class, 'update'])->name('sambutan_ma.update');

    // Guru
    Route::resource('guru', GuruController::class)->except(['show']);
    Route::get('/guru-ma', [GuruController::class, 'showGuruInMA'])->name('guru');

    // Kegiatan
    Route::resource('kegiatan_ma', KegiatanMAController::class);

    // Sosmed
    Route::get('/sosmed/edit', [SosmedMAController::class, 'edit'])->name('sosmed.edit');
    Route::post('/sosmed/update', [SosmedMAController::class, 'update'])->name('sosmed.update');

    // Carousel
    Route::resource('carousel_ma', CarouselMAController::class);
    Route::get('/carousel/data', [CarouselMAController::class, 'showCarousel'])->name('carousel_ma.data');

    // ---------------------------
    // GLOBAL ADMIN ROUTES
    // ---------------------------
    // CRUD Berita
    Route::resource('berita', BeritaController::class);
    Route::get('/admin/home', [BeritaController::class, 'beritaAdmin'])->name('admin.home');

    // CRUD Struktural
    Route::resource('struktural', StrukturalController::class)->except(['show']);

    // CRUD Carousel
    Route::resource('carousel', CarouselController::class);

    // CRUD Sambutan
    Route::resource('sambutan', SambutanController::class);
});
