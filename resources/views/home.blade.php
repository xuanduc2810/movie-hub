{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý Admin</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Welcome to admin
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<script>
    .element {
    border: 3px solid black; /* Viền dày 3px, màu đen */
}
</script>
<!-- main content start-->
<div class="element" id="page-wrapper "><b>
    <div class="main-page">
      <div class="col_3">
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-folder icon-rounded"></i>
            <a href="{{route('info.create')}}">
            <div class="stats">
              <h5><strong>1</strong></h5>
              <span>Quản lý thông tin website</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-list icon-rounded"></i>
            <a href="{{route('category.index')}}">
            <div class="stats">
              <h5><strong>{{$category_total}}</strong></h5>
              <span>Danh mục phim</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-genderless user1 icon-rounded"></i>
            <a href="{{route('genre.index')}}">
            <div class="stats">
              <h5><strong>{{$genre_total}}</strong></h5>
              <span>Thể loại phim</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-globe user2 icon-rounded"></i>
            <a href="{{route('country.index')}}">
            <div class="stats">
              <h5><strong>{{$country_total}}</strong></h5>
              <span>Quốc gia phim</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
            <a href="{{route('movie.index')}}">
            <div class="stats">
              <h5><strong>{{$movie_total}}</strong></h5>
              <span>Phim</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget widget1">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-comment icon-rounded"></i>
            <a href="{{route('comment.index')}}">
            <div class="stats">
              <h5><strong>{{$comment_total}}</strong></h5>
              <span>Quản lý bình luận</span>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-3 widget">
          <div class="r3_counter_box">
            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
            <a href="{{route('statistic.index')}}">
            <div class="stats">
             
              <h5><strong>Đang online ({{ Cache::get('online_visitors', 0) }})</strong></h5>
              <span>Thống kê</span>
            </div>
          </a>
          </div>
        </div>
         {{-- <h5><strong>{{$statistic_total}}</strong></h5> --}}
      
<div class="container">
    {{-- các widget --}}
     
           
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded overflow-hidden">
                <div class="position-relative">
                    {{-- <img src="{{ asset('uploads/movie/Hinhnen.jpg') }}" alt="Admin" class="img-fluid w-100" style="height: 300px; object-fit: cover;"> --}}
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center" style="background: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
                        <h1 class="fw-bold">🎉 Quản lý Admin 🎉</h1>
                        <p class="lead">🚀  Xin chào  🚀</p>
                    </div>
                </div>
                <div class="card-body text-center bg-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="text-muted">Hệ thống quản lý nội dung phim - Admin Dashboard MovieHub</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="clearfix"></div>
</div>
<div class="row-one widgettable">
  
</div>
 </div>
</b></div>

@endsection




