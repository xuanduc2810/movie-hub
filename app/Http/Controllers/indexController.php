<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\Info;
use DB;
class indexController extends Controller
{    
    public function locphim(){  
    //lấy các giá trị url thông qua get  
    $sapxep = $_GET['order'];  
    $genre_get = $_GET['genre'];  
    $country_get = $_GET['country'];  
    $year_get = $_GET['year'];  
    $order = $_GET['order']; // Thêm dòng này 
     
 // Lấy thông tin cho $info  
    // $info = Info::first(); // Hoặc một truy vấn nào đó phù hợp với bạn  

    // // Kiểm tra xem $info có tồn tại không  
    // if ($info) {  
    //     $meta_title = $info->title; // Gán tiêu đề cho meta_title  
    //     $meta_description = $info->description; // Gán mô tả cho meta_description  
    //     $meta_image = ''; // Khởi tạo $meta_image với giá trị rỗng  
    // } else {  
    //     $meta_title = 'Tiêu đề mặc định'; // Giá trị fallback cho meta_title  
    //     $meta_description = 'Mô tả mặc định'; // Giá trị fallback cho meta_description  
    //     $meta_image = ''; // Khởi tạo $meta_image với giá trị rỗng  
    // }  
    $info = Info::find(1);
    // Cập nhật thẻ meta(mô tả) cho trang
    $meta_title = $info->title;
    $meta_description = $info->description;
    $meta_image = '';
//Nếu người dùng k chọn thì quay về
    if($sapxep=='' && $genre_get=='' && $country_get=='' && $year_get==''){  
        return redirect()->back();  
    } else {  
            
        // Lọc dữ liệu  
        $movie = Movie::withCount('episode');  

        if($genre_get){  
            $movie = $movie->where('genre_id','=',$genre_get);   
        } elseif($country_get){  
            $movie = $movie->where('country_id','=',$country_get);  
        } elseif($year_get){  
            $movie = $movie->where('year','=',$year_get);  
        } elseif($order){ // Sửa đổi phần này  
            $movie = $movie->orderBy('title','ASC');  
        }  

        $movie = $movie->orderBy('ngaycapnhat','DESC')->paginate(10);  
        return view('pages.locphim', compact('movie','meta_title','meta_description','meta_image'));  
    }  
}
    public function timkiem(){

    if(isset($_GET['search'])){
        // Lấy thông tin cho $info  
        $info = Info::find(1);
        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $info->title;
        $meta_description = $info->description;
        $meta_image = '';
    // $info = Info::first(); // Hoặc một truy vấn nào đó phù hợp với bạn  

    // // Kiểm tra xem $info có tồn tại không  
    // if ($info) {  
    //     $meta_title = $info->title; // Gán tiêu đề cho meta_title  
    //     $meta_description = $info->description; // Gán mô tả cho meta_description  
    //     $meta_image = ''; // Khởi tạo $meta_image với giá trị rỗng  
    // } else {  
    //     $meta_title = 'Tiêu đề mặc định'; // Giá trị fallback cho meta_title  
    //     $meta_description = 'Mô tả mặc định'; // Giá trị fallback cho meta_description  
    //     $meta_image = ''; // Khởi tạo $meta_image với giá trị rỗng  
    // }  
        $search = $_GET['search'];//nhập giá trị
        $movie = Movie::withCount('episode')->where('title','LIKE','%'.$search.'%')// Tìm phim có tiêu đề chứa từ khóa
        ->orderBy('ngaycapnhat','DESC')
        ->paginate(10);
        return view('pages.timkiem',compact('search','movie','meta_title','meta_description','meta_image'));
    }else{
        return redirect()->to('/');

    }
      
    }
    public function home(){
        $info = Info::find(1);
        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $info->title;
        $meta_description = $info->description;
        $meta_image = '';

        $phimhot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('count_views','DESC')->get();
        // Lấy các danh mục phim thuộc danh mục
        $category_home = Category::with(['movie'=> function($q)//truy vấn con của bảng movie giúp truy vấn lấy dữ liệu
        {
           $q->withCount('episode')->where('status',1);
        } 
            ])->orderBy('position','ASC')->where('status',1)->get();
        return view('pages.home',compact('category_home','phimhot','meta_title','meta_description','meta_image'));
    }
    public function category($slug){
        
        $cate_slug = Category::where('slug',$slug)->first();
         // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $cate_slug->title;
        $meta_description = $cate_slug->description;
        $meta_image = '';

        $movie = Movie::withCount('episode')->where('category_id',$cate_slug->id)->paginate(10);
        return view('pages.category',compact('cate_slug','movie','meta_title','meta_description','meta_image'));
    }
    public function year($year){
        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = 'Năm phim: '.$year;
        $meta_description = 'Tìm phim năm :'.$year;
        $meta_image = '';
        $year = $year; //lấy year trùng $year
        $movie = Movie::withCount('episode')->where('year',$year)->orderBy('ngaycapnhat','DESC')->paginate(10);
        return view('pages.year',compact('year','movie','meta_title','meta_description','meta_image'));
    }
    public function tag($tag){
        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $tag;
        $meta_description = $tag;
        $meta_image = '';
        $tag = $tag;
        $movie = Movie::withCount('episode')->where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat','DESC')->paginate(10);
        return view('pages.tag',compact('tag','movie','meta_title','meta_description','meta_image'));
    }
    public function genre($slug){
        $genre_slug = Genre::where('slug',$slug)->first();

        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $genre_slug->title;
        $meta_description = $genre_slug->description;
        $meta_image = '';
        //lấy danh sách movie_id của các phim thuộc thể loại genre_id
        $movie_genre = Movie_Genre::where('genre_id',$genre_slug->id)->get();
        $many_genre = [];//lưu ds movie_id
        foreach($movie_genre as $key =>$movi){
            $many_genre[] = $movi->movie_id;//duyệt để thêm movie_id vào $many_genre
        }
       
        $movie = Movie::withCount('episode')->whereIn('id',$many_genre)->orderBy('ngaycapnhat','DESC')->paginate(10);
        return view('pages.genre',compact('genre_slug','movie','meta_title','meta_description','meta_image'));
    }
    public function country($slug){
        
        $country_slug = Country::where('slug',$slug)->first();
        $meta_image = '';
        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $country_slug->title;
        $meta_description = $country_slug->description;

        $movie = Movie::withCount('episode')->where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(10);
        return view('pages.country',compact('country_slug','movie','meta_title','meta_description','meta_image'));
    }
    public function movie($slug){
       
        $movie = Movie::with('category','genre','country','movie_genre')->where('slug',$slug)->where('status',1)->first();

        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = $movie->title;
        $meta_description = $movie->description;
        $meta_image = url('uploads/movie/'.$movie->image);
        //lấy ra tập 1
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIN('slug',[$slug])->get();//lấy tập liên quan nhưng k trùng với phim hiện tại
        //lấy 3 tập gần nhất
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(20)->get();
        //lấy tổng tập phim đã thêm
        $episode_current_list = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();
        //rating movie
        $rating = Rating::where('movie_id',$movie->id)->avg('rating');//average
        $rating = round($rating);//làm tròn số sao
        $count_total = Rating::where('movie_id',$movie->id)->count();
        //increase movie views
        $count_views = $movie->count_views;
        $count_views= $count_views + 1;
        $movie->count_views = $count_views;
        $movie->save();
        


        return view('pages.movie',compact('movie','related','episode','episode_tapdau','episode_current_list_count','rating','count_total','meta_title','meta_description','meta_image'));
    }
    public function add_rating(Request $request){
        $data = $request->all();
        $ip_address = $request->ip();

        $rating_count = Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
        if($rating_count>0){
            echo 'exist';

        }else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            echo 'done';
        }
    }
    public function watch($slug,$tap){
        
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug',$slug)->where('status',1)->first();

        // Cập nhật thẻ meta(mô tả) cho trang
        $meta_title = 'Xem phim: '.$movie->title;
        $meta_description = $movie->description;
        $meta_image = url('uploads/movie/'.$movie->image);
        //lấy danh sách phim liên quan
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIN('slug',[$slug])->get();
        //lấy tập 1 tap-FullHD
        if(isset($tap)){

          $tapphim = $tap;//lưu giá trị bạn đầu của biến $tập
          $tapphim = substr($tap, 4,20);//bỏ đi 4 ký tự đầu tiên tap-
          $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }

        return view('pages.watch',compact('movie','episode','tapphim','related','meta_title','meta_description','meta_image'));
    }
    public function episode(){
        return view('pages.episode');
    }
}
