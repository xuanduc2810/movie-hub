<?php

namespace App\Http\Controllers;
use App\Models\Statistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatistics(Request $request)
    {
        $timeType = $request->query('timeType');
        $selectedTime = $request->query('selectedTime');
    
        if (!$timeType || !$selectedTime) {
            return response()->json(['error' => 'Thiếu tham số'], 400);
        }
    
        $date = Carbon::parse($selectedTime);
    
        if ($timeType === 'week') {
            $startDate = $date->startOfWeek()->startOfDay()->toDateTimeString();
            $endDate = $date->endOfWeek()->endOfDay()->toDateTimeString();
        } elseif ($timeType === 'month') {
            $startDate = $date->startOfMonth()->startOfDay()->toDateTimeString();
            $endDate = $date->endOfMonth()->endOfDay()->toDateTimeString();
        } elseif ($timeType === 'year') {
            $startDate = $date->startOfYear()->startOfDay()->toDateTimeString();
            $endDate = $date->endOfYear()->endOfDay()->toDateTimeString();
        } else {
            return response()->json(['error' => 'Loại thời gian không hợp lệ'], 400);
        }
    
        return response()->json([
            'category' => Category::count(), // Đếm số danh mục thực tế
            'genre' => Genre::count(),       // Đếm số thể loại thực tế
            'country' => Country::count(),   // Đếm số quốc gia thực tế
            'series' => Movie::whereBetween(DB::raw("STR_TO_DATE(ngaytao, '%Y-%m-%d %H:%i:%s')"), [$startDate, $endDate])
                ->where('category_id', 4)
                ->count(),
            'single' => Movie::whereBetween(DB::raw("STR_TO_DATE(ngaytao, '%Y-%m-%d %H:%i:%s')"), [$startDate, $endDate])
                ->where('category_id', 2)
                ->count(),
            'cinema' => Movie::whereBetween(DB::raw("STR_TO_DATE(ngaytao, '%Y-%m-%d %H:%i:%s')"), [$startDate, $endDate])
                ->where('category_id', 5)
                ->count(),
            'new' => Movie::whereBetween(DB::raw("STR_TO_DATE(ngaytao, '%Y-%m-%d %H:%i:%s')"), [$startDate, $endDate])
                ->count(),
        ]);
    }
    public function index()
    {
        
        $statistics = Statistic::all();
        // lấy toàn bộ danh mục
        // $topCategories = Category::orderByDesc('click_count')->take(5)->get();
        // $topGenres = Genre::orderBy('click_count', 'desc')->take(5)->get();
        // $topCountries = Country::orderBy('click_count', 'desc')->take(5)->get();
        //   lấy danh mục yêu thích/không yêu thích
        $topCategory = Category::orderBy('click_count', 'desc')->first();
        $lowCategory = Category::orderBy('click_count', 'asc')->first();
        // lấy thể loại yêu thích/không yêu thích
        $topGenre = Genre::orderBy('click_count', 'desc')->first();
        $lowGenre = Genre::orderBy('click_count', 'asc')->first();
        // lấy quốc gia yêu thích/không yêu thích
        $topCountry = Country::orderBy('click_count', 'desc')->first();
        $lowCountry = Country::orderBy('click_count', 'asc')->first();
        //  lấy phim yêu thích/không yêu thích
//         $topMovie = DB::table('movies as m')
//     ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
//     ->select('m.id', 'm.title', 'm.click_count', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
//     ->groupBy('m.id', 'm.title', 'm.click_count')
//     ->orderByDesc('m.click_count')
//     ->orderByDesc('avg_rating')
//     ->first(); // ⚡ Lấy 1 phần tử duy nhất

// $lowMovie = DB::table('movies as m')
//     ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
//     ->select('m.id', 'm.title', 'm.click_count', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
//     ->groupBy('m.id', 'm.title', 'm.click_count')
//     ->orderBy('m.click_count')
//     ->orderBy('avg_rating')
//     ->first();

// Phim bộ yêu thích nhất
$topSeries = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 4) // ID danh mục phim bộ
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderByDesc('avg_rating')
    ->orderByDesc('m.count_views')
    
    ->first();

// Phim lẻ yêu thích nhất
$topSingle = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 2) // ID danh mục phim lẻ
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderByDesc('avg_rating')
    ->orderByDesc('m.count_views')
    
    ->first();

// Phim chiếu rạp yêu thích nhất
$topCinema = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 5) // ID danh mục phim chiếu rạp
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderByDesc('avg_rating')
    ->orderByDesc('m.count_views')
    
    ->first();

// Phim mới yêu thích nhất
$topNew = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 1) // Phim mới trong vòng 1 năm
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderByDesc('avg_rating')
    ->orderByDesc('m.count_views')
    
    ->first();

// Phim bộ có lượt click ít nhất
$lowSeries = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 4)
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderBy('avg_rating')
    ->orderBy('m.count_views')
    
    ->first();

// Phim lẻ có lượt click ít nhất
$lowSingle = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 2)
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderBy('avg_rating')
    ->orderBy('m.count_views')
    
    ->first();

$lowCinema = DB::table('movies as m')
    ->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
    ->where('m.category_id', 5)
    ->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
    ->groupBy('m.id', 'm.title', 'm.count_views')
    ->orderBy('avg_rating')
    ->orderBy('m.count_views')
    
    ->first();

$lowNew = DB::table('movies as m')
->leftJoin('rating as r', 'm.id', '=', 'r.movie_id')
->where('m.category_id', 1) // Phim mới trong vòng 1 năm
->select('m.id', 'm.title', 'm.count_views', DB::raw('COALESCE(AVG(r.rating), 0) AS avg_rating'))
->groupBy('m.id', 'm.title', 'm.count_views')
->orderBy('avg_rating')
->orderBy('m.count_views')

->first();


// // Lấy ngày hiện tại
// $today = Carbon::today();

// // Lấy dữ liệu theo tuần
// $weekStart = $today->copy()->startOfWeek();
// $weekEnd = $today->copy()->endOfWeek();

// $weekCategory = Category::whereBetween('created_at', [$weekStart, $weekEnd])->count();
// $weekGenre = Genre::whereBetween('created_at', [$weekStart, $weekEnd])->count();
// $weekCountry = Country::whereBetween('created_at', [$weekStart, $weekEnd])->count();
// $weekSeries = Movie::whereBetween('ngaytao', [$weekStart, $weekEnd])->where('category_id', 2)->count();
// $weekSingle = Movie::whereBetween('ngaytao', [$weekStart, $weekEnd])->where('category_id', 4)->count();
// $weekCinema = Movie::whereBetween('ngaytao', [$weekStart, $weekEnd])->where('category_id', 5)->count();
// $weekNew = Movie::whereBetween('ngaytao', [$weekStart, $weekEnd])->count();

// // Lấy dữ liệu theo tháng
// $monthStart = $today->copy()->startOfMonth();
// $monthEnd = $today->copy()->endOfMonth();

// $monthCategory = Category::whereBetween('created_at', [$monthStart, $monthEnd])->count();
// $monthGenre = Genre::whereBetween('created_at', [$monthStart, $monthEnd])->count();
// $monthCountry = Country::whereBetween('created_at', [$monthStart, $monthEnd])->count();
// $monthSeries = Movie::whereBetween('ngaytao', [$monthStart, $monthEnd])->where('category_id', 2)->count();
// $monthSingle = Movie::whereBetween('ngaytao', [$monthStart, $monthEnd])->where('category_id', 4)->count();
// $monthCinema = Movie::whereBetween('ngaytao', [$monthStart, $monthEnd])->where('category_id', 5)->count();
// $monthNew = Movie::whereBetween('ngaytao', [$monthStart, $monthEnd])->count();

// // Lấy dữ liệu theo năm
// $yearStart = $today->copy()->startOfYear();
// $yearEnd = $today->copy()->endOfYear();

// $yearCategory = Category::whereBetween('created_at', [$yearStart, $yearEnd])->count();
// $yearGenre = Genre::whereBetween('created_at', [$yearStart, $yearEnd])->count();
// $yearCountry = Country::whereBetween('created_at', [$yearStart, $yearEnd])->count();
// $yearSeries = Movie::whereBetween('ngaytao', [$yearStart, $yearEnd])->where('category_id', 2)->count();
// $yearSingle = Movie::whereBetween('ngaytao', [$yearStart, $yearEnd])->where('category_id', 4)->count();
// $yearCinema = Movie::whereBetween('ngaytao', [$yearStart, $yearEnd])->where('category_id', 5)->count();
// $yearNew = Movie::whereBetween('ngaytao', [$yearStart, $yearEnd])->count();

        return view('admincp.statistic.index', compact('statistics', 'topCategory', 'lowCategory', 'topGenre', 'lowGenre', 'topCountry', 'lowCountry','topSeries', 'lowSeries', 'topSingle', 'lowSingle', 'topCinema', 'topNew','lowCinema','lowNew'));
        
    }

   


   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
