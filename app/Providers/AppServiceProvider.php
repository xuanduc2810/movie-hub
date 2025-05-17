<?php

namespace App\Providers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Info;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Statistic;
use Illuminate\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    // Các dữ liệu chung cho các danh mục từ indexcontroller 
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('count_views','DESC')->take('10')->get();
        $phimhot_trailer = Movie::where('resolution', 5) -> where('status', 1) -> orderBy('count_views', 'DESC') -> take(10) -> get();
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->first();
        $genre = Genre::orderBy('id','DESC')->first();
        $country = Country::orderBy('id','DESC')->first();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
     //Đếm số lượng total admin
        $category_total = Category::all()->count();
        $genre_total = Genre::all()->count();
        $country_total = Country::all()->count();
        $movie_total = Movie::all()->count();
        $comment_total = Comment::all()->count();
        $statistic_total = Statistic::all()->count();

        // Lấy số người online từ Cache
    $online_visitors = Cache::get('online_visitors', 0);
        
        // Dữ liệu chung cho mục info ở các danh mục
        $info = Info::find(1);
        
        View::share([
            
            'movie_total'=>$movie_total,
            'category_total'=>$category_total,
            'genre_total'=>$genre_total,
            'country_total'=>$country_total,
            'comment_total'=>$comment_total,
            'statistic_total'=>$statistic_total,
            'online_visitors' => $online_visitors, // Thêm biến này vào View
           'info'=>$info,
           'phimhot'=>$info,
           'phimhot_sidebar'=>$phimhot_sidebar,
            'phimhot_trailer'=>$phimhot_trailer,
            'category'=>$category,
            'genre'=>$genre,
            'country'=>$country,
            'categories'=> $categories,
            'genres'=> $genres,
            'countries'=> $countries,
        ]);
    }
}
