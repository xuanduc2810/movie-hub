<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Movie_Genre;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Info;
use Carbon\Carbon;  //Truy vấn Carbon để quản lý tốt về thời gian update phim
use Storage;
use File;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// đếm lượt click user phim
        public function updateClickCount(Request $request)
     {
         $movie = Movie::find($request->movie_id);
         if ($movie) {
             $movie->increment('click_count'); // Tăng 1 click
             return response()->json(['success' => true, 'message' => 'Click count updated!']);
         }
         return response()->json(['success' => false, 'message' => 'Movie not found!'], 404);
     }

    public function category_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }
    public function country_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }
    public function phimhot_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->phim_hot = $data['phimhot_val'];
        $movie->save();
    }
    public function phude_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->phude = $data['phude_val'];
        $movie->save();
    }
    public function trangthai_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->status = $data['trangthai_val'];
        $movie->save();
    }
    public function thuocphim_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->thuocphim = $data['thuocphim_val'];
        $movie->save();
    }
    public function resolution_choose(Request $request){//định dạng
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->resolution = $data['resolution_val'];
        $movie->save();
    }
   
public function update_image_movie_ajax(Request $request){  
    $get_image = $request->file('file');  //truy cập file ảnh từ request với key 'file'
    $movie_id = $request->movie_id;  

    if($get_image){  
        $movie = Movie::find($movie_id);  
        if ($movie) {  
            // Xóa ảnh cũ nếu có  
            if ($movie->image) {  
                $old_image_path = public_path('uploads/movie/' . $movie->image);  //tạo đường dẫn tới ảnh cũ
                if (file_exists($old_image_path)) {  
                    unlink($old_image_path);  //xóa ảnh cũ bằng unlink
                }  
            }  

            // Thêm ảnh mới  
            $get_name_image = $get_image->getClientOriginalName();  //hinhanh.jpg
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);  //hinhanh
            $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();  //hinhanh324.jpg thêm số tránh trùng
            $get_image->move(public_path('uploads/movie/'), $new_image);  //.jpg
            $movie->image = $new_image;  
            $movie->save();  

            // Trả về phản hồi  
            return response()->json(['success' => 'Image updated successfully.', 'new_image' => $new_image]);  
        } else {  
            return response()->json(['error' => 'Movie not found.'], 404);  
        }  
    }  
    
    return response()->json(['error' => 'No image uploaded.'], 400);  
}

    public function index()
    {
         $list = Movie::with('category','movie_genre','country','genre')->withCount('episode')->orderBy('id','DESC')->get();


         $category = Category::pluck('title','id');
         $country = Country::pluck('title','id');

         $path= public_path()."/json/";//xác định thư mục json
         if (!is_dir($path)) {
            mkdir($path,0777,true);//kiểm tra coi có tồn tại k
         }
         File::put($path.'movies.json',json_encode($list));// chuyển ds list thành json

        return view('admincp.movie.index',compact('list','category','country'));
    }
    // chỉnh sửa thứ tự danh mục và phim
    public function sort_movie(){
        $category = Category::orderBy('id','ASC')->get();
        $category_home = Category::with(['movie'=> function($q)
        {
           $q->withCount('episode')->where('status',1);
        } 
            ])->orderBy('position','ASC')->where('status',1)->get();
        return view('admincp.movie.sort_movie',compact('category','category_home'));
    }
    // cập nhật vị trí danh mục
    public function resorting_navbar(Request $request){
        $data = $request->all();

        foreach($data['array_id'] as $key => $value){//array_id chứa id theo thứ tự mới
            $category = Category::find($value); // Tìm danh mục theo ID
            $category->position = $key;// Cập nhật vị trí mới
            $category->save();// Lưu vào database
        }
    }
    // cập nhật vị trí phim
    public function resorting_movie(Request $request){
        $data = $request->all();

        foreach($data['movie_array'] as $key => $value){
            $movie = Movie::find($value);
            $movie->position = $key;
            $movie->save();
        }
    }
    public function update_year(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
     public function update_season(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
        
    }
    public function update_topview(Request $request){
        $data = $request->all();//Lấy tất cả dữ liệu được gửi từ request
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }
    //topview=value
    public function filter_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview',$data['value'])->orderBy('ngaycapnhat','DESC')->take(10)->get();//value ngày,tuần,tháng
        $output = '';
        foreach($movie as $key => $mov){
            if($mov->resolution==0){
                $text = 'HD';
            }elseif($mov->resolution==1){
                $text = 'SD';
            }
            elseif($mov->resolution==2){
                $text = 'HDCam';
            }
            elseif($mov->resolution==3){
                $text = 'Cam';
            }
            elseif($mov->resolution==4){
                $text = 'FullHD';
            }
            else{
                $text = 'Trailer';
            }
            $output.='<div class="item">
                              <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                                 <div class="item-link">
                                    <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                 </div>
                                 <p class="title">'.$mov->title.'</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                              
                              <div class="viewsCount" style="color:#9d9d9d;">'.$mov->year.'</div>
                              <div style="float: left;">
                                  <ul class="list-inline rating"  title="Average Rating">
                                   ';         
                                   for($count=1; $count<=5; $count++){

                                 $output.='<li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0">&#9733;</li>';
                                 }
                                  $output.='<ul class="list-inline rating"  title="Average Rating">
                              </div>
                           </div>';//khởi tạo biến chứ html
        }
        echo $output;
    }
    //topview=0
    public function filter_default(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview',0)->orderBy('ngaycapnhat','DESC')->take(10)->get();
        $output = '';
        foreach($movie as $key => $mov){
            if($mov->resolution==0){
                $text = 'HD';
            }elseif($mov->resolution==1){
                $text = 'SD';
            }
            elseif($mov->resolution==2){
                $text = 'HDCam';
            }
            elseif($mov->resolution==3){
                $text = 'Cam';
            }
            elseif($mov->resolution==4){
                $text = 'FullHD';
            }
            else{
                $text = 'Trailer';
            }
            $output.='<div class="item">
                              <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                                 <div class="item-link">
                                    <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                                    <span class="is_trailer">'.$text.'</span>
                                 </div>
                                 <p class="title">'.$mov->title.'</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>

                              <div class="viewsCount" style="color:#9d9d9d;">'.$mov->year.'</div>
                              <div style="float: left;">
                                 <ul class="list-inline rating"  title="Average Rating">
                                   ';         
                                   for($count=1; $count<=5; $count++){

                                 $output.='<li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0">&#9733;</li>';
                                 }
                                  $output.='<ul class="list-inline rating"  title="Average Rating">
                              </div>
                           </div>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $country = Country::pluck('title','id');

        return view('admincp.movie.form',compact('genre','country','category','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();//Lấy tất cả dữ liệu từ request
        $movie = new Movie();//tạo phim mới
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];//gán data vào movie
        $movie->phude = $data['phude'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];
        $movie->count_views = rand(0,100);
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        //thêm nhiều thể loại phim
        foreach($data['genre'] as $key => $gen){
           $movie->genre_id = $gen[0];
        }
        
        

      //Thêm hình ảnh  
        $get_image = $request->file('image');

        

        if($get_image){

            $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image)); //[0] => hinhanh12569 . [1] =>jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12569.jpg
            $get_image->move('uploads/movie/',$new_image);//di chuyển vào file lưu trữ
            $movie->image = $new_image;
                   }
        $movie->save();
        //them nhiều thể loại cho phim
        $movie->movie_genre()->attach($data['genre']);
        toastr()->success('Thành Công','Thêm phim thành công.');
        return redirect()->route('movie.index');
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
         $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        $list = Movie::with('category','genre','country')->orderBy('id','DESC')->get();//ds phim mới nhất
        $list_genre = Genre::all();
        $movie = Movie::find($id);//thông tin phim
        $movie_genre = $movie->movie_genre;//thể loại hiện tại của movie
        return view('admincp.movie.form',compact('genre','country','category','movie','list_genre','movie_genre'));
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
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->name_eng = $data['name_eng'];
        $movie->slug = $data['slug'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->sotap = $data['sotap'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];
        // $movie->count_views = rand(100,99999);
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
      //Thêm hình ảnh  
        $get_image = $request->file('image');

        

        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
       }else{
            $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image)); //[0] => hinhanh12569 . [1] =>jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //hinhanh12569.jpg
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;
                   }
               }
               foreach($data['genre'] as $key => $gen){
           $movie->genre_id = $gen[0];
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
        toastr()->success('Thành Công','Cập nhật phim thành công.');
        return redirect()->route('movie.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $movie = Movie::find($id);
       //Xoa ảnh
       if(file_exists('uploads/movie/'.$movie->image)){
        unlink('uploads/movie/'.$movie->image);
       }
       //xóa thể loại
       
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();

       //xóa tập phim
        Episode::whereIn('movie_id',[$movie->id])->delete();
       $movie->delete();
       toastr()->success('Thành Công','Xóa phim thành công.');

        return redirect()->back();
    }
    public function watch_video(Request $request){  
        $data = $request->all();  
        $movie = Movie::find($data['movie_id']);  //lấy id phim
        $video = Episode::where('movie_id', $data['movie_id'])->where('episode', $data['episode_id'])->first(); //lấy tập phim 
         
        $output['video_title'] = $movie->title . ' - tập ' . $video->episode;  
        $output['video_desc'] = $movie->description;  
        $output['video_link'] = $video->linkphim;  
    
        echo json_encode($output);  
    }  
}
