<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Contracts\Pipeline\Hub;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
#For UserPage
Route::get('/', [HomeController::class, 'index']);
Route::get('/redrice' , [HomeController::class, 'redrice'])->middleware('auth');
Route::get('/user-about',[HomeController::class, 'user_about']);
Route::get('/user-shop', [HomeController::class, 'user_shop']);
Route::get('/user-blog', [HomeController::class, 'user_blog']);
Route::get('/user-contact', [HomeController::class, 'user_contact']);
Route::post('/user-card-add/{id}', [HomeController::class, 'card_add']);
Route::get('/user-card-view', [HomeController::class, 'card_view']);
Route::get('/user-card-remove/{id}', [HomeController::class, 'card_remove']);
Route::get('/user-order-view', [HomeController::class, 'user_order_view']);
Route::post('/user-order', [HomeController::class, 'user_order']);
Route::get('/user-order-end', [HomeController::class, 'user_order_end']);
Route::get('/user-order-lose', [HomeController::class, 'user_order_lose']);
Route::post('/user-contact-up', [HomeController::class, 'user_contact_up'])->middleware('auth');
Route::get('/user-home-blog/{id}', [HomeController::class, 'user_home_blog'])->middleware('auth');
#For User Library
Route::get('/library_page', [HomeController::class, 'library_page']);
Route::get('/library_detail/{id}', [HomeController::class, 'library_detail'])->name('library.name');
Route::get('/music_and_arts', [HomeController::class, 'music_and_arts']);
Route::get('/biography', [HomeController::class, 'biography']);
Route::get('/cooking', [HomeController::class, 'cooking']);
#For User Library Review
Route::post('/library_comment', [HomeController::class, 'library_comment'])->middleware('auth');
Route::get('/fetch_comment', [HomeController::class, 'fetch_comment']);
// For User Search
Route::get('/search', [HomeController::class, 'search']);
Route::get('/biosearch', [HomeController::class, 'biosearch']);
Route::get('/cookingsearch', [HomeController::class, 'cookingsearch']);


#For Admin Category Page
Route::get('/category', [AdminController::class, 'category']);
Route::post('/category_add', [AdminController::class, 'add_category']);
Route::get('/fetchcategory', [AdminController::class, 'fetchcategory'])->name('category.fetch');
Route::delete('/category_delete/{id}', [AdminController::class, 'category_delete']);
#For Admin Product Page
Route::get('/product', [AdminController::class, 'product']);
Route::post('/product_add', [AdminController::class, 'product_add']);
Route::get('/fetchproducts', [AdminController::class, 'fetchproducts'])->name('product.fetch');
Route::get('/edit_products/{id}', [AdminController::class, 'edit_products'] );
Route::post('update_products/{id}', [AdminController::class, 'update_products']);
Route::delete('delete_products/{id}', [AdminController::class, 'delete_products']);
// Route::get('/search_blog' , [AdminController::class, 'search_blog']);
#For Admin Blog Page
Route::get('/blog', [AdminController::class, 'blog']);
Route::post('/add-blogs', [AdminController::class, 'add_blogs']);
Route::get('/fetchBlog', [AdminController::class, 'fetchBlog']);
Route::get('/edit_blog/{id}', [AdminController::class, 'edit_blog']);
Route::post('/update_blog/{id}', [AdminController::class, 'update_blog']);
Route::delete('/delete_blog/{id}', [AdminController::class, 'delete_blog']);

#For Admin Library Page
Route::get('/library', [AdminController::class, 'library']);
Route::get('/library_add', [AdminController::class, 'library_add']);
Route::post('/ad_library', [AdminController::class, 'ad_library']);
Route::get('/ed_library/{id}', [AdminController::class, 'ed_library']);
Route::post('/library_ed/{id}',[AdminController::class, 'library_ed']);
Route::get('/library_de/{id}', [AdminController::class, 'library_de']);


Route::get('/order-view', [AdminController::class, 'order_view']);
Route::get('/order-delivered/{id}', [AdminController::class, 'order_delivered']);
Route::get('/order-paid/{id}', [AdminController::class, 'order_paid']);
Route::get('/email-send-view/{id}', [AdminController::class, 'email_send_view']);
Route::post('/send-user-email/{id}', [AdminController::class, 'send_user_email']);
Route::get('/view-contact', [AdminController::class, 'view_contact']);
Route::get('/delete-contact/{id}', [AdminController::class, 'delete_contact']);
Route::get('/contact-email-view/{id}',[AdminController::class, 'contact_email_view']);
Route::post('/contact-email-send/{id}', [AdminController::class, 'contact_email_send']);

Route::get('/search-order', [AdminController::class, 'search_order']);
Route::get('/print-pdf/{id}', [AdminController::class, 'print_pdf']);
Route::get('/print-word/{id}', [AdminController::class, 'print_word']);
