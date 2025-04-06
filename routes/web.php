<?php declare(strict_types=1);

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AffiliateController;
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

Route::get('/laravelwelcome', function () {
    return view('welcome');
});

Route::get('/', [AffiliateController::class, 'index'])
    ->name('resource');

Route::get('/about', [AboutController::class, 'index'], ['section' => 'about'] )
    ->name('about');
