<?php

use App\Http\Controllers\AcaraInformasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AdminInformasiGambarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInformasiController;
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
use App\Http\Controllers\KegiatanInformasiController;
use App\Http\Controllers\KegiatanWebPPDBController;
use App\Http\Controllers\MTSController;
use App\Http\Controllers\MAController;
use App\Http\Controllers\ProfileController;
use App\Models\AcaraInformasi;
use App\Models\KegiatanInformasi;
use App\Models\Statsprofile;
use App\Http\Controllers\ProfilevmController;
use App\Http\Controllers\StatsProfileController;
use App\Models\KegiatanWebPPDB;


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
Route::get('/informasi', [AdminInformasiController::class, 'index'])->name('informasi.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('Profile.index');


Route::get('/export-excel', [ExportController::class, 'export'])->name('export.excel');
// Route::get('/profile', function () {
//     return view('profile.profile');
// })->name('profile');

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
    Route::get('/admin_informasi', function () {
        return view('Informasi.admin.admininfo');
    })->name('informasi');
    Route::get('/admin_profile', function () {
        return view('profile.admin.Adminprofile');
    })->name('profile');

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
    Route::resource('kegiatan_mts', KegiatanMTSController::class)->parameters([
        'kegiatan_mts' => 'kegiatan_mts'
    ]);

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

    // admin informasi 

    Route::get('/gambar_informasi', [AdminInformasiGambarController::class, 'index'])->name('informasi.index');
    Route::get('/gambar_informasi/create', [AdminInformasiGambarController::class, 'create'])->name('informasi.create');
    Route::post('/gambar_informasi', [AdminInformasiGambarController::class, 'store'])->name('informasi.store');
    Route::get('/gambar_informasi/{id}/edit', [AdminInformasiGambarController::class, 'edit'])->name('informasi.edit');
    Route::post('/gambar_informasi/{id}', [AdminInformasiGambarController::class, 'update'])->name('informasi.update');
    Route::delete('/gambar_informasi/{id}', [AdminInformasiGambarController::class, 'destroy'])->name('informasi.destroy');

    Route::get('kegiatan_informasi', [KegiatanInformasiController::class, 'index'])->name('kegiatan_informasi.index');
    Route::get('kegiatan_informasi/create', [KegiatanInformasiController::class, 'create'])->name('kegiatan_informasi.create');
    Route::post('kegiatan_informasi', [KegiatanInformasiController::class, 'store'])->name('kegiatan_informasi.store');
    Route::get('kegiatan_informasi/{kegiatan_informasi}/edit', [KegiatanInformasiController::class, 'edit'])->name('kegiatan_informasi.edit');
    Route::put('kegiatan_informasi/{kegiatan_informasi}', [KegiatanInformasiController::class, 'update'])->name('kegiatan_informasi.update');
    Route::delete('kegiatan_informasi/{kegiatan_informasi}', [KegiatanInformasiController::class, 'destroy'])->name('kegiatan_informasi.destroy');
   
    Route::get('acara_informasi', [AcaraInformasiController::class, 'index'])->name('acara_informasi.index');
    Route::get('acara_informasi/create', [AcaraInformasiController::class, 'create'])->name('acara_informasi.create');
    Route::post('acara_informasi', [AcaraInformasiController::class, 'store'])->name('acara_informasi.store');
    Route::get('acara_informasi/{acara_informasi}/edit', [AcaraInformasiController::class, 'edit'])->name('acara_informasi.edit');
    Route::put('acara_informasi/{acara_informasi}', [AcaraInformasiController::class, 'update'])->name('acara_informasi.update');
    Route::delete('acara_informasi/{acara_informasi}', [AcaraInformasiController::class, 'destroy'])->name('acara_informasi.destroy');

    //admin Profile
    

    Route::get('profile_visimisi', [ProfilevmController::class, 'index'])->name('profile_visimisi.index');
    Route::get('profile_visimisi/edit', [ProfilevmController::class, 'edit'])->name('profile_visimisi.edit');
    Route::put('profile_visimisi/update', [ProfilevmController::class, 'update'])->name('profile_visimisi.update');


    
    Route::get('statistik_profile/edit', [StatsProfileController::class, 'edit'])->name('statistik_profile.edit');
    Route::put('statistik_profile/update', [StatsProfileController::class, 'update'])->name('statistik_profile.update');

    Route::get('/kegiatan_ppdb', [KegiatanWebPPDBController::class, 'index'])->name('kegiatan_ppdb.index');
    Route::get('/kegiatan_ppdb/create', [KegiatanWebPPDBController::class, 'create'])->name('kegiatan_ppdb.create');
    Route::post('/kegiatan_ppdb', [KegiatanWebPPDBController::class, 'store'])->name('kegiatan_ppdb.store');
    Route::get('/kegiatan_ppdb/{id}/edit', [KegiatanWebPPDBController::class, 'edit'])->name('kegiatan_ppdb.edit');
    Route::put('/kegiatan_ppdb/{id}', [KegiatanWebPPDBController::class, 'update'])->name('kegiatan_ppdb.update');
    Route::delete('/kegiatan_ppdb/{id}', [KegiatanWebPPDBController::class, 'destroy'])->name('kegiatan_ppdb.destroy');
});
