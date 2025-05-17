{{-- @extends('layouts.app')
<script>
    #tablephims {
    width: 100%;
    border-collapse: collapse;
}

#tablephims thead th {
    text-align: center;
    white-space: nowrap; /* Giữ tiêu đề trên một dòng */
    padding: 8px;
}

#tablephims tbody td {
    text-align: center;
    padding: 8px;
    vertical-align: middle;
}

#tablephims th, #tablephim td {
    border: 1px solid #ddd; /* Viền bảng */
}

#tablephims th {
    background-color: #f8f9fa; /* Màu nền tiêu đề */
}
</script>
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
          <div class="modal-footer">   --}}
              {{-- <button type="button" class="btn btn-primary">Save changes</button>   --}}
              {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>  
          </div>  
      </div>  
  </div>  
</div>  
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12"> --}}
            {{-- Ảo tinker --}}
            {{-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}
        
        {{-- <a href="{{ route('run.tinker') }}" class="btn btn-primary">
            Chạy Tinker Tự Động 🚀
        </a> --}}

                    {{-- <table class="table table-responsive table-bordered table-striped" id="tablephims" >
              <thead>
                <div class="mb-3">
                    <label for="timeFilter">Chọn khoảng thời gian:</label>
                    <select id="timeFilter" class="form-control w-auto d-inline-block" onchange="filterStatistics()">
                        <option value="daily">Hôm nay</option>
                        <option value="weekly">Tuần này</option>
                        <option value="monthly">Tháng này</option>
                    </select>

                </div>
                <tr>
                    <th scope="col">Stt</th>
                  <th scope="col">Tổng số phim hot</th>
                  <th scope="col">Tổng số phim bộ</th>
                  <th scope="col">Tổng số phim lẻ</th>
                  <th scope="col">Tổng số phim chiếu rạp</th>
                  <th scope="col">Tổng số phim theo thể loại</th>
                  <th scope="col">Tổng số phim theo quốc gia</th>
                  <th scope="col">Tổng số phim theo năm</th>
                  <th scope="col">Tổng lượt bình luận</th>
                 
                  
                  
                </tr>
              </thead>
              <tbody>
                @foreach($list as $key => $stat)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $stat->total_hot_movies }}</td>
                    <td>{{ $stat->total_series_movies }}</td>
                    <td>{{ $stat->total_single_movies }}</td>
                    <td>{{ $stat->total_theater_movies }}</td>
                    <td>{{ $stat->total_movies_by_genre }}</td>
                    <td>{{ $stat->total_movies_by_country }}</td>
                    <td>{{ $stat->total_movies_by_year }}</td>
                    <td>{{ $stat->total_comments }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}


{{-- 
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <label for="timeFilter">Chọn khoảng thời gian:</label>
                <select id="timeFilter" class="form-control w-auto d-inline-block" onchange="filterStatistics()">
                    <option value="daily">Hôm nay</option>
                    <option value="weekly">Tuần này</option>
                    <option value="monthly">Tháng này</option>
                </select>
            </div>

            <table class="table table-responsive table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Stt</th>
                        <th scope="col">
                            <a href="{{ route('info.create') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Quản lý thông tin website
                        </th>
                        <th scope="col">
                            <a href="{{ route('category.index') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Danh mục phim
                        </th>
                        <th scope="col">
                            <a href="{{ route('genre.index') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Thể loại phim
                        </th>
                        <th scope="col">
                            <a href="{{ route('country.index') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Quốc gia phim
                        </th>
                        <th scope="col">
                            <a href="{{ route('movie.index') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Phim
                        </th>
                        <th scope="col">
                            <a href="{{ route('comment.index') }}" class="text-decoration-none">
                                <span style="font-size: 18px;">📂</span>
                            </a>
                            Quản lý bình luận
                        </th>
                        <th scope="col">
                            <a href="#" class="text-decoration-none">📂</a>
                            Thống kê Online
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><strong>1</strong></td>
                        <td><strong>{{ $category_total }}</strong></td>
                        <td><strong>{{ $genre_total }}</strong></td>
                        <td><strong>{{ $country_total }}</strong></td>
                        <td><strong>{{ $movie_total }}</strong></td>
                        <td><strong>{{ $comment_total }}</strong></td>
                        <td><strong>Online({{ $online_visitors ?? 0 }})</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}






{{-- 

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><b>📊 Thống kê phim</b></h2>

    <label for="filterType">Chọn thống kê:</label>
    <select id="filterType" class="form-control w-25" onchange="toggleDatePicker()">
        <option value="week">Tuần</option>
        <option value="month">Tháng</option>
        <option value="year">Năm</option>
    </select>

    <div id="datePickerContainer" class="mt-3">
        <input type="text" id="datePicker" class="form-control w-25" placeholder="Chọn ngày" readonly>
        <input type="text" id="monthPicker" class="form-control w-25" placeholder="Chọn tháng" readonly>
        <input type="text" id="yearPicker" class="form-control w-25" placeholder="Chọn năm" readonly>
    </div>

    <table class="table table-responsive table-bordered table-striped text-center mt-3">
        <h3><b>Danh sách tổng hợp</b></h3>
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Danh mục phim</th>
                <th scope="col">Thể loại phim</th>
                <th scope="col">Quốc gia phim</th>
                <th scope="col">Phim</th>
                <th scope="col">Quản lý bình luận</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $category_total }}</strong></td>
                <td><strong>{{ $genre_total }}</strong></td>
                <td><strong>{{ $country_total }}</strong></td>
                <td><strong>{{ $movie_total }}</strong></td>
                <td><strong>{{ $comment_total }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div id="boxContainer" class="mt-3" style="display: none;">
        <div id="boxWeek" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Tuần</h4>
            <p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxMonth" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📅 Thống kê theo Tháng</h4>
            <p>Dữ liệu thống kê theo tháng sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxYear" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Năm</h4>
            <p>Dữ liệu thống kê theo năm sẽ hiển thị tại đây...</p>
        </div>
    </div>

    <button class="btn btn-primary mt-3" onclick="showBox()">📤 Xuất</button>

</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function () {
    $("#datePicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "2020:2030"
    });

    $("#monthPicker").datepicker({
        dateFormat: "mm-yy",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {
            let month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val();
            let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
            $(this).val((parseInt(month) + 1) + "-" + year);
        }
    }).hide();

    $("#yearPicker").datepicker({
        dateFormat: "yy",
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {
            let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
            $(this).val(year);
        }
    }).hide();

    $(".stat-box").hide();
    $("#boxContainer").hide();
    toggleDatePicker();
});

function toggleDatePicker() {
    let filterType = $("#filterType").val();
    $("#datePicker, #monthPicker, #yearPicker").hide().val("");

    if (filterType === "week") {
        $("#datePicker").show().attr("placeholder", "Chọn ngày");
    } else if (filterType === "month") {
        $("#monthPicker").show().attr("placeholder", "Chọn tháng");
    } else if (filterType === "year") {
        $("#yearPicker").show().attr("placeholder", "Chọn năm");
    }

    $(".stat-box").hide();
    $("#boxContainer").hide();
}

function showBox() {
    let filterType = $("#filterType").val();
    let selectedDate = $("#datePicker").val();
    let selectedMonth = $("#monthPicker").val();
    let selectedYear = $("#yearPicker").val();

    if ((filterType === "week" && selectedDate === "") ||
        (filterType === "month" && selectedMonth === "") ||
        (filterType === "year" && selectedYear === "")) {
        alert("Vui lòng chọn thời gian trước khi xuất thống kê!");
        return;
    }

    $(".stat-box").hide();
    $("#boxContainer").show();

    if (filterType === "week") {
        if (selectedDate === "27-02-2025") {
            $("#boxWeek").html(`
                <h4>📆 <b>Thống kê theo Tuần</b></h4>
                <p>Ngày 27/02/2025</p>

                <h5><b>CÁC BỘ PHIM ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Loại phim</th>
                            <th>Tên phim</th>
                            <th>Đánh giá</th>
                            <th>Lượt xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Phim lẻ</td><td>Mao Sơn Tróc Quỷ</td><td>5 ⭐</td><td>21</td></tr>
                        <tr><td>Phim bộ</td><td>Yêu Thầm Không Thể Giấu</td><td>5 ⭐</td><td>15</td></tr>
                        <tr><td>Phim chiếu rạp</td><td>Kẻ ăn hồn</td><td>5 ⭐</td><td>18</td></tr>
                        <tr><td>Phim mới</td><td>Tiên Võ Đế Tôn</td><td>5 ⭐</td><td>10</td></tr>
                    </tbody>
                </table>

                <h5><b>DANH MỤC ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Phim chiếu rạp</td><td>25</td></tr>
                    </tbody>
                </table>

                <h5><b>QUỐC GIA ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Việt Nam</td><td>5</td></tr>
                    </tbody>
                </table>

                <hr>

                <h5><b>PHIM CÓ LƯỢT XEM ÍT</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Loại phim</th>
                            <th>Tên phim</th>
                            <th>Đánh giá</th>
                            <th>Lượt xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Phim bộ</td><td>Bá chủ bầu trời</td><td>0 ⭐</td><td>4</td></tr>
                        <tr><td>Phim lẻ</td><td>Soi sáng Cho Em</td><td>1 ⭐</td><td>0</td></tr>
                        <tr><td>Phim mới</td><td>Người nổi tiếng</td><td>0 ⭐</td><td>3</td></tr>
                        <tr><td>Phim chiếu rạp</td><td>Tình Yêu Anh Dành Cho Em</td><td>2 ⭐</td><td>2</td></tr>
                    </tbody>
                </table>

                <h5><b>DANH MỤC ÍT TRUY CẬP</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Phim bộ</td><td>6</td></tr>
                    </tbody>
                </table>

                <h5><b>QUỐC GIA ÍT TRUY CẬP</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Thái Lan</td><td>7</td></tr>
                    </tbody>
                </table>

                 <hr>

                <h4>🔹 BẢNG TỔNG HỢP 🔹</h4><hr>

                <h5><b>1️⃣ PHIM TOP ĐẦU</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Tên phim</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Mao Sơn Tróc Quỷ</td></tr>
                        <tr><td>Yêu Thầm Không Thể Giấu</td></tr>
                        <tr><td>Kẻ ăn hồn</td></tr>
                        <tr><td>Tiên Võ Đế Tôn</td></tr>
                    </tbody>
                </table>

                <h5><b>2️⃣ DANH MỤC TOP ĐẦU</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Danh mục</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Phim chiếu rạp</td></tr>
                    </tbody>
                </table>

                <h5><b>3️⃣ QUỐC GIA TOP ĐẦU</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Quốc gia</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>Việt Nam</td></tr>
                    </tbody>
                </table>
            `);
        } else {
            $("#boxWeek").html("<h4>📆 Thống kê theo Tuần</h4><p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>");
        }
        $("#boxWeek").show();
    } else if (filterType === "month") {
        $("#boxMonth").show();
    } else if (filterType === "year") {
        $("#boxYear").show();
    }
}
</script>
@endsection --}}


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    
    <h2 class="mb-4"><b>📊 Thống kê phim</b></h2>

    <label for="filterType">Chọn thống kê:</label>
    <select id="filterType" class="form-control w-25" onchange="toggleDatePicker()">
        <option value="week">Tuần</option>
        <option value="month">Tháng</option>
        <option value="year">Năm</option>
    </select>

    <div id="datePickerContainer" class="mt-3">
        <input type="text" id="datePicker" class="form-control w-25" placeholder="Chọn ngày" readonly>
        <input type="text" id="monthPicker" class="form-control w-25" placeholder="Chọn tháng" readonly>
        <input type="text" id="yearPicker" class="form-control w-25" placeholder="Chọn năm" readonly>
    </div>

    <table class="table table-responsive table-bordered table-striped text-center mt-3">
        <h3><b>Danh sách tổng hợp</b></h3>
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Danh mục phim</th>
                <th scope="col">Thể loại phim</th>
                <th scope="col">Quốc gia phim</th>
                <th scope="col">Phim</th>
                <th scope="col">Quản lý bình luận</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $category_total }}</strong></td>
                <td><strong>{{ $genre_total }}</strong></td>
                <td><strong>{{ $country_total }}</strong></td>
                <td><strong>{{ $movie_total }}</strong></td>
                <td><strong>{{ $comment_total }}</strong></td>
            </tr>
        </tbody>
    </table>

    {{-- @if(!empty($topCategories) && $topCategories->count() > 0)
    <pre>{{ print_r($topCategories->toArray(), true) }}</pre>
@else
    <p>Không có dữ liệu danh mục</p>
@endif
@if(!empty($topGenres) && $topGenres->count() > 0)
    <pre>{{ print_r($topGenres->toArray(), true) }}</pre>
@else
    <p>Không có dữ liệu thể loại</p>
@endif

@if(!empty($topCountries) && $topCountries->count() > 0)
    <pre>{{ print_r($topCountries->toArray(), true) }}</pre>
@else
    <p>Không có dữ liệu quốc gia</p>
@endif --}}


{{-- @if($topCategory && $lowCategory)
    <p>Danh mục có nhiều click nhất: {{ $topCategory->title }} ({{ $topCategory->click_count }} lượt click)</p>
    <p>Danh mục có ít click nhất: {{ $lowCategory->title }} ({{ $lowCategory->click_count }} lượt click)</p>
@endif

@if($topGenre && $lowGenre)
    <p>Thể loại có nhiều click nhất: {{ $topGenre->title }} ({{ $topGenre->click_count }} lượt click)</p>
    <p>Thể loại có ít click nhất: {{ $lowGenre->title }} ({{ $lowGenre->click_count }} lượt click)</p>
@endif

@if($topCountry && $lowCountry)
    <p>Quốc gia có nhiều click nhất: {{ $topCountry->title }} ({{ $topCountry->click_count }} lượt click)</p>
    <p>Quốc gia có ít click nhất: {{ $lowCountry->title }} ({{ $lowCountry->click_count }} lượt click)</p>
@endif --}}
{{-- <h4>Phim có lượt click và rating cao nhất:</h4>
@if ($topMovie)
    <p>
        Phim được yêu thích nhất: <strong>{{ $topMovie->title }}</strong> <br>
        ⭐ Đánh giá trung bình: {{ $topMovie->avg_rating }} sao <br>
        👀 Lượt click: {{ $topMovie->click_count }}
    </p>
@else
    <p>Không có dữ liệu phim.</p>
@endif

@if ($lowMovie)
    <p>
        Phim ít được yêu thích nhất: <strong>{{ $lowMovie->title }}</strong> <br>
        ⭐ Đánh giá trung bình: {{ $lowMovie->avg_rating }} sao <br>
        👀 Lượt click: {{ $lowMovie->click_count }}
    </p>
@else
    <p>Không có dữ liệu phim.</p>
@endif --}}
{{-- <h4>Phim có lượt click và rating cao nhất:</h4>

@if ($topSeries)
    <p>
        📺 <strong>Phim bộ yêu thích nhất:</strong> {{ $topSeries->title }} <br>
        ⭐ Đánh giá trung bình: {{ $topSeries->avg_rating }} sao <br>
        👀 Lượt click: {{ $topSeries->click_count }}
    </p>
@endif

@if ($topSingle)
    <p>
        🎬 <strong>Phim lẻ yêu thích nhất:</strong> {{ $topSingle->title }} <br>
        ⭐ Đánh giá trung bình: {{ $topSingle->avg_rating }} sao <br>
        👀 Lượt click: {{ $topSingle->click_count }}
    </p>
@endif

@if ($topCinema)
    <p>
        🍿 <strong>Phim chiếu rạp yêu thích nhất:</strong> {{ $topCinema->title }} <br>
        ⭐ Đánh giá trung bình: {{ $topCinema->avg_rating }} sao <br>
        👀 Lượt click: {{ $topCinema->click_count }}
    </p>
@endif

@if ($topNew)
    <p>
        🆕 <strong>Phim mới yêu thích nhất:</strong> {{ $topNew->title }} <br>
        ⭐ Đánh giá trung bình: {{ $topNew->avg_rating }} sao <br>
        👀 Lượt click: {{ $topNew->click_count }}
    </p>
@endif

<h4>Phim có lượt click và rating thấp nhất:</h4>

@if ($lowSeries)
    <p>
        📺 <strong>Phim bộ ít yêu thích nhất:</strong> {{ $lowSeries->title }} <br>
        ⭐ Đánh giá trung bình: {{ $lowSeries->avg_rating }} sao <br>
        👀 Lượt click: {{ $lowSeries->click_count }}
    </p>
@endif

@if ($lowSingle)
    <p>
        🎬 <strong>Phim lẻ ít yêu thích nhất:</strong> {{ $lowSingle->title }} <br>
        ⭐ Đánh giá trung bình: {{ $lowSingle->avg_rating }} sao <br>
        👀 Lượt click: {{ $lowSingle->click_count }}
    </p>
@endif
@if ($lowCinema)
    <p>
        🍿 <strong>Phim chiếu rạp ít yêu thích nhất:</strong> {{ $lowCinema->title }} <br>
        ⭐ Đánh giá trung bình: {{ $lowCinema->avg_rating }} sao <br>
        👀 Lượt click: {{ $lowCinema->click_count }}
    </p>
@endif

@if ($lowNew)
    <p>
        🆕 <strong>Phim mới ít yêu thích nhất:</strong> {{ $lowNew->title }} <br>
        ⭐ Đánh giá trung bình: {{ $lowNew->avg_rating }} sao <br>
        👀 Lượt click: {{ $lowNew->click_count }}
    </p>
@endif

<button class="btn btn-primary mt-3" onclick="showBox()">👤 Xuất</button>
</div>

@endsection --}} 



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><b>📊 Thống kê phim</b></h2>

    <label for="filterType">Chọn thống kê:</label>
    <select id="filterType" class="form-control w-25" onchange="toggleDatePicker()">
        <option value="week">Tuần</option>
        <option value="month">Tháng</option>
        <option value="year">Năm</option>
    </select>

    <div id="datePickerContainer" class="mt-3">
        <input type="text" id="datePicker" class="form-control w-25" placeholder="Chọn ngày" readonly>
        <input type="text" id="monthPicker" class="form-control w-25" placeholder="Chọn tháng" readonly>
        <input type="text" id="yearPicker" class="form-control w-25" placeholder="Chọn năm" readonly>
    </div>

    <table class="table table-responsive table-bordered table-striped text-center mt-3">
        <h3><b>Danh sách tổng hợp</b></h3>
        
        <thead>
            <tr>
                <th scope="col">Stt</th>
               
                <th scope="col">
                    <a href="{{ route('category.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng danh mục
                </th>
                <th scope="col">
                    <a href="{{ route('genre.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng thể loại
                </th>
                <th scope="col">
                    <a href="{{ route('country.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng quốc gia
                </th>
                <th scope="col">
                    <a href="{{ route('movie.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng phim
                </th>
                <th scope="col">
                    <a href="{{ route('comment.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng bình luận
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $category_total }}</strong></td>
                <td><strong>{{ $genre_total }}</strong></td>
                <td><strong>{{ $country_total }}</strong></td>
                <td><strong>{{ $movie_total }}</strong></td>
                <td><strong>{{ $comment_total }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div id="boxContainer" class="mt-3" style="display: none;">
        <div id="boxWeek" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Tuần</h4>
            <p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxMonth" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📅 Thống kê theo Tháng</h4>
            <p>Dữ liệu thống kê theo tháng sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxYear" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Năm</h4>
            <p>Dữ liệu thống kê theo năm sẽ hiển thị tại đây...</p>
        </div>
    </div>

    <button class="btn btn-primary mt-3" onclick="showBox()">📤 Xuất</button>

</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(document).ready(function () {
    $("#datePicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "2020:2030"
    });

    $("#monthPicker").datepicker({
        dateFormat: "mm-yy",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {
            let month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val();
            let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
            $(this).val((parseInt(month) + 1) + "-" + year);
        }
    }).hide();

    $("#yearPicker").datepicker({
        dateFormat: "yy",
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {
            let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
            $(this).val(year);
        }
    }).hide();

    $(".stat-box").hide();
    $("#boxContainer").hide();
    toggleDatePicker();
});

function toggleDatePicker() {
    let filterType = $("#filterType").val();
    $("#datePicker, #monthPicker, #yearPicker").hide().val("");

    if (filterType === "week") {
        $("#datePicker").show().attr("placeholder", "Chọn ngày");
    } else if (filterType === "month") {
        $("#monthPicker").show().attr("placeholder", "Chọn tháng");
    } else if (filterType === "year") {
        $("#yearPicker").show().attr("placeholder", "Chọn năm");
    }

    $(".stat-box").hide();
    $("#boxContainer").hide();
}

function showBox() {
    let filterType = $("#filterType").val();
    let selectedDate = $("#datePicker").val();
    let selectedMonth = $("#monthPicker").val();
    let selectedYear = $("#yearPicker").val();

    if ((filterType === "week" && selectedDate === "") ||
        (filterType === "month" && selectedMonth === "") ||
        (filterType === "year" && selectedYear === "")) {
        alert("Vui lòng chọn thời gian trước khi xuất thống kê!");
        return;
    }

    $(".stat-box").hide();
    $("#boxContainer").show();

    if (filterType === "week") {
        if (selectedDate === "27-02-2025") {
            $("#boxWeek").html(`
                <h4>📆 <b>Thống kê theo Tuần</b></h4>
<p>Ngày 27/02/2025</p>
<hr>
<h4><b>🔹 ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>CÁC BỘ PHIM ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($topSingle)
            <tr><td>Phim lẻ</td><td>{{ $topSingle->title }}</td><td>{{ round($topSingle->avg_rating) }} ⭐</td><td>{{ $topSingle->click_count }}</td></tr>
        @endif
        @if ($topSeries)
            <tr><td>Phim bộ</td><td>{{ $topSeries->title }}</td><td>{{ round($topSeries->avg_rating) }} ⭐</td><td>{{ $topSeries->click_count }}</td></tr>
        @endif
        @if ($topCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $topCinema->title }}</td><td>{{ round($topCinema->avg_rating) }} ⭐</td><td>{{ $topCinema->click_count }}</td></tr>
        @endif
        @if ($topNew)
            <tr><td>Phim mới</td><td>{{ $topNew->title }}</td><td>{{ round($topNew->avg_rating) }} ⭐</td><td>{{ $topNew->click_count }}</td></tr>
        @endif
    </tbody>
</table>



<h5><b>2️⃣ DANH MỤC ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCategory))
            <tr>
                <td>{{ $topCategory->title }}</td>
                <td>{{ $topCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topGenre))
            <tr>
                <td>{{ $topGenre->title }}</td>
                <td>{{ $topGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCountry))
            <tr>
                <td>{{ $topCountry->title }}</td>
                <td>{{ $topCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>
<hr>
<h4><b>🔹 ÍT ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>PHIM CÓ LƯỢT XEM ÍT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($lowSingle)
            <tr><td>Phim lẻ</td><td>{{ $lowSingle->title }}</td><td>{{ round($lowSingle->avg_rating) }} ⭐</td><td>{{ $lowSingle->click_count }}</td></tr>
        @endif
        @if ($lowSeries)
            <tr><td>Phim bộ</td><td>{{ $lowSeries->title }}</td><td>{{ round($lowSeries->avg_rating) }} ⭐</td><td>{{ $lowSeries->click_count }}</td></tr>
        @endif
        @if ($lowCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $lowCinema->title }}</td><td>{{ round($lowCinema->avg_rating) }} ⭐</td><td>{{ $lowCinema->click_count }}</td></tr>
        @endif
        @if ($lowNew)
            <tr><td>Phim mới</td><td>{{ $lowNew->title }}</td><td>{{ round($lowNew->avg_rating) }} ⭐</td><td>{{ $lowNew->click_count }}</td></tr>
        @endif
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCategory))
            <tr>
                <td>{{ $lowCategory->title }}</td>
                <td>{{ $lowCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowGenre))
            <tr>
                <td>{{ $lowGenre->title }}</td>
                <td>{{ $lowGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCountry))
            <tr>
                <td>{{ $lowCountry->title }}</td>
                <td>{{ $lowCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<hr>
<h4><b>🔹 BẢNG TỔNG HỢP 🔹</b></h4>
<hr>

<h5><b>1️⃣ PHIM TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Tên phim</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topSingle->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topSeries->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topCinema->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topNew->title ?? 'N/A' }}</td></tr>
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCategory->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>

<h5><b>3️⃣ QUỐC GIA TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCountry->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>
            `);
        } else {
            $("#boxWeek").html("<h4>📆 Thống kê theo Tuần</h4><p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>");
        }
        $("#boxWeek").show();
    } else if (filterType === "month") {
        $("#boxMonth").show();
    } else if (filterType === "year") {
        $("#boxYear").show();
    }
}
</script>
@endsection --}}


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><b>📊 Thống kê phim</b></h2>

    <label for="filterType">Chọn thống kê:</label>
    <select id="filterType" class="form-control w-25" onchange="toggleDatePicker()">
        <option value="week">Tuần</option>
        <option value="month">Tháng</option>
        <option value="year">Năm</option>
    </select>

    <div id="datePickerContainer" class="mt-3">
        <input type="text" id="datePicker" class="form-control w-25" placeholder="Chọn ngày" readonly>
        <input type="text" id="monthPicker" class="form-control w-25" placeholder="Chọn tháng" readonly>
        <input type="text" id="yearPicker" class="form-control w-25" placeholder="Chọn năm" readonly>
    </div>

    <table class="table table-responsive table-bordered table-striped text-center mt-3">
        <h3><b>Danh sách tổng hợp</b></h3>
        
        <thead>
            <tr>
                <th scope="col">Stt</th>
               
                <th scope="col">
                    <a href="{{ route('category.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng danh mục
                </th>
                <th scope="col">
                    <a href="{{ route('genre.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng thể loại
                </th>
                <th scope="col">
                    <a href="{{ route('country.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng quốc gia
                </th>
                <th scope="col">
                    <a href="{{ route('movie.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng phim
                </th>
                <th scope="col">
                    <a href="{{ route('comment.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng bình luận
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $category_total }}</strong></td>
                <td><strong>{{ $genre_total }}</strong></td>
                <td><strong>{{ $country_total }}</strong></td>
                <td><strong>{{ $movie_total }}</strong></td>
                <td><strong>{{ $comment_total }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div id="boxContainer" class="mt-3" style="display: none;">
        <div id="boxWeek" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Tuần</h4>
            <p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxMonth" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📅 Thống kê theo Tháng</h4>
            <p>Dữ liệu thống kê theo tháng sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxYear" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Năm</h4>
            <p>Dữ liệu thống kê theo năm sẽ hiển thị tại đây...</p>
        </div>
    </div>

    <button class="btn btn-primary mt-3" onclick="showBox()">📤 Xuất</button>

</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
     $(document).ready(function () {
        var today = new Date();
        $("#datePicker").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "2020:2030",
            maxDate: today
        });

        $("#monthPicker").datepicker({
            dateFormat: "mm-yy",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            maxDate: today,
            onClose: function(dateText, inst) {
                let month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val();
                let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
                $(this).val((parseInt(month) + 1) + "-" + year);
            }
        }).hide();

        $("#yearPicker").datepicker({
            dateFormat: "yy",
            changeYear: true,
            showButtonPanel: true,
            maxDate: today,
            onClose: function(dateText, inst) {
                let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
                $(this).val(year);
            }
        }).hide();

    $(".stat-box").hide();
    $("#boxContainer").hide();
    toggleDatePicker();
});

function toggleDatePicker() {
    let filterType = $("#filterType").val();
    $("#datePicker, #monthPicker, #yearPicker").hide().val("");

    if (filterType === "week") {
        $("#datePicker").show().attr("placeholder", "Chọn ngày");
    } else if (filterType === "month") {
        $("#monthPicker").show().attr("placeholder", "Chọn tháng");
    } else if (filterType === "year") {
        $("#yearPicker").show().attr("placeholder", "Chọn năm");
    }

    $(".stat-box").hide();
    $("#boxContainer").hide();
}

function showBox() {
    let filterType = $("#filterType").val();
    let selectedDate = $("#datePicker").val();
    let selectedMonth = $("#monthPicker").val();
    let selectedYear = $("#yearPicker").val();

    if ((filterType === "week" && selectedDate === "") ||
        (filterType === "month" && selectedMonth === "") ||
        (filterType === "year" && selectedYear === "")) {
        alert("Vui lòng chọn thời gian trước khi xuất thống kê!");
        return;
    }

    $(".stat-box").hide();
    $("#boxContainer").show();

    if (filterType === "week") {
        if (filterType === "week") {
            $("#boxWeek").html(`
                <h4>📆 <b>Thống kê theo Tuần</b></h4>

<hr>
<h4><b>🔹 ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>CÁC BỘ PHIM ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($topSingle)
            <tr><td>Phim lẻ</td><td>{{ $topSingle->title }}</td><td>{{ round($topSingle->avg_rating) }} ⭐</td><td>{{ $topSingle->click_count }}</td></tr>
        @endif
        @if ($topSeries)
            <tr><td>Phim bộ</td><td>{{ $topSeries->title }}</td><td>{{ round($topSeries->avg_rating) }} ⭐</td><td>{{ $topSeries->click_count }}</td></tr>
        @endif
        @if ($topCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $topCinema->title }}</td><td>{{ round($topCinema->avg_rating) }} ⭐</td><td>{{ $topCinema->click_count }}</td></tr>
        @endif
        @if ($topNew)
            <tr><td>Phim mới</td><td>{{ $topNew->title }}</td><td>{{ round($topNew->avg_rating) }} ⭐</td><td>{{ $topNew->click_count }}</td></tr>
        @endif
    </tbody>
</table>



<h5><b>2️⃣ DANH MỤC ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCategory))
            <tr>
                <td>{{ $topCategory->title }}</td>
                <td>{{ $topCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topGenre))
            <tr>
                <td>{{ $topGenre->title }}</td>
                <td>{{ $topGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCountry))
            <tr>
                <td>{{ $topCountry->title }}</td>
                <td>{{ $topCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>
<hr>
<h4><b>🔹 ÍT ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>PHIM CÓ LƯỢT XEM ÍT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($lowSingle)
            <tr><td>Phim lẻ</td><td>{{ $lowSingle->title }}</td><td>{{ round($lowSingle->avg_rating) }} ⭐</td><td>{{ $lowSingle->click_count }}</td></tr>
        @endif
        @if ($lowSeries)
            <tr><td>Phim bộ</td><td>{{ $lowSeries->title }}</td><td>{{ round($lowSeries->avg_rating) }} ⭐</td><td>{{ $lowSeries->click_count }}</td></tr>
        @endif
        @if ($lowCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $lowCinema->title }}</td><td>{{ round($lowCinema->avg_rating) }} ⭐</td><td>{{ $lowCinema->click_count }}</td></tr>
        @endif
        @if ($lowNew)
            <tr><td>Phim mới</td><td>{{ $lowNew->title }}</td><td>{{ round($lowNew->avg_rating) }} ⭐</td><td>{{ $lowNew->click_count }}</td></tr>
        @endif
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCategory))
            <tr>
                <td>{{ $lowCategory->title }}</td>
                <td>{{ $lowCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowGenre))
            <tr>
                <td>{{ $lowGenre->title }}</td>
                <td>{{ $lowGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCountry))
            <tr>
                <td>{{ $lowCountry->title }}</td>
                <td>{{ $lowCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<hr>
<h4><b>🔹 BẢNG TỔNG HỢP 🔹</b></h4>
<hr>

<h5><b>1️⃣ PHIM TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Tên phim</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topSingle->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topSeries->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topCinema->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topNew->title ?? 'N/A' }}</td></tr>
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCategory->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>

<h5><b>3️⃣ QUỐC GIA TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCountry->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>
            `);
        } else {
            $("#boxWeek").html("<h4>📆 Thống kê theo Tuần</h4><p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>");
        }
        $("#boxWeek").show();
    } else if (filterType === "month") {
        $("#boxMonth").show();
    } else if (filterType === "year") {
        $("#boxYear").show();
    }
}
</script>



<title>Thống kê</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chartContainer {
            display: none;
            width: 80%;
            margin: 20px auto;
        }
        #datePicker {
            margin: 10px;
        }
    </style>
</head>
<body>

    <h2>Thống kê theo thời gian</h2>
    
    <!-- Date Picker để chọn ngày -->
    <label for="datePicker">Chọn ngày:</label>
    <input type="date" id="datePicker">

    <button onclick="showChart()">Xuất</button>

    <div id="chartContainer">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        function showChart() {
            document.getElementById('chartContainer').style.display = 'block';

            // Lấy ngày được chọn từ Date Picker
            let selectedDate = document.getElementById('datePicker').value;
            if (!selectedDate) {
                alert("Vui lòng chọn một ngày!");
                return;
            }

            // Tiêu đề động dựa vào ngày được chọn
            let titleText = `Thống kê phim cho ngày ${selectedDate}`;

            // Tạo biểu đồ
            const ctx = document.getElementById('myChart').getContext('2d');
            if (window.myChart instanceof Chart) {
                window.myChart.destroy(); // Hủy biểu đồ cũ trước khi vẽ mới
            }
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Danh mục phim', 'Thể loại', 'Quốc gia', 'Phim bộ', 'Phim lẻ', 'Phim chiếu rạp', 'Phim mới'],
                    datasets: [{
                        label: 'Thống kê theo tuần',
                        data: [
                            {{ $weekCategory ?? 0 }},
                            {{ $weekGenre ?? 0 }},
                            {{ $weekCountry ?? 0 }},
                            {{ $weekSeries ?? 0 }},
                            {{ $weekSingle ?? 0 }},
                            {{ $weekCinema ?? 0 }},
                            {{ $weekNew ?? 0 }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Thống kê theo tháng',
                        data: [
                            {{ $monthCategory ?? 0 }},
                            {{ $monthGenre ?? 0 }},
                            {{ $monthCountry ?? 0 }},
                            {{ $monthSeries ?? 0 }},
                            {{ $monthSingle ?? 0 }},
                            {{ $monthCinema ?? 0 }},
                            {{ $monthNew ?? 0 }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Thống kê theo năm',
                        data: [
                            {{ $yearCategory ?? 0 }},
                            {{ $yearGenre ?? 0 }},
                            {{ $yearCountry ?? 0 }},
                            {{ $yearSeries ?? 0 }},
                            {{ $yearSingle ?? 0 }},
                            {{ $yearCinema ?? 0 }},
                            {{ $yearNew ?? 0 }}
                        ],
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: titleText,
                            font: {
                                size: 16
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><b>📊 Thống kê phim</b></h2>

    <label for="filterType">Thống kê:</label>
    <select id="filterType" class="form-control w-25" onchange="toggleDatePicker()">
        <option value="week">Ngày</option> 
        {{-- <option value="month">Tháng</option>
        <option value="year">Năm</option> --}}
    </select>

    <div id="datePickerContainer" class="mt-3">
        <input type="text" id="datePicker" class="form-control w-25" placeholder="Chọn ngày" readonly>
        <input type="text" id="monthPicker" class="form-control w-25" placeholder="Chọn tháng" readonly>
        <input type="text" id="yearPicker" class="form-control w-25" placeholder="Chọn năm" readonly>
    </div>

    <table class="table table-responsive table-bordered table-striped text-center mt-3">
        <h3><b>Danh sách tổng hợp</b></h3>
        
        <thead>
            <tr>
                <th scope="col">Stt</th>
               
                <th scope="col">
                    <a href="{{ route('category.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng danh mục
                </th>
                <th scope="col">
                    <a href="{{ route('genre.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng thể loại
                </th>
                <th scope="col">
                    <a href="{{ route('country.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng quốc gia
                </th>
                <th scope="col">
                    <a href="{{ route('movie.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng phim
                </th>
                <th scope="col">
                    <a href="{{ route('comment.index') }}" class="text-decoration-none">
                        <span style="font-size: 18px;">📂</span>
                    </a>
                    Tổng bình luận
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>{{ $category_total }}</strong></td>
                <td><strong>{{ $genre_total }}</strong></td>
                <td><strong>{{ $country_total }}</strong></td>
                <td><strong>{{ $movie_total }}</strong></td>
                <td><strong>{{ $comment_total }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div id="boxContainer" class="mt-3" style="display: none;">
        <div id="boxWeek" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo ngày</h4>
            <p>Dữ liệu thống kê theo ngày sẽ hiển thị tại đây...</p>
        </div>
        {{-- <div id="boxMonth" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📅 Thống kê theo Tháng</h4>
            <p>Dữ liệu thống kê theo tháng sẽ hiển thị tại đây...</p>
        </div>
        <div id="boxYear" class="stat-box p-3 bg-light rounded mb-3" style="display: none;">
            <h4>📆 Thống kê theo Năm</h4>
            <p>Dữ liệu thống kê theo năm sẽ hiển thị tại đây...</p>
        </div> --}}
    </div>

    <button class="btn btn-primary mt-3" onclick="showBox()">📤 Xuất</button>

</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
     $(document).ready(function () {
        var today = new Date();
        $("#datePicker").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "2020:2030",
            maxDate: today
        });

        // $("#monthPicker").datepicker({
        //     dateFormat: "mm-yy",
        //     changeMonth: true,
        //     changeYear: true,
        //     showButtonPanel: true,
        //     maxDate: today,
        //     onClose: function(dateText, inst) {
        //         let month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val();
        //         let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
        //         $(this).val((parseInt(month) + 1) + "-" + year);
        //     }
        // }).hide();

        // $("#yearPicker").datepicker({
        //     dateFormat: "yy",
        //     changeYear: true,
        //     showButtonPanel: true,
        //     maxDate: today,
        //     onClose: function(dateText, inst) {
        //         let year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val();
        //         $(this).val(year);
        //     }
        // }).hide();

    $(".stat-box").hide();
    $("#boxContainer").hide();
    toggleDatePicker();
});

function toggleDatePicker() {
    // let filterType = $("#filterType").val();
    // $("#datePicker, #monthPicker, #yearPicker").hide().val("");

    // if (filterType === "week") {
    //     $("#datePicker").show().attr("placeholder", "Chọn ngày");
    // } else if (filterType === "month") {
    //     $("#monthPicker").show().attr("placeholder", "Chọn tháng");
    // } else if (filterType === "year") {
    //     $("#yearPicker").show().attr("placeholder", "Chọn năm");
    // }
    let filterType = $("#filterType").val();
    $("#datePicker").hide().val(""); // Chỉ hiển thị bộ chọn ngày
    $("#monthPicker, #yearPicker").remove(); // Xóa hoàn toàn phần chọn tháng và năm

    if (filterType === "week") {
        $("#datePicker").show().attr("placeholder", "Chọn ngày");
    }
    $(".stat-box").hide();
    $("#boxContainer").hide();
}

function showBox() {
    let filterType = $("#filterType").val();
    let selectedDate = $("#datePicker").val();
    // let selectedMonth = $("#monthPicker").val();
    // let selectedYear = $("#yearPicker").val();

    if ((filterType === "week" && selectedDate === "") 
    // ||
    //     (filterType === "month" && selectedMonth === "") ||
    //     (filterType === "year" && selectedYear === "")
    ) {
        alert("Vui lòng chọn thời gian trước khi xuất thống kê!");
        return;
    }

    $(".stat-box").hide();
    $("#boxContainer").show();

    if (filterType === "week") {
        if (filterType === "week") {
            $("#boxWeek").html(`
                <h4>📆 <b>Thống kê theo Tuần</b></h4>

<hr>
<h4><b>🔹 ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>CÁC BỘ PHIM ĐƯỢC YÊU THÍCH TRONG TUẦN</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($topSingle)
            <tr><td>Phim lẻ</td><td>{{ $topSingle->title }}</td><td>{{ round($topSingle->avg_rating) }} ⭐</td><td>{{ $topSingle->count_views }}</td></tr>
        @endif
        @if ($topSeries)
            <tr><td>Phim bộ</td><td>{{ $topSeries->title }}</td><td>{{ round($topSeries->avg_rating) }} ⭐</td><td>{{ $topSeries->count_views }}</td></tr>
        @endif
        @if ($topCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $topCinema->title }}</td><td>{{ round($topCinema->avg_rating) }} ⭐</td><td>{{ $topCinema->count_views }}</td></tr>
        @endif
        @if ($topNew)
            <tr><td>Phim mới</td><td>{{ $topNew->title }}</td><td>{{ round($topNew->avg_rating) }} ⭐</td><td>{{ $topNew->count_views }}</td></tr>
        @endif
    </tbody>
</table>



<h5><b>2️⃣ DANH MỤC ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCategory))
            <tr>
                <td>{{ $topCategory->title }}</td>
                <td>{{ $topCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topGenre))
            <tr>
                <td>{{ $topGenre->title }}</td>
                <td>{{ $topGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ĐƯỢC TRUY CẬP NHIỀU NHẤT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($topCountry))
            <tr>
                <td>{{ $topCountry->title }}</td>
                <td>{{ $topCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>
<hr>
<h4><b>🔹 ÍT ĐƯỢC QUAN TÂM 🔹</b></h4>
<hr>
<h5><b>PHIM CÓ LƯỢT XEM ÍT</b></h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Loại phim</th>
            <th>Tên phim</th>
            <th>Đánh giá</th>
            <th>Lượt xem</th>
        </tr>
    </thead>
    <tbody>
        @if ($lowSingle)
            <tr><td>Phim lẻ</td><td>{{ $lowSingle->title }}</td><td>{{ round($lowSingle->avg_rating) }} ⭐</td><td>{{ $lowSingle->count_views }}</td></tr>
        @endif
        @if ($lowSeries)
            <tr><td>Phim bộ</td><td>{{ $lowSeries->title }}</td><td>{{ round($lowSeries->avg_rating) }} ⭐</td><td>{{ $lowSeries->count_views }}</td></tr>
        @endif
        @if ($lowCinema)
            <tr><td>Phim chiếu rạp</td><td>{{ $lowCinema->title }}</td><td>{{ round($lowCinema->avg_rating) }} ⭐</td><td>{{ $lowCinema->count_views }}</td></tr>
        @endif
        @if ($lowNew)
            <tr><td>Phim mới</td><td>{{ $lowNew->title }}</td><td>{{ round($lowNew->avg_rating) }} ⭐</td><td>{{ $lowNew->count_views }}</td></tr>
        @endif
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCategory))
            <tr>
                <td>{{ $lowCategory->title }}</td>
                <td>{{ $lowCategory->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>3️⃣ THỂ LOẠI ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Thể loại</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowGenre))
            <tr>
                <td>{{ $lowGenre->title }}</td>
                <td>{{ $lowGenre->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<h5><b>4️⃣ QUỐC GIA ÍT TRUY CẬP</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th><th>Lượt truy cập</th></tr>
    </thead>
    <tbody>
        @if (!empty($lowCountry))
            <tr>
                <td>{{ $lowCountry->title }}</td>
                <td>{{ $lowCountry->click_count }}</td>
            </tr>
        @else
            <tr><td colspan="2">Không có dữ liệu</td></tr>
        @endif
    </tbody>
</table>

<hr>
<h4><b>🔹 BẢNG TỔNG HỢP 🔹</b></h4>
<hr>

<h5><b>1️⃣ PHIM TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Tên phim</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topSingle->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topSeries->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topCinema->title ?? 'N/A' }}</td></tr>
        <tr><td>{{ $topNew->title ?? 'N/A' }}</td></tr>
    </tbody>
</table>

<h5><b>2️⃣ DANH MỤC TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Danh mục</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCategory->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>

<h5><b>3️⃣ QUỐC GIA TOP ĐẦU</b></h5>
<table class="table table-bordered">
    <thead>
        <tr><th>Quốc gia</th></tr>
    </thead>
    <tbody>
        <tr><td>{{ $topCountry->title ?? 'Không có dữ liệu' }}</td></tr>
    </tbody>
</table>
            `);
        } else {
            $("#boxWeek").html("<h4>📆 Thống kê theo Tuần</h4><p>Dữ liệu thống kê theo tuần sẽ hiển thị tại đây...</p>");
        }
        $("#boxWeek").show();
    } 
    // else if (filterType === "month") {
    //     $("#boxMonth").show();
    // } 
    // else if (filterType === "year") {
    //     $("#boxYear").show();
    // }
}
</script>



<title>Thống kê</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chartContainer {
        display: none;
        width: 100%;
        max-width: 1200px; /* Giới hạn tối đa nếu muốn */
        margin: 20px auto;
        height: 500px; /* Tăng chiều cao cho thoải mái */
    }

    .container {
        width: 100%;
        max-width: 1200px; /* Cho phép rộng hơn */
        margin: auto;
        padding: 0 20px;
    }

    h2 {
        margin-bottom: 20px;
    }

    .row {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-select, .form-control {
        min-width: 180px;
    }

    button {
        min-width: 90px;
    }

    #myChart {
        width: 100% !important;
        height: 100% !important;
    }
    </style>

<div class="container mt-4">
    <h2 class="fw-bold text-center">Thống kê theo thời gian</h2>
    
    <div class="row g-2 align-items-center justify-content-center">
        <div class="col-auto">
            <label for="timeType" class="fw-bold">Chọn loại thời gian:</label>
        </div>
        <div class="col-auto">
            <select id="timeType" class="form-select" onchange="updateTimePicker()">
                <option value="week">Tuần</option>
                <option value="month">Tháng</option>
                <option value="year">Năm</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="week" id="timePicker" class="form-control">
        </div>
        <div class="col-auto">
            <button onclick="showChart()" class="btn btn-dark">Xuất</button>
        </div>
    </div>

    <div id="chartContainer" class="mt-4" style="width: 100%; height: 400px;">
        <canvas id="myChart"></canvas>
    </div>
</div>
    <script>
        function updateTimePicker() {
            let timeType = document.getElementById('timeType').value;
            let timePicker = document.getElementById('timePicker');

            if (timeType === 'week') {
                timePicker.type = 'week';
            } else if (timeType === 'month') {
                timePicker.type = 'month';
            } else {
                timePicker.type = 'number';
                timePicker.min = 2000; // Giới hạn năm tối thiểu
                timePicker.max = new Date().getFullYear(); // Năm hiện tại
                timePicker.value = new Date().getFullYear();  // Set mặc định năm hiện tại
            }
        }

        function showChart() {
            document.getElementById('chartContainer').style.display = 'block';

            let timeType = document.getElementById('timeType').value;
            let selectedTime = document.getElementById('timePicker').value;

            if (!selectedTime) {
                alert("Vui lòng chọn thời gian!");
                return;
            }

            let url = `/get-statistics?timeType=${timeType}&selectedTime=${selectedTime}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    let titleText = `Thống kê phim cho ${timeType === 'week' ? 'tuần' : timeType === 'month' ? 'tháng' : 'năm'} ${selectedTime}`;

                    const ctx = document.getElementById('myChart').getContext('2d');
                    if (window.myChart instanceof Chart) {
                        window.myChart.destroy();
                    }

                    window.myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Danh mục phim', 'Thể loại', 'Quốc gia', 'Phim bộ', 'Phim lẻ', 'Phim chiếu rạp', 'Phim mới'],
                        datasets: [{
                            label: `Thống kê theo ${timeType}`,
                            data: [data.category, data.genre, data.country, data.series, data.single, data.cinema, data.new],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(255, 159, 64, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 205, 86, 0.6)',
                                'rgba(201, 203, 207, 0.6)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(201, 203, 207, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: titleText,
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                display: true, // Bật lại giải thích ở đây
                                position: 'top', // Cho nó nằm ở trên (có thể để 'bottom', 'left', 'right' nếu thích)
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
    }

    window.addEventListener('resize', function () {
        if (window.myChart) {
            window.myChart.resize();
        }
    });
    </script>
@endsection