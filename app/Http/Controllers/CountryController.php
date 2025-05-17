<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Đếm lượt click vào quốc gia
    public function updateClickCountry($id) {
        $country = Country::find($id);
        if ($country) {
            $country->increment('click_count');
            return response()->json(['success' => true, 'click_count' => $country->click_count]);
        }
        return response()->json(['success' => false, 'message' => 'Không tìm thấy quốc gia'], 404);
    }
     public function index()
    {
        $list = Country::all();
        return view('admincp.country.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admincp.country.form');
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
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Thành Công','Thêm quốc gia thành công.');
        return redirect()->back();
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
        $country = Country::find($id);
         $list = Country::all();
        return view('admincp.country.form',compact('list','country'));
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
        $country = Country::find($id);
        $country->title = $data['title'];//gán các giá trị data
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Thành Công','Cập nhật quốc gia thành công.');
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        toastr()->info('Thành Công','Xóa quốc gia thành công.');
        return redirect()->back();
    }
}
