<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokenController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/token', [TokenController::class, 'index'])->name('tokens');
Route::get('/token/delete/{token}', [TokenController::class, 'delete'])->name('token.delete');
Route::post('token/create', [TokenController::class, 'create'])->name('token.create');







Route::get('/setup', function () {

    if (Auth::user()->role != "super_admin") {
        return abort(401);
    }
    // $tokens = DB::table('personal_access_tokens')->get();
    // if ($tokens) {
    //     return $tokens;
    // }
    $user = Auth::user();
    $frontEndToken = $user->createToken('front-end-token');
    return [
        'front-end-token' => $frontEndToken->plainTextToken,
        'test' => 'test'
    ];




})->middleware('auth');



require __DIR__ . '/auth.php';