  @extends('layout')
 @section('content')
 <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category', [$movie->category->slug])}}">{{$movie->category->title}}</a> » 
                           <span>
                              <a href="{{route('country', [$movie->country->slug])}}">{{$movie->country->title}}</a> » 
                              @foreach($movie->movie_genre as $gen)
                              <a href="{{route('genre', [$gen->slug])}}">{{$gen->title}}</a> »
                              @endforeach
                              <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                           </span>
                        </span></span>
                     </div>
                     </div>
                  </div>
               </div>
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section id="content" class="test">
                  <div class="clearfix wrap-content">
                    
                     <div class="halim-movie-wrapper">
                        <div class="title-block">
                           <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                              <div class="halim-pulse-ring"></div>
                           </div>
                           <div class="title-wrapper" style="font-weight: bold;">
                              Bookmark
                           </div>
                        </div>
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                              
                              @if($movie->resolution!=5)
                                  @if($episode_current_list_count>0)   
                                    <div class="bwa-content">
                                       <div class="loader"></div>
                                       <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" class="bwac-btn">
                                       <i class="fa fa-play"></i>
                                       </a>
                                       {{-- <a href="{{route('watch',['slug'=>$movie->slug,'tap-phim'=>$episode_tapdau->episode])}}" class="bwac-btn">
                                       <i class="fa fa-play"></i>
                                       </a> --}}
                                      </div>
                                       @endif
                                      @else
                                      <a href="#watch_trailer" style="display: block; " class="btn btn-primary watch_trailer">Xem Trailer</a>
                                  @endif
                             
                            {{-- Thích và chia sẽ facebook --}}
                              <div class="movie-trailer">
                                  @php
                                  $current_url = Request::url();
                                  @endphp

                                 <div class="fb-like" data-href="{{$current_url}}" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                              </div>

                           </div>


                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                    @if($movie->resolution==0)
                                                HD
                                      @elseif($movie->resolution==1)
                                                SD
                                      @elseif($movie->resolution==2)
                                                HDCam
                                      @elseif($movie->resolution==3)
                                                Cam 
                                      @elseif($movie->resolution==4)
                                                FullHD
                                      @else
                                                Trailer
                                      @endif
                                 </span>
                                 @if($movie->resolution!=5)
                                 <span class="episode">
                                    @if($movie->phude==0)
                                                Phụ Đề
                                                
                                      @else
                                                Thuyết Minh
                                                
                                      @endif
                                 </span>
                                 @endif
                              </li>

                                 <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->thoiluong}}</li>
                                       @if($movie->season!==0) <li class="list-info-group-item"><span>Phần</span> : {{$movie->season}}</li>
                                 @endif
                                 
                                 <li class="list-info-group-item">
                                    <span>Tập phim</span> : 
                                   @if($movie->thuocphim=='phimbo')

                                    {{$episode_current_list_count}}/{{$movie->sotap}} - 
                                    {{-- điều kiện các tập phim ?/? --}}
                                    @if($episode_current_list_count==$movie->sotap)
                                    Hoàn Thành

                                    @else
                                    Đang cập nhật

                                    @endif
                                    @else
                                     FullHD


                                    @endif

                                 </li>

                                 <li class="list-info-group-item"><span>Thể loại</span> : 
                                     @foreach($movie->movie_genre as $gen)
                                     <a href="{{route('genre', [$gen->slug])}}" rel="category tag">{{$gen->title}}</a>
                                     
                                     @endforeach

                                    
                                 </li>
                                 <li class="list-info-group-item"><span>Danh mục phim</span> : 
                                    <a href="{{route('category', [$movie->category->slug])}}" rel="category tag">{{$movie->category->title}}</a>
                                 </li>
                                 <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('country', [$movie->country->slug])}}" rel="tag">{{$movie->country->title}}</a></li>
                                 <li class="list-info-group-item"><span>Tập phim mới nhất</span> : 
                              @if($episode_current_list_count>0)

                                 @if($movie->thuocphim=='phimbo')
                                    
                                    
                                      @foreach($episode as $key =>$ep)


                                    
                                    <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag"> Tập {{$ep->episode}}</a>

                                     @endforeach
                                 
                                    @elseif($movie->thuocphim=='phimle')
                                     @foreach($episode as $key =>$ep_le)
                                    <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$ep_le->episode)}}" rel="tag">{{$ep_le->episode}}</a>
                                    
                                    @endforeach
                                     @endif
                                    @else
                                    Đang cập nhật

                                    @endif
                                 </li>
                                 

                                 <ul class="list-inline rating"  title="Average Rating">

                                 @for($count=1; $count<=5; $count++)

                                    @php

                                    if($count<=$rating){ 
                                    $color = 'color:#ffcc00;'; //mau vang
                                     }
                                    else {
                                     $color = 'color:#ccc;'; //mau xam
                                     }
                                                    
                                    @endphp
                                                  
                                 <li title="star_rating" 

                                    id="{{$movie->id}}-{{$count}}" 
                                                    
                                 data-index="{{$count}}"  
                                 data-movie_id="{{$movie->id}}" 

                                 data-rating="{{$rating}}" 
                                 class="rating" 
                                 style="cursor:pointer; {{$color}}
                                 font-size:30px;">&#9733;</li>

                                 @endfor

                                 </ul>

                                     <span class="total_rating">Đánh giá: {{$rating}}/{{$count_total}} lượt</span> 

                                    
                              </ul>
                              
                              <div class="movie-trailer hidden">
                                 @php
                                 $current_url = Request::url();
                                 @endphp
                                 <div class="fb-like" data-href="{{$current_url}}" data-width="" data-layout="button_count" 
                                 data-action="like" data-size="small" data-share="true"></div>
                                 <div class="fb-save" data-uri="{{$current_url}}" data-size="large"></div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="clearfix"></div>
                     <div id="halim_trailer"></div>
                     <div class="clearfix"></div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              {{$movie->description}}
                           </article>
                        </div>
                     </div>

                     <!--Trailer phim-->
                     @if($movie->trailer!=NULL)
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="watch_trailer" class="item-content">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>   
                           </article>
                        </div>
                     </div>
                     @endif

                     <!--Tags Phim-->
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              @if($movie->tags!=NULL)
                              @php
                                $tags = array();
                                $tags = explode(',', $movie->tags);

                              @endphp
                              @foreach($tags as $key => $tag)
                              <a href="{{url('tag/'.$tag)}}"> {{$tag}}</a>
                              @endforeach
                              @else
                              {{$movie->title}}
                              @endif
                           </article>
                        </div>
                     </div>
                     
                    
                     {{-- Phần Bình Luận --}}  
                     <!--/category-tab-->
                  <div class="section-bar clearfix">
                     <h2 class="section-title"><span style="color:#ffed4d">Bình Luận</span></h2>
                  </div>
                  <div class="entry-content htmlwrap clearfix">
                    
                     <div class="video-item halim-entry-box">
                        
                        <article id="post-38424" class="item-content">
                          
                           <div class="category-tab shop-details-tab"><!--category-tab-->
                              <div class="col-sm-12">
                                 <ul class="nav nav-tabs">
                                    
                                    
                                             <form class="comment-form">
                                                <input type="text" class="comment_name" placeholder="Tên người bình luận"/>
                                            
                                                <div class="comment-box">
                                                    <textarea name="comment" class="comment_content" placeholder="Nhập nội dung bình luận"></textarea>
                                                    <button type="button" class="btn btn-default send-comment">Gửi bình luận</button>
                                                </div>
                                            
                                                <div id="notify_comment"></div>
                                            </form>
                                 </ul>
                              </div>
                           <div class="tab-content">
                                 
                                 <div class="tab-pane fade active in" id="reviews" >
                                    <div class="col-sm-12">
                                      
                                       <style>
                                       
                                          .style_comment {
                                          display: flex;
                                          align-items: flex-start;
                                          gap: 10px; /* Tạo khoảng cách giữa avatar và nội dung */
                                          border: 1px solid #ddd;
                                          border-radius: 10px;
                                          background: #22221c;
                                          padding: 10px;
                                       }
                                       .comment-form {
                                          display: flex;
                                          flex-direction: column;
                                          gap: 5px;
                                          margin-bottom: 20px; /* Tạo khoảng cách giữa form nhập bình luận và danh sách bình luận */
                                       }

                                       .comment-form input.comment_name {
                                          width: 100%;
                                          padding: 8px;
                                          border: 1px solid #ccc;
                                          border-radius: 5px;
                                          background: #cfc3c3;
                                       }

                                       .comment-box {
                                          display: flex;
                                          align-items: center;
                                          gap: 10px;
                                       }

                                       .comment-box textarea.comment_content {
                                          flex-grow: 1;
                                          height: 50px;
                                          padding: 8px;
                                          border: 1px solid #ccc;
                                          border-radius: 5px;
                                          resize: none;
                                          background: #cfc3c3;
                                       }

                                       .comment-box .send-comment {
                                          background-color: red;
                                          color: white;
                                          border: none;
                                          padding: 10px 15px;
                                          border-radius: 5px;
                                          cursor: pointer;
                                       }

                                       .comment-box .send-comment:hover {
                                          background-color: darkred;
                                       }
                                       </style>


                                        <form >
                                          @csrf
                                          <input type="hidden" class="sotap" value="{{ $movie->id }}">
                                        
                                          <div id="notify_comment"></div>
                           
                                          <div id="comment_section">
                                              <!-- Bình luận sẽ được load bằng AJAX -->
                                              <div class="style_comment d-flex align-items-start p-2 mb-2">
                                                
                                              </div>
                                          </div>
                                          
                                          <script type="text/javascript">  

                                            
                                             $(document).ready(function() {
                              
                           //load_comment() hàm load bình luận
                               function load_comment() {
                                 var movie_id = $('.sotap').val(); //Lấy ID của phim lấy từ thẻ input hidden
                                   $.ajax({
                                       url: "/comment/load_comment",
                                       method: "POST",
                                       data: { _token: $('input[name="_token"]').val(), sotap: movie_id },
                                       success: function(data) {
                                          
                                           $('#comment_section').html(data);//chèn cmt vào giao diện
                                       }
                                   });
                               }
                               // 🛠 Gọi load_comment() ngay khi trang được tải
                               load_comment(); 



                          //send-comment hàm gửi bình luận 
                           $('.send-comment').click(function(){
                                var movie_id = $('.sotap').val(); // Lấy ID phim từ input(..) 
                               var comment_name = $('.comment_name').val();
                               var comment_content = $('.comment_content').val();
                               var _token = $('input[name="_token"]').val();
                           
                               if (comment_name === '' || comment_content === '') {
                                   alert('Vui lòng nhập đầy đủ thông tin.');
                                   return false;
                               }
                           
                               $.ajax({  
                                   url: '/comment/send_comment',  
                                   method: 'POST',  
                                   data: {  
                                       _token: _token,
                                       comment_name: comment_name,//gửi dữ liệu lên server qua post
                                       comment_content: comment_content,
                                       sotap: movie_id //  ,
                                   }, 
                                   success: function(data) {
                                       $('#notify_comment').html('<span class="text-success">Bình luận đã gửi, chờ duyệt...</span>');
                                       setTimeout(() => {
                                           $('#notify_comment').fadeOut();
                                       }, 5000);
                                       
                                       // Load lại bình luận sau khi gửi
                                       load_comment();
                                       
                                       // Reset input
                                       $('.comment_name').val('');
                                       $('.comment_content').val('');
                                        // Load lại bình luận sau khi gửi
                                       
                                   },
                                   error: function(xhr, status, error) {
                                       console.log(xhr.responseText);
                                       alert('Có lỗi xảy ra, vui lòng thử lại!');
                                   }
                               });
                           });

                               // Thêm chức năng duyệt bình luận
                           //     $(document).on('click', '.duyet-btn', function() {
                           //     var comment_id = $(this).data('id');
                           //     $.ajax({
                           //         url: "/comment/approve",
                           //         method: "POST",
                           //         data: { _token: $('input[name="_token"]').val(), comment_id: comment_id },
                           //         success: function(response) {
                           //             if (response.success) {
                           //                 load_comment(); // Load lại danh sách bình luận ngay sau khi duyệt
                           //             }
                           //          }
                           //     });
                           // }); 

                           // Phần xóa bình luận
                        //    $(document).on('click', '.delete-comment', function() {
                        //          var comment_id = $(this).data('id');
                        //          var _token = $('input[name="_token"]').val();

                        //          if (confirm("Bạn có chắc muốn xóa bình luận này không?")) {
                        //             $.ajax({
                        //                   url: '/comment/delete_comment',
                        //                   method: 'POST',
                        //                   data: {
                        //                      _token: _token,
                        //                      comment_id: comment_id
                        //                   },
                        //                   success: function(response) {
                        //                      if (response.success) {
                        //                         alert("Bình luận đã được xóa!");
                        //                         load_comment(); // Load lại danh sách bình luận
                        //                      } else {
                        //                         alert("Xóa bình luận thất bại!");
                        //                      }
                        //                   },
                        //                   error: function(xhr, status, error) {
                        //                      console.log(xhr.responseText);
                        //                      alert("Đã có lỗi xảy ra, vui lòng thử lại!");
                        //                   }
                        //             });
                        //          }
                        //       });
                        
                         }); 
                           
                                         </script>

               </section>
               <section class="related-movies">
                  <div id="halim_related_movies-2xx" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">

                         @foreach($related as $key => $hot)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie',$hot->slug )}}" title="{{$hot->title}}">
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
                                      @else
                                                FullHD
                                      @endif
                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
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
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 2000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                     </script>
                  </div>
               </section>

               
               
            </main>
            @include('pages.include.sidebar')
         </div>

 @endsection