<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;

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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {

    $products = Product::orderBy('updated_at', 'desc')->get();
    return view('dashboard', compact('products'));

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'products' => ProductController::class,
        'categories' => CategoryController::class,
    ]);

    Route::prefix('products')->name('products.')->group(function () {
        Route::put('image-update/{product}', [ProductController::class, 'updateImage'])->name('updateImage');
        Route::put('restore-product/{product}', [ProductController::class, 'restored'])->name('restored');
        Route::delete('delete-product-permanently/{product}', [ProductController::class, 'forceDeleted'])->name('forceDeleted');
    });
});
