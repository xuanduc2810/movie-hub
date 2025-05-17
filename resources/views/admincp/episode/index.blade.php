
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                    <table class="table table-responsive" id="tablephim">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Movie name</th>
                  <th scope="col">Movie image</th>
                  <th scope="col">Episode</th>
                  <th scope="col">movie link</th>
                   {{-- <th scope="col">Actice/Inactive</th> --}}
                  <th scope="col">Manage</th>
                </tr>
              </thead>
              <tbody >

                @foreach($list_episode as $key => $episode)
                 
                <tr >
                  <th scope="row">{{$key}}</th>
                  <td>{{$episode->movie->title}}</td>
                  <td><img width="100" src="{{asset('uploads/movie/'.$episode->movie->image)}}">  </td>
                  <td>{{$episode->episode}}</td>
                  <td style="width: 20%">{{$episode->linkphim}}</td>
                  {{-- <td>
                    @if($cate->status)
                              Hiển thị
                    @else
                              Không hiển thị
                    @endif
                </td> --}}
                  <td>
                     {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$episode->id],'onsubmit'=>'return confirm("Bạn có chắc chắn xóa?")']) !!} 
                        {!!Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                     {!! Form::close() !!} 
                     <a href="{{route('episode.edit',$episode->id)}}" class="btn btn-warning">Sửa</a>
                  </td>
                </tr>
               
                @endforeach
              </tbody>
            </table>
    </div>
</div>
</div>
@endsection
