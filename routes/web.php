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
Route::get('/dashboard/berita-terkini', fn() => view('dashboard.berita-terkini'));

Route::get('/dashboard/berita-terkini', [BeritaController::class, 'index'])->name('dashboard.berita-terkini');

Route::get('/Homepage', [HomepageController::class, 'index'])->name('homepage.index');
Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'adminIndex'])->name('students.index'); //route formulir ppdb

// Halaman berita publik
Route::get('/berita/home', function () {
    $berita = Berita::latest()->get();
    return view('berita.home', compact('berita'));
})->name('berita.home');

<<<<<<< HEAD

Route::get('berita/{id}', [BeritaController::class, 'show'])->name('berita.show');;

Route::get('/Ma', function () {
    return view('MA.MA');
});

=======
>>>>>>> d5edc109fd6c9b56241f842177d397a2a7cac4f5
Route::get('/ma', [MAController::class, 'index'])->name('ma.index');
Route::get('/mts', [MTSController::class, 'index'])->name('mts.index');

// ===============================
// ADMIN LOGIN
// ===============================
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
});

// ===============================
// ADMIN ROUTES 
// ===============================

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');

            // admin PPDB 
            Route::get('/dashboardPPDB', [GambarKegiatanPPDBController::class, 'index'])->name('dashboardPPDB');
            Route::get('/ubah-background', [GambarMenuPPDBController::class, 'index'])->name('ubah-background');  //ganti background di beranda PPDB section menu
            Route::post('/ubah-background', [GambarMenuPPDBController::class, 'update'])->name('update-background');
            Route::get('/ubah-jadwal', [GambarJadwalPPDBController::class, 'edit'])->name('jadwal.edit'); //gantu gambar jadwal di beranda PPDB
            Route::put('/ubah-jadwal', [GambarJadwalPPDBController::class, 'update'])->name('jadwal.update');
            Route::get('students', [AdminController::class, 'index'])->name('students.index'); //data PPDB
            Route::post('students/verify/{id}', [AdminController::class, 'verify'])->name('students.verify'); //verifikasi PPDB
            Route::get('students/download/{id}', [AdminController::class, 'downloadPrestasi'])->name('students.download'); //download file prestasi PPDB
            Route::delete('students/{id}', [AdminController::class, 'destroy'])->name('students.destroy'); // hapus data PPDB
            Route::get('students/{id}', [AdminController::class, 'show'])->name('students.show'); //lohata detail dataa PPDB
            Route::post('logout', [AdminController::class, 'logout'])->name('logout');
            Route::get('/gambar-kegiatan/create', [GambarKegiatanPPDBController::class, 'create'])->name('gambarKegiatan.create');
            Route::post('/gambar-kegiatan', [GambarKegiatanPPDBController::class, 'store'])->name('gambarKegiatan.store');
            Route::get('/gambar-kegiatan/{id}/edit', [GambarKegiatanPPDBController::class, 'edit'])->name('gambarKegiatan.edit');
            Route::put('/gambar-kegiatan/{id}', [GambarKegiatanPPDBController::class, 'update'])->name('gambarKegiatan.update');
            Route::delete('/gambar-kegiatan/{id}', [GambarKegiatanPPDBController::class, 'destroy'])->name('gambarKegiatan.destroy');      
            
            // admin MTS
            Route::get('/admin_mts', [AdminMTSController::class, 'index'])->name('admin_mts.index');
            Route::get('/admin_mts', [SosmedMTSController::class, 'index'])->name('MTs.admin_mts.admin');

            Route::get('sambutan_mts', [Sambutan_mtsController::class, 'edit'])->name('sambutan_mts.edit');
            Route::put('/sambutan_mts/update', [Sambutan_mtsController::class, 'update'])->name('sambutan_mts.update');

            Route::get('/guru_mts', [GuruMTSController::class, 'index'])->name('guru_mts.index');
            Route::get('/guru_mts/create', [GuruMTSController::class, 'create'])->name('guru_mts.create');
            Route::post('/guru_mts/store', [GuruMTSController::class, 'store'])->name('guru_mts.store');
            Route::get('/guru-mts', [GuruMTSController::class, 'showGuruInMA'])->name( 'guru_mts');
            Route::get('/guru_mts/{id}/edit', [GuruMTSController::class, 'edit'])->name( 'guru_mts.edit');
            Route::put('/guru_mts/{id}', [GuruMTSController::class, 'update'])->name('guru_mts.update');
            Route::delete('/guru_mts/{id}', [GuruMTSController::class, 'destroy'])->name('guru_mts.destroy');

            Route::get('/kegiatan-mts', [KegiatanMTSController::class, 'index'])->name('kegiatan_mts.index');
            Route::get('/kegiatan-mts/create', [KegiatanMTSController::class, 'create'])->name('kegiatan_mts.create');
            Route::post('/kegiatan-mts/store', [KegiatanMTSController::class, 'store'])->name('kegiatan_mts.store');
            Route::get('/kegiatan-mts/{kegiatan_mts}/edit', [KegiatanMTSController::class, 'edit'])->name('kegiatan_mts.edit');
            Route::put('/kegiatan-mts/{kegiatan_mts}', [KegiatanMTSController::class, 'update'])->name('kegiatan_mts.update');
            Route::delete('/kegiatan-mts/{kegiatan_mts}', [KegiatanMTSController::class, 'destroy'])->name('kegiatan_mts.destroy');

            Route::get('/sosmed_mts/edit', [SosmedMTSController::class, 'edit'])->name('sosmed_mts.edit');
            Route::post('/sosmed_mts/update', [SosmedMTSController::class, 'update'])->name('sosmed_mts.update');


            Route::get('/carousel_mts', [CarouselMTSController::class, 'index'])->name('carousel_mts.index');
            Route::get('/carousel/data', [CarouselMTSController::class, 'showCarousel'])->name('carousel_mts.data');
            Route::get('/carousel_mts/create', [CarouselMTSController::class, 'create'])->name('carousel_mts.create');
            Route::post('/carousel_mts/store', [CarouselMTSController::class, 'store'])->name('carousel_mts.store'); 
            Route::get('/carousel_mts/{id}/edit', [CarouselMTSController::class, 'edit'])->name('carousel_mts.edit');
            Route::put('/carousel_mts/{id}', [CarouselMTSController::class, 'update'])->name('carousel_mts.update');
            Route::delete('/carousel_mts/{id}', [CarouselMTSController::class, 'destroy'])->name('carousel_mts.destroy');

            // ROUTE admin MA
            Route::get('/admin_ma', [AdminMAController::class, 'index'])->name('MA.admin_ma.admin');
            Route::get('/sambutan/edit_sambutan', [Sambutan_maController::class, 'edit'])->name('sambutan.edit');
            Route::put('/update_sambutan', [Sambutan_maController::class, 'update'])->name('sambutan.update');

            Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
            Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
            Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
            Route::get('/guru-ma', [GuruController::class, 'showGuruInMA'])->name( 'guru');
            Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name( 'guru.edit');
            Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
            Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

            Route::get('/kegiatan-ma', [KegiatanMAController::class, 'index'])->name('kegiatan_ma.index');
            Route::get('/kegiatan-ma/create', [KegiatanMAController::class, 'create'])->name('kegiatan_ma.create');
            Route::post('/kegiatan-ma/store', [KegiatanMAController::class, 'store'])->name('kegiatan_ma.store');
            Route::get('/kegiatan-ma/{kegiatan_ma}/edit', [KegiatanMAController::class, 'edit'])->name('kegiatan_ma.edit');
            Route::put('/kegiatan-ma/{kegiatan_ma}', [KegiatanMAController::class, 'update'])->name('kegiatan_ma.update');
            Route::delete('/kegiatan-ma/{kegiatan_ma}', [KegiatanMAController::class, 'destroy'])->name('kegiatan_ma.destroy');

            Route::get('/sosmed/edit', [SosmedMAController::class, 'edit'])->name('sosmed.edit');
            Route::post('/sosmed/update', [SosmedMAController::class, 'update'])->name('sosmed.update');
            Route::get('/admin', [SosmedMAController::class, 'index'])->name('MA.admin_ma.admin');
            
            // NTAR DIRRUBAH
            Route::get('/carousel_ma', [CarouselMAController::class, 'index'])->name('carousel_ma.index');
            Route::get('/carousel/data', [CarouselMAController::class, 'showCarousel'])->name('carousel_ma.data');
            Route::get('/carousel_ma/create', [CarouselMAController::class, 'create'])->name('carousel_ma.create');
            Route::post('/carousel_ma/store', [CarouselMAController::class, 'store'])->name('carousel_ma.store'); 
            Route::get('/carousel_ma/{id}/edit', [CarouselMAController::class, 'edit'])->name('carousel_ma.edit');
            Route::put('/carousel_ma/{id}', [CarouselMAController::class, 'update'])->name('carousel_ma.update');
            Route::delete('/carousel_ma/{id}', [CarouselMAController::class, 'destroy'])->name('carousel_ma.destroy');
                        
    // CRUD Berita
    Route::resource('/berita', BeritaController::class)
        ->parameters(['berita' => 'berita']);

    Route::get('/admin/home', [BeritaController::class, 'beritaAdmin'])->name('admin.home');

    Route::prefix('admin')->group(function () {
        Route::get('frame/berita-terkini', [BeritaController::class, 'index'])->name('berita-terkini');
    });
    Route::get('/berita-terkini', function () {
        return view('berita-terkini');
    });

    // CRUD Struktural
    Route::resource('/struktural', StrukturalController::class)->except(['show']);
    Route::get('admin/struktural/{struktural}/edit', [StrukturalController::class, 'edit'])->name('admin.struktural.edit');


    // CRUD Carousel
    Route::resource('carousel', CarouselController::class);

    // CRUD Sambutan
    Route::resource('sambutan', SambutanController::class);
});



Route::get('/export-excel', [ExportController::class, 'export'])->name('export.excel'); //route export excel PPDB 











