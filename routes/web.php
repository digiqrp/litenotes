<?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\NoteController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\TrashedNoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Note Routes
    Route::resource('notes', NoteController::class);
});

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function () {
    Route::get('/', [TrashedNoteController::class, 'index'])->name('index');
    Route::get('/{note}', [TrashedNoteController::class, 'show'])->withTrashed()->name('show');
    Route::delete('/{note}', [TrashedNoteController::class, 'destroy'])->withTrashed()->name('destroy');
    Route::put('/{note}', [TrashedNoteController::class, 'update'])->withTrashed()->name('update');
});

require __DIR__.'/auth.php';


