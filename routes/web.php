<?php

use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\LoginFBController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
//admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CommentController; 
use App\Http\Controllers\StatisticController;




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

Route::get('/',[IndexController::class, 'home'])->name('homepage');
Route::view('/login','auth/login');

Route::get('/danh-muc/{slug}',[IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}',[IndexController::class, 'watch']);
Route::get('/so-tap',[IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}',[IndexController::class, 'year']);
Route::get('/tag/{tag}',[IndexController::class, 'tag']);
Route::get('/tim-kiem',[IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/locphim',[IndexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating',[IndexController::class, 'add_rating'])->name('add-rating');

//Comment phim
Route::get('/comment',[CommentController::class, 'index'])->name('comment.index'); 
Route::post('/comment/load_comment', [CommentController::class, 'load_comment'])->name('load_comment');
Route::post('/comment/send_comment', [CommentController::class, 'send_comment'])->name('send_comment'); 
Route::post('/comment/confirm_comment/{id}', [CommentController::class, 'confirm_comment'])->name('comment.confirm_comment'); 
Route::post('/comment/delete/{id}', [CommentController::class, 'deleteComment'])->name('delete.comment');

//Thống kê
Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic.index');
Route::get('/get-statistics', [StatisticController::class, 'getStatistics']);
Route::get('/category/click/{id}', [CategoryController::class, 'updateClick'])->name('category.click');
Route::post('/genre/click/{id}', [GenreController::class, 'updateClick'])->name('genre.click');
Route::post('/country/click/{id}', [CountryController::class, 'updateClickCountry'])->name('country.click');
Route::post('/update-click-count', [MovieController::class, 'updateClickCount'])->name('updateClickCount');





Auth::routes([
    'reset'=>false, // Password reset route...
    'verify'=>false, // Email Verification route...
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
//route admin

Route::post('resorting', [CategoryController::class, 'resorting'])->name('resorting');//sắp xếp danh mục
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('movie', MovieController::class);
Route::resource('comment', CommentController::class);


//thêm tập phim
Route::get('add-episode/{id}', [EpisodeController::class,'add_episode'])->name('add-episode');
Route::get('/update-year-phim', [MovieController::class, 'update_year'])->name('update-year-phim');
Route::get('select-movie', [EpisodeController::class,'select_movie'])->name('select-movie');
Route::get('/update-topview-phim', [MovieController::class, 'update_topview'])->name('update-topview-phim');
Route::post('/filter-topview-phim', [MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [MovieController::class, 'filter_default']);
Route::post('/update-season-phim', [MovieController::class, 'update_season'])->name('update-season-phim');
Route::get('/sort-movie', [MovieController::class, 'sort_movie'])->name('sort_movie');
Route::post('/resorting_navbar', [MovieController::class, 'resorting_navbar'])->name('resorting_navbar');//sắp xếp thanh tiêu đề
Route::post('/resorting_movie', [MovieController::class, 'resorting_movie'])->name('resorting_movie');//sắp xếp phim

//thông tin website
Route::resource('info', InfoController::class);


//thay đổi dữ liệu movie bằng ajax
Route::get('/category-choose', [MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/phimhot-choose', [MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/phude-choose', [MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/trangthai-choose', [MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/thuocphim-choose', [MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/resolution-choose', [MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');
Route::post('/watch-video', [MovieController::class,'watch_video'])->name('watch-video');

//login with google
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
Route::post('logout-home', [LoginGoogleController::class, 'logout_Home'])->name('logout-home');
//login facebook
Route::get('auth/facebook', [LoginFBController::class, 'redirectToFacebook'])->name('login-by-facebook');

Route::get('auth/facebook/callback', [LoginFBController::class, 'handleFacebookCallback']);



