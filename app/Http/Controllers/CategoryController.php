<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function updateClick($id) {
        $category = Category::find($id);//tìm danh mục theo id
        if ($category) {
            $category->increment('click_count'); // Tăng số lần click lên 1
            return response()->json(['success' => true, 'clicks' => $category->click_count]);
        }
        return response()->json(['success' => false], 404);
    }
    public function index()
    {
        $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admincp.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Thành Công','Thêm danh mục phim thành công.');
        return redirect()->route('category.index');

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
        $category = Category::find($id);
         $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.form',compact('list','category'));
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
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Thành Công','Cập nhật danh mục phim thành công.');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Category::find($id)->delete();
        // toastr()->info('Thành Công','Xóa danh mục phim thành công.');
        // return redirect()->back();

    // Tìm kiếm danh mục với ID được cung cấp  
    $category = Category::find($id);  

    // Kiểm tra xem danh mục có tồn tại không  
    if (!$category) {  
        toastr()->error('Lỗi', 'Danh mục không tồn tại.');  
        return redirect()->back();  
    }  

    // Xóa danh mục nếu tồn tại  
    $category->delete();  
    toastr()->success('Thành Công', 'Xóa danh mục phim thành công.');  
    return redirect()->back();  

    }
// Sắp xếp danh mục
    public function resorting(Request $request){
        $data = $request->all();

        foreach($data['array_id'] as $key => $value) {
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}
