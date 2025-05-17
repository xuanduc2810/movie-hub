@extends('layouts.app')

@section('content')
<div class="modal" id="videoModal" tabindex="-1" role="dialog">  
  <div class="modal-dialog" role="document">  
      <div class="modal-content">  
          <div class="modal-header">  
              <h5 class="modal-title"><span id="video_title"></span></h5>  
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                  <span aria-hidden="true">&times;</span>  
              </button>  
          </div>  
          <div class="modal-body">  
              <p id="video_desc"></p>  
              <p id="video_link"></p>  
          </div>  
          <div class="modal-footer">  
              {{-- <button type="button" class="btn btn-primary">Save changes</button>   --}}
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
          </div>  
      </div>  
  </div>  
</div>  
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
                    <table class="table table-responsive" id="tablephim">
              <thead>
                <tr>
                  <th scope="col">Stt</th>
                  <th scope="col">Tên phim</th>
                  <th scope="col">Tập phim</th>
                  <th scope="col">Số tập</th>
                  {{-- <th scope="col">Thẻ phim</th> --}}
                  {{-- <th scope="col">Thời Lượng Phim</th> --}}
                  <th scope="col">Hình ảnh</th>
                  {{-- <th scope="col">Phim đề cử</th> --}}
                    {{-- <th scope="col">Định dạng</th> --}}
                    {{-- <th scope="col">Phụ đề</th> --}}
                  {{-- <th scope="col">Mô tả</th> --}}
                  {{-- <th scope="col">Liên kết</th> --}}
                   {{-- <th scope="col">Trạng thái</th> --}}
                   {{-- <th scope="col">Danh mục</th> --}}
                   <th scope="col">Thể loại</th>
                   {{-- <th scope="col">Quốc gia</th> --}}
                   <th scope="col">Thuộc phim</th>
                   
                   {{-- <th scope="col">Episode</th> --}}
                   <th scope="col">Ngày tạo</th>
                   <th scope="col">Ngày cập nhật</th>
                   <th scope="col">Năm</th>
                   <th scope="col">Phần</th>
                   <th scope="col">Phim đề cử theo</th>
                  <th scope="col">Quản lý</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $key => $cate)
                <tr>
                  {{-- id phim --}}
                  <th scope="row">{{$key}}</th>
                  {{-- Tên phim --}}
                  <td>{{$cate->title}}</td>
                  {{-- Tập phim --}}
                  <td><a href="{{route('add-episode',[$cate->id])}}" class="btn btn-danger btn-sm">Thêm tập phim</a>
                    @foreach ($cate->episode as $key => $epi)
                    <a
                   class="show_video" 
                   data-movie_video_id="{{$epi->movie_id}}" 
                   data-video_episode="{{$epi->episode}}" 

                    style="color:#fff;cursor: pointer">
                  <span class="badge badge-dark">{{$epi->episode}}</span>
                  </a>
                  @endforeach
                </td>
                  {{-- Số tập --}}
                  <td>{{$cate->episode_count}}/{{$cate->sotap}} tập</td>
                  {{-- tags --}}
                  {{-- <td>{{$cate->tags}}</td> --}}
                  {{-- Thời lượng phim --}}
                  {{-- <td>{{$cate->thoiluong}}</td> --}}
                  {{-- Hình ảnh --}}
                  <td><img width="50%" src="{{asset('uploads/movie/'.$cate->image)}}" alt="Hình ảnh">
                     <input type="file" data-movie_id="{{$cate->id}}" id="file-{{$cate->id}}" class="form-control-file file_image" accept="image/* ">
                     <span id="success_image"></span>
                  </td>
                  {{-- Phim hot --}}
                  {{-- <td> --}}
                    {{-- @if($cate->phim_hot==0)
                              Không
                    @else
                              Có
                    @endif --}}
                    {{-- Phim đề cử --}}
                    {{-- <select id="{{$cate->id}}" class=" phimhot_choose">
                      @if($cate->phimhot==0)
                      <option value="1">Hot</option>
                      <option selected value="0">Không</option>
                      @else
                      <option selected value="1">Hot</option>
                      <option value="0">Không</option>
                      @endif
                    </select>
                </td> --}}
                  {{-- Định dạng --}}
                {{-- <td>
                    @if($cate->resolution==0)
                              HD
                    @elseif($cate->resolution==1)
                              SD
                    @elseif($cate->resolution==2)
                              HDCam
                    @elseif($cate->resolution==3)
                              Cam 
                    @elseif($cate->resolution==4)
                              FullHD
                    @else
                              Trailer
                    @endif
                </td> --}}
                    {{-- Định dạng2 --}}
                    {{--
                    <td> @php
                    $options = array('0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer');
                    @endphp
                    <select id="{{$cate->id}}" class="resolution_choose">
                      @foreach($options as $key =>$resolution)
                      <option {{$cate->resolution==$key ? 'selected' : ''}} value="{{$key}}">{{$resolution}}</option>
                      @endforeach
                    </select>
                </td> --}}
                  {{-- Phụ đề --}}
                  {{-- <td> --}}
                    {{-- @if($cate->phude==0)
                              Phụ Đề
                    @else
                              Thuyết Minh
                    @endif --}}
                    {{-- Phụ đề 2 --}}
                    {{-- <select id="{{$cate->id}}" class=" phude_choose">
                      @if($cate->phude==0)
                      <option value="1">Thuyết minh</option>
                      <option selected value="0">Phụ đề</option>
                      @else
                      <option selected value="1">Thuyết minh</option>
                      <option value="0">Phụ đề</option>
                      @endif
                    </select>
                </td> --}}
                   {{-- Mô tả --}}
                  {{-- <td>  
                      @php  
                          $description = substr($cate->description, 0, 100);  
                          echo $description . '....';  
                      @endphp  
                  </td>  --}}
                  {{-- Đường dẫn --}}
                  {{-- <td>{{$cate->slug}}</td> --}}
                  {{-- Trạng thái --}}
                  {{-- <td> --}}
                    {{-- @if($cate->status)
                              Hiển thị
                    @else
                              Không hiển thị
                    @endif --}}
                    {{-- Trạng thái 2 --}}
                    {{-- <select id="{{$cate->id}}" class=" trangthai_choose">
                      @if($cate->status==0)
                      <option value="1">Hiển thị</option>
                      <option selected value="0">Không</option>
                      @else
                      <option selected value="1">Hiển thị</option>
                      <option value="0">Không</option>
                      @endif
                    </select>
                </td> --}}
                  {{-- Danh mục --}}
                {{-- <td> --}}
                    {{-- {{ $cate->category ? $cate->category->title : 'Không có thể loại' }} --}}
                    {{-- Danh mục 2 --}}
                        {{-- {!!Form::select('category_id',$category , isset($cate) ? $cate->category->id : '', ['class'=>' category_choose','id'=>$cate->id]) !!} --}}
                    {{-- </td> --}}
                  {{-- Thể loại --}}
                    <td>
                    @foreach($cate->movie_genre as  $gen)
                    <span class="badge" style="background-color: #000000; color: #ffffff;">{{ $gen->title }}</span>  
                    @endforeach

                     
                    </td>
                  {{-- Quốc gia --}}
                  {{-- <td>
                    {!!Form::select('country_id',$country , isset($cate) ? $cate->country->id : '', ['class'=>' country_choose','id'=>$cate->id]) !!}
                  </td> --}}
                  {{-- Thuộc phim --}}
                    <td>  
                     {{-- @if($cate->thuocphim=='phimle')
                      Phim lẻ
                      @else
                      Phim bộ

                      @endif --}}
                      {{-- Thuộc phim 2 --}}
                      <select id="{{$cate->id}}" class=" thuocphim_choose">
                      @if($cate->thuocphim=='phimbo')
                      <option value="phimle">Phim lẻ</option>
                      <option selected value="phimbo">Phim bộ</option>
                      @else
                      <option selected value="phimle">Phim lẻ</option>
                      <option value="phimbo">Phim bộ</option>
                      @endif
                    </select>
                    </td>


                    

                    {{-- <td>{{ $cate->sotap  }}</td> --}}
                    {{-- Ngày tạo --}}
                    <td>{{ $cate->ngaytao  }}</td>
                    {{-- Ngày cập nhật   --}}
                    <td>{{ $cate->ngaycapnhat }}</td> 
                    {{-- Năm phim  --}}
                    <td>
                      <Form method="GET">
                        @csrf
                      {!! Form::selectYear('year',2020,2025,isset($cate->year) ? $cate->year : '',['class'=>'select-year','id'=>$cate->id,'placeholder' => '-- Năm phim --'])!!}
                    </Form>
                    </td>
                    {{-- Seasson --}}
                    <td>
                      <Form method="POST">
                        @csrf
                      {!! Form::selectRange('season',0,20,isset($cate->season) ? $cate->season : '',['class'=>'select-season','id'=>$cate->id])!!}
                    </Form>
                    </td>
                    {{-- Top views --}}
                    <td>
                      {!!Form::select('topview', ['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview','id'=>$cate->id,'placeholder' => '--View--']) !!}
                    </td>
                    {{-- Quản lý --}}
                  <td>
                     {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc chắn xóa?")']) !!} 
                        {!!Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                     {!! Form::close() !!} 
                     <a href="{{route('movie.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
