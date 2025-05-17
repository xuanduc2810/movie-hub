@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Quản lý bình luận</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped text-center" id="tablephim" style="width:100%;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="white-space: nowrap;">Stt</th>
                <th scope="col" style="white-space: nowrap;">Tên người gửi</th>
                <th scope="col" style="white-space: nowrap;">Nội dung bình luận</th>
                <th scope="col" style="white-space: nowrap;">Phim</th>
                <th scope="col" style="white-space: nowrap;">Trạng thái</th>
                <th scope="col" style="white-space: nowrap;">Thao tác</th>
                <th scope="col" style="white-space: nowrap;">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $comment)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="align-middle">{{ '#' . $comment->comment_name }}</td>
                <td class="align-middle">{{ $comment->comment }}</td>
                <td class="align-middle">
                    {{ $comment->movie ? $comment->movie->title : 'Không xác định' }}
                </td>
                <td class="align-middle">
                    @if($comment->comment_status == 0)
                        <span class="badge bg-warning">Chưa duyệt</span>
                    @else
                        <span class="badge bg-success">Đã duyệt</span>
                    @endif
                </td>
                <td class="align-middle">
                    @if($comment->comment_status == 0)
                        <form method="POST" action="{{ route('comment.confirm_comment', $comment->comment_id) }}"
                              onsubmit="return confirm('Bạn có chắc chắn duyệt bình luận này?');">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Duyệt</button>
                        </form>
                    @else
                        <button class="btn btn-info btn-sm" disabled>Đã duyệt</button>
                    @endif
                </td>
                <td class="align-middle">
                    <form method="POST" action="{{ route('delete.comment', $comment->comment_id) }}" 
                          onsubmit="return confirm('Bạn có chắc muốn xóa bình luận này?');">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection