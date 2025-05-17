<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="shortcut icon" href="{{asset('uploads/logo/'.$info->logo)}}" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>{{$meta_title}}</title>
      
      <meta name="description" content="{{$meta_description}}" />
      <link rel="canonical" href="{{Request::url()}}">

      <link rel="next" href="" />

      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:description" content="{{$meta_description}}" />
      <meta property="og:url" content="{{Request::url()}}" />
      <meta property="og:site_name" content="{{$meta_title}}" />

      <meta property="og:image" content="{{$meta_image}}" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">  -->
      <link rel='dns-prefetch' href='//s.w.org' />

      <link rel='stylesheet' id='bootstrap-css' href= '{{asset("css/bootstrap.min.css")}}' media="all" />
      <link rel='stylesheet' id='style-css' href='{{asset("css/style.css")}}' media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href='{{asset("css/style.min.css")}}' media='all' />
      <script type='text/javascript' src='{{asset("js/jquery.min.js?ver=5.7.2")}}' id='halim-jquery-js'></script>

      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      
      </style>
      <style>#header .site-title {background: url("../images/moviehub.png") no-repeat top left;background-size: contain;text-indent: -9999px;}</style>

   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-3 col-sm-6 slogan">
                  <p class=""><a class="logo" href="" title="phim hay ">
                       <img src="{{asset('uploads/logo/'.$info->logo)}}">
                  </a></p>
                  </a>
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs-12">
                        <form action="{{route('tim-kiem')}}" id="search-form-pc" name="halimForm" role="search" action="" method="GET">
                           <div class="form-group form-timkiem">
                              <div class="input-group col-xs-12" style="display: flex; align-items: center;">

                                 <input type="text" name="search" id="timkiem" class="form-control" 
                                 placeholder="Tìm kiếm phim..." autocomplete="off" required>
                                 <button class="btn btn-primary" >Tìm Kiếm</button>


                                 
                              </div>
                           </div>
                        </form>
                        <ul class="list-group" id="result" style="display: none"></ul>
                     </div>
                  </div>
               </div>

               {{-- <div class="col-md-4 hidden-xs">
                  <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div>
                  <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div>
               </div>
            </div> --}}
            <li class="mega dropdown">
               <a title="Đăng nhập" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                   Tài khoản 
                   @if(Auth::check())
                       {{ Auth::user()->name }}
                       <span class="caret"></span>
                   @endif
               </a>
               <ul role="menu" class="dropdown-menu">
                   @if(!Auth::check())
                       <li>
                           <a title="Đăng nhập bằng google" href="{{ route('login-by-google') }}">Đăng nhập google</a>
                       </li>
                      <li> <a title="Đăng nhập bằng facebook" href="{{ route('login-by-facebook') }}">Đăng nhập facebook</a></li>
                       
                   @else
                       <li>
                           <form action="{{ route('logout-home') }}" method="POST">
                               @csrf
                               <button type="submit" style="border: none; background: none; padding: 0; color: #337ab7; cursor: pointer;">
                                   Đăng xuất
                               </button>
                           </form>
                       </li>
                   @endif
               </ul>
           </li>

         </div>
      </header>
      <div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
            
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                  <span class="hl-search" aria-hidden="true"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                  Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                  <span class="count">0</span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <!-- <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>  -->
                  </button>
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('homepage')}}">Trang Chủ</a></li>
                        @foreach($categories as $key => $cate)
                        <li  class="mega"><a class="category-link"  title="{{$cate->title}}" href="{{route('category', [$cate->slug])}}" data-id="{{$cate->id}}">{{$cate->title}}</a></li>
                        @endforeach
                       <!-- {{--<li class="mega dropdown">
                           <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              <li><a title="Phim 2025" href="danhmuc.php">Phim 2025</a></li>
                              <li><a title="Phim 2024" href="danhmuc.php">Phim 2024</a></li>
                              <li><a title="Phim 2023" href="danhmuc.php">Phim 2023</a></li>
                              <li><a title="Năm 2022" href="danhmuc.php">Năm 2022</a></li>
                              <li><a title="Năm 2021" href="danhmuc.php">Năm 2021</a></li>
                           </ul>
                        </li>--}} -->

                        <li class="mega dropdown">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                               Thể Loại <span class="caret"></span>
                           </a>
                           <ul role="menu" class="dropdown-menu">
                              @foreach($genres as $key => $gen)
                              <li>
                                  <a class="genre-link" data-id="{{$gen->id}}" title="{{$gen->title}}" href="{{route('genre', [$gen->slug])}}">
                                      {{$gen->title}}
                                  </a>
                              </li>
                          @endforeach 
                           </ul>
                       </li>
                       
                       <li class="mega dropdown">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                               Quốc Gia <span class="caret"></span>
                           </a>
                           <ul role="menu" class="dropdown-menu">
                               @foreach($countries as $key => $count)
                                   <li>
                                       <a class="country-link" data-id="{{$count->id}}" title="{{$count->title}}" href="{{route('country', [$count->slug])}}">
                                           {{$count->title}}
                                       </a>
                                   </li>
                               @endforeach
                           </ul>
                       </li>
                        <li class="mega dropdown">
                           <a title="Năm Phim" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm Phim <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                             @for($year=2020;$year<=2025;$year++)
                              <li ><a  title="{{$year}}" href="{{url('nam/'.$year)}}">{{$year}}</a></li>
                             @endfor
                           </ul>
                        </li>
                        {{-- @foreach($category_home as $key => $cate)
                        <li class="mega"><a title="{{$cate->title}}" href="{{route('category', [$cate->slug])}}">{{$cate->title}}</a></li>
                        @endforeach --}}
                            
                     </ul>
                  </div>
                  <!-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul>  -->
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
      </div>
    {{--   <div class="container">
         <div class="row fullwith-slider"></div>
      </div> --}}
      <div class="container" id="wrapper">
        @yield('content')
      </div>
      <div class="clearfix"></div>
      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               <div class="widget about col-xs-12 col-sm-4 col-md-2">
                  <div class="footer-logo">
                     <img src="{{asset('uploads/logo/'.$info->logo)}}" height="85">
                  </div>
                  <!-- {{-- Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a> --}} -->
               </div>
               <div class="widget about col-xs-12 col-sm-4 col-md-6">
                  <div class="footer-logo">
                     <p>{{$info->description}}</p>
                  </div>
                  
               </div>
            </div>
         </div>
      </footer>
      <style type="text/css">
         .copyright_footer{
            text-align: center;
         line-height: 32px;
         color: black;
         }
      </style>
      <div class="col-xs-12 col-sm-4 col-md-12">
                  
                     <p class="copyright_footer">{{$info->copyright}}</p>
                  
                  
               </div>
      <div id='easy-top'></div>

      <script type='text/javascript' src='{{asset("js/bootstrap.min.js?ver=5.7.2")}}' id='bootstrap-js'></script>
      <script type='text/javascript' src='{{asset("js/owl.carousel.min.js?ver=5.7.2")}}' id='carousel-js'></script>

      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v22.0"></script>
      
      <script type='text/javascript' src='{{asset("js/halimtheme-core.min.js?ver=1626273138")}}' id='halim-init-js'></script>
       {{-- đếm lượt click của user vào category --}}
     <script>
      $(document).ready(function () {
    $('.category-link').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        console.log('Danh mục được click, ID:', id);

        $.ajax({
            url: '/category/click/' + id,
            type: 'GET',
            success: function (response) {
                console.log('Cập nhật lượt click thành công:', response);
            },
            error: function (xhr) {
                console.log('Lỗi request:', xhr.status, xhr.statusText);
            }
        });

        // Điều hướng sang trang danh mục
        window.location.href = $(this).attr('href');
    });
});
// đếm lượt click thể loại user
$(document).ready(function() {
    $('.genre-link').on('click', function(e) {
        var id = $(this).data('id');

        // Kiểm tra nếu có ID thì mới gửi request
        if (id) {
            $.ajax({
                url: '/genre/click/' + id,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Lượt click thể loại đã được cập nhật');
                }
            });
        }
    });
// đếm lượt click user quốc gia
    $('.country-link').on('click', function(e) {
        var id = $(this).data('id');

        if (id) {
            $.ajax({
                url: '/country/click/' + id,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Lượt click quốc gia đã được cập nhật');
                }
            });
        }
    });
});

     </script>
      {{-- Đoạn script đánh giá phim :  --}}
<script type="text/javascript">
        
          function remove_background(movie_id)
           {
            for(var count = 1; count <= 5; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ccc');
            }
          }

          //hover chuột đánh giá sao
         $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
          // alert(index);
          // alert(movie_id);
            remove_background(movie_id);
            for(var count = 1; count<=index; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
          });
         //nhả chuột ko đánh giá
         $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            var rating = $(this).data("rating");
            remove_background(movie_id);
            //alert(rating);
            for(var count = 1; count<=rating; count++)
            {
             $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
           });

          //click đánh giá sao
          $(document).on('click', '.rating', function(){
             
                var index = $(this).data("index");
                var movie_id = $(this).data('movie_id');
            
                $.ajax({
                 url:"{{route('add-rating')}}",
                 method:"POST",
                 data:{index:index, movie_id:movie_id},
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                 success:function(data)
                 {
                  if(data == 'done')
                  {
                   
                   alert("Bạn đã đánh giá "+index +" trên 5");
                   location.reload();
                   
                  }else if(data =='exist'){
                    alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé");
                  }
                  else
                  {
                   alert("Lỗi đánh giá");
                  }
                  
                 }
                });
              
              
                
          });

     
      </script>

      <script type="text/javascript">   
$(document).ready(function() {  

    $('#timkiem').keyup(function() {  
        $('#result').html('');  
        
        var search = $('#timkiem').val();  
        
        if (search != '') {  
            $('#result').css('display', 'inherit');  
            var expression = new RegExp(search, "i");  

            $.getJSON('/json/movies.json', function(data) {  
                $.each(data, function(key, value) {  
                    if (value.title.search(expression) != -1) {  
                        $('#result').append('<li class="list-group-item" style="cursor:pointer"><img height="40" width="40" src="/uploads/movie/' + value.image + '">' + value.title + '<br/> | <span>' + value.description + '</span> </li>');  
                    }  
                });  
            })
        } else {  
            $('#result').css('display', 'none');  
        }  
    });  

    $('#result').on('click', 'li', function() {  
        var click_text = $(this).text().split('|');  
        $('#timkiem').val($.trim(click_text[0]));  
        $('#result').html('');  
        $('#result').css('display', 'none');  
    });  
});  
</script>

      <script type="text/javascript">
         $(.watch_trailer).click(function(e){
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
         });
      </script>

     <script type="text/javascript">  
      //lấy ra top view ngày phim
           $(document).ready(function(){
                $.ajax({  
                    url: "{{ url('/filter-topview-default') }}",  
                    method: "GET",  

                    success: function(data) 
                    {  

                     $('#show_data_default').html(data);  
                    }  
                });
           
           
           
            $('.filter-sidebar').click(function(){  
               var href = $(this).attr('href');
                if(href=='#ngay'){
                    var value = 0;
                }else if(href=='#tuan'){
                    var value = 1;
                }else{
                    var value = 2;
                }
                $.ajax({  
                    url: "{{ url('/filter-topview-phim') }}",  
                    method: "POST",  
                    data: { value: value},
                    headers: {
                     'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },  
                    success: function(data) {  

                     $('#halim-ajax-popular-post-default').css("display","none");
                     $('#show_data').html(data);  
                    }  
                });  
            })
            }) 
        </script> 

      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
    
      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>
     
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>
     
   </body>
</html>