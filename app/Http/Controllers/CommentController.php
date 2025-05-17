<?php

namespace App\Http\Controllers;  

use App\Models\Comment;  
use Illuminate\Http\Request;  



class CommentController extends Controller  
{  

    public function index()
    {
        $list = Comment::with('movie')->orderBy('comment_date','ASC')->get();
        return view('admincp.comment.index',compact('list'));
    }

//    Gửi bình luận 
    public function send_comment(Request $request){
        // Kiểm tra request có dữ liệu không
        if (!$request->has(['sotap', 'comment_name', 'comment_content'])) {
            return response()->json(['error' => 'Thiếu dữ liệu'], 400);
        }
        $sotap = $request->sotap;//Nhận dữ liệu từ ajax
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
    
        // Kiểm tra xem ID phim có hợp lệ không
        if (empty($sotap) || !is_numeric($sotap)) {
            return response()->json(['error' => 'ID phim không hợp lệ'], 400);
        }
    
        // Tạo và Lưu bình luận vào database
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_movie_id = $sotap;
        $comment->comment_status = 0;
        $comment->save();
    
        return response()->json(['success' => 'Bình luận đã được gửi'], 200);
    }
// Cập nhật trạng thái duyêt
     public function confirm_comment($id)
     {
         $comment = Comment::find($id);
         if ($comment) {
             $comment->comment_status = 1; // Cập nhật trạng thái đã duyệt
             $comment->save();
             return redirect()->route('comment.index')->with('success', 'Bình luận đã được duyệt.');
         }
         return redirect()->route('comment.index')->with('error', 'Không tìm thấy bình luận.');
     }

//      public function showMovie($id)
// {
//     $movie = Movie::findOrFail($id);
//     $comments = Comment::where('movie_id', $id)
//                         ->where('status', 1)
//                         ->orderBy('id', 'DESC')
//                         ->get();
    
//     return view('pages.movie', compact('movie', 'comments'));
// }
  
    public function load_comment(Request $request) {
        $comments = Comment::where('comment_movie_id', $request->sotap)
                            ->where('comment_status', 1) // Chỉ lấy bình luận đã duyệt
                            ->orderBy('comment_date', 'DESC')
                            ->get();
    
        $output = '';// Chuỗi HTML chứa danh sách bình luận
        foreach ($comments as $comment) {
            $output .= '<div class="style_comment">
                            <p>🤵 <b>'.$comment->comment_name.'</b> - '.$comment->comment_date.'</p></br>
                            <p>'.$comment->comment.'</p>
                        </div>';
        }
    
        return response()->json($output);
    }
    // Xóa bình luận
    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            return redirect()->back()->with('success', 'Bình luận đã được xóa!');
        }
        return redirect()->back()->with('error', 'Bình luận không tồn tại!');
    }

//  public function store(Request $request, $movieId)  
// {  
//     // Xác thực dữ liệu  
//     $request->validate([  
//         'author' => 'required|string|max:255',  
//         'content' => 'required|string',  
//     ]);  

//     // Lưu bình luận vào cơ sở dữ liệu  
//     Comment::create([  
//         'movie_id' => $movieId,  
//         'author' => $request->author,  
//         'content' => $request->content,  
//     ]);  

//     // Chuyển hướng về trang hiển thị phim  
//     return redirect()->route('movies.show', ['movieId' => $movieId])->with('success', 'Bình luận đã được gửi!');  
// }  
}  