<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Quản lý người dùng</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Quản lý bình luận và đánh giá</a>
        </li> --}}
         <li class="nav-item">
          <a class="nav-link" href="{{route('info.create')}}">Thông tin website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Quản lý nội dung phim
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('category.create')}}">Danh mục phim</a></li>
            <li><a class="dropdown-item" href="{{route('genre.create')}}">Thể loại</a></li>
            <li><a class="dropdown-item" href="{{route('country.create')}}">Quốc gia</a></li>
            <li><a class="dropdown-item" href="{{route('movie.index')}}">Phim</a></li>
             <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('episode.create')}}">Tập phim</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Thống kê</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm kiếm phim</button>
      </form>
    </div>
  </div>
</nav>

