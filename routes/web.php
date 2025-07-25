    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\PetaniController;
    use App\Http\Controllers\Admin\LegalitasController;
    use App\Http\Controllers\Admin\SuratPernyataanController;
    use App\Http\Controllers\Admin\STDBInfoController;
    use App\Http\Controllers\Admin\LTHController;
    use App\Http\Controllers\Landing\DashboardLandingController;
    use App\Http\Controllers\Landing\PetaniLandingController;
    use App\Http\Controllers\Landing\LegalitasLandingController;
    use App\Http\Controllers\Landing\SuratPernyataanLandingController;
    use App\Http\Controllers\Landing\LthLandingController;
    use App\Http\Controllers\Landing\StdbInfoLandingController;


    // ===============================
    // 🔐 AUTH ROUTES
    // ===============================
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


    // ===============================
    // 🌐 ROOT `/` REDIRECT SESUAI ROLE
    // ===============================
    Route::get('/', function () {
        if (auth()->check()) {
            return match (auth()->user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'viewer' => redirect()->route('viewer.dashboard'),
                default => redirect()->route('login'),
            };
        }
        return redirect()->route('login');
    });


    // ===============================
    // 🛠️ ADMIN ROUTES (CRUD)
    // ===============================
    Route::prefix('admin')
        ->middleware(['auth', 'role:admin'])
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::prefix('petani')->name('petani.')->group(function () {
                Route::get('/', [PetaniController::class, 'index'])->name('index');
                Route::get('/create', [PetaniController::class, 'create'])->name('create');
                Route::post('/', [PetaniController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [PetaniController::class, 'edit'])->name('edit');
                Route::put('/{id}', [PetaniController::class, 'update'])->name('update');
                Route::delete('/{id}', [PetaniController::class, 'destroy'])->name('destroy');
                Route::post('/import', [PetaniController::class, 'import'])->name('import');
                Route::get('/{id}/detail', [PetaniController::class, 'show'])->name('detail'); // 👈 ini route detail
                Route::get('/map', [PetaniController::class, 'showAllKoordinat'])->name('map');


            });

            Route::prefix('legalitas')->name('legalitas.')->group(function () {
                Route::get('/', [LegalitasController::class, 'index'])->name('index');
                Route::get('/create', [LegalitasController::class, 'create'])->name('create');
                Route::post('/', [LegalitasController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [LegalitasController::class, 'edit'])->name('edit');
                Route::put('/{id}', [LegalitasController::class, 'update'])->name('update');
                Route::delete('/{id}', [LegalitasController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('surat')->name('surat.')->group(function () {
                Route::get('/', [SuratPernyataanController::class, 'index'])->name('index');
                Route::get('/create', [SuratPernyataanController::class, 'create'])->name('create');
                Route::post('/', [SuratPernyataanController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [SuratPernyataanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [SuratPernyataanController::class, 'update'])->name('update');
                Route::delete('/{id}', [SuratPernyataanController::class, 'destroy'])->name('destroy');
            });


            Route::prefix('stdb_informasi')->name('stdb_informasi.')->group(function () {
                Route::get('/', [STDBInfoController::class, 'index'])->name('index');
                Route::get('/create', [STDBInfoController::class, 'create'])->name('create');
                Route::post('/', [STDBInfoController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [STDBInfoController::class, 'edit'])->name('edit');
                Route::put('/{id}', [STDBInfoController::class, 'update'])->name('update');
                Route::delete('/{id}', [STDBInfoController::class, 'destroy'])->name('destroy');
            });

            Route::prefix('lth')->name('lth.')->group(function () {
                Route::get('/', [LTHController::class, 'index'])->name('index');
                Route::get('/create', [LTHController::class, 'create'])->name('create');
                Route::post('/', [LTHController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [LTHController::class, 'edit'])->name('edit');
                Route::put('/{id}', [LTHController::class, 'update'])->name('update');
                Route::delete('/{id}', [LTHController::class, 'destroy'])->name('destroy');
            });

        });

    Route::prefix('viewer')
    ->middleware(['auth', 'role:viewer'])
    ->name('viewer.')
    ->group(function () {
        Route::get('/dashboard', [DashboardLandingController::class, 'index'])->name('dashboard');

        Route::prefix('petani')->name('petani.')->group(function () {
            Route::get('/', [PetaniLandingController::class, 'index'])->name('index');
            Route::get('/{id}/detail', [PetaniLandingController::class, 'show'])->name('detail');
            Route::get('/map', [PetaniLandingController::class, 'showAllKoordinat'])->name('map');
        });

        Route::get('/legalitas', [LegalitasLandingController::class, 'index'])->name('legalitas.index');

        Route::get('/lth', [LTHLandingController::class, 'index'])->name('lth.index');

        Route::get('/surat', [SuratPernyataanLandingController::class, 'index'])->name('surat.index');

        Route::get('/stdb', [StdbInfoLandingController::class, 'index'])->name('stdb.index');

    });
