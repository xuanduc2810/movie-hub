 @extends('layout')
 @section('content')
             <div id="wrapper" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>PHIM ĐỀ CỬ</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($phimhot as $key => $hot)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb movie-click" href="{{route('movie',$hot->slug )}}" data-id="{{ $hot->id }}" title="{{$hot->title}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="Đại Thánh Vô Song"></figure>
                                 <span class="status">
                                      @if($hot->resolution==0)
                                                HD
                                      @elseif($hot->resolution==1)
                                                SD
                                      @elseif($hot->resolution==2)
                                                HDCam
                                      @elseif($hot->resolution==3)
                                                Cam 
                                      @elseif($hot->resolution==4)
                                                FullHD
                                      @else
                                                Trailer
                                      @endif
                                 </span>
                                 <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                      {{$hot->episode_count}}/{{$hot->sotap}} |
                                      @if($hot->phude==0)
                                 
                                                Phụ Đề 
                                                @if($hot->season!==0) - Season{{$hot->season}}
                                                @endif
                                      @else
                                                Thuyết Minh
                                                @if($hot->season!==0) - Season{{$hot->season}}
                                                @endif
                                      @endif
                                 </span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$hot->title}}</p>
                                       <p class="original_title">{{$hot->name_eng}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                        @endforeach
                     </div>
                     <script>
                        jQuery(document).ready(function($) {            
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel(
                        {
                           loop: true,margin: 5,autoplay: true,autoplayTimeout: 2000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:5},1000: {items: 5}}
                        })});
                     </script>
                     <script>
                        $(document).ready(function () {
                            $(".movie-click").on("click", function (e) {
                                var movieId = $(this).data("id"); // Lấy ID phim
                                $.ajax({
                                    url: "{{ route('updateClickCount') }}",
                                    type: "POST",
                                    data: {
                                        movie_id: movieId,
                                        _token: "{{ csrf_token() }}" // Bảo mật CSRF
                                    },
                                    success: function (response) {
                                        console.log("Lượt click đã được cập nhật!");
                                    },
                                    error: function (xhr) {
                                        console.log("Lỗi khi cập nhật click:", xhr);
                                    }
                                });
                            });
                        });
                    </script>
                  </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               @foreach($category_home as $key => $cate_home)
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     {{-- Phần danh mục --}}
                     <span class="h-text">{{$cate_home->title}}</span>
                     {{-- Phần xem thêm --}}
                     <style type="text/css">
                        .xemthem{
                           position:absolute;
                           right:0;
                           font-weight:400;
                           line-height:21px;
                           text-transform:uppercase;
                           padding:9px 25px 9px px 10px;
                        }
                     </style>
                     <a href="{{route('category', [$cate_home->slug])}}" class="xemthem" title="Xem thêm">
                     <span class="h-text">Xem thêm</span>

                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                   @foreach($cate_home->movie->sortBy('position')->take(10) as $key => $mov)   
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb movie-click" data-id="{{$mov->id}}" href={{route('movie',$mov->slug )}} title="{{$mov->title}}">
                              <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="{{$mov->title}}"></figure>
                              <span class="status">
                                 @if($mov->resolution==0)
                                                HD
                                      @elseif($mov->resolution==1)
                                                SD
                                      @elseif($mov->resolution==2)
                                                HDCam
                                      @elseif($mov->resolution==3)
                                                Cam 
                                      @elseif($mov->resolution==4)
                                                FullHD
                                      @else
                                                Trailer
                                      @endif
                              </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                 {{$mov->episode_count}}/{{$mov->sotap}} |
                                     @if($mov->phude==0)
                                                Phụ Đề 
                                                @if($mov->season!==0) - Season{{$mov->season}}
                                                @endif
                                      @else
                                                Thuyết Minh
                                                @if($mov->season!==0) - Season{{$mov->season}}
                                                @endif
                                      @endif
                              </span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$mov->title}}</p>
                                    <p class="original_title">{{$mov->name_eng}}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                  @endforeach  
            
                  </div>
               </section>
              <div class="clearfix"></div>

               @endforeach
                          
              {{--  <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="danhmuc.php" title="Phim Lẻ">
                     <span class="h-text">Phim Chiếu Rạp</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">

                           <a class="halim-thumb" href="chitiet.php">
                              <figure><img class="lazy img-responsive" src="https://fptninhbinh.vn/wp-content/uploads/2021/06/bo-gia.jpg" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                              <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO</p>
                                    <p class="original_title">My Roommate Is a Gumiho</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article> 
                    
                  </div> 
               </section>
               <div class="clearfix"></div>--}}
              
            </main>
            <!--Sidebar-->
            @include('pages.include.sidebar')

           
         </div>

@endsection
