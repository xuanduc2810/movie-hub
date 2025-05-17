@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     @if(!isset($genre))
                      {!! Form::open(['route' => 'genre.store','method'=>'POST']) !!}
                       @else
                        {!! Form::open(['route' =>['genre.update',$genre->id],'method'=>'PUT']) !!}
                       @endif
                  <div class="form-group">
                     {!!Form::label('title', 'Thể loại', []) !!}
                     {!!Form::text('title', isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup'=>'ChangeToSlug()','required'=>'required']) !!}
                  
                </div>
                <div class="form-group">
                     {!!Form::label('slug', 'Liên kết', []) !!}
                     {!!Form::text('slug', isset($genre) ? $genre->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug','required'=>'required']) !!}
                  
                </div>
                <div class="form-group">
                     {!!Form::label('description', 'Mô tả', []) !!}
                     {!!Form::textarea('description', isset($genre) ? $genre->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'description','required'=>'required']) !!}
                 
                </div>
                 <div class="form-group">
                     {!!Form::label('Active', 'trạng thái', []) !!}
                     {!!Form::select('status', ['1'=>'Hiển thị','0'=>'không'], isset($genre) ? $genre->status : '', ['class'=>'form-control']) !!}
                 
                </div>
                   @if(!isset($genre))
                {!!Form::submit('Thêm dữ liệu', ['class'=>'btn btn-success']) !!}
                   @else
                    {!!Form::submit('Cập nhật', ['class'=>'btn btn-success']) !!}
                    @endif

                   {!! Form::close() !!} 
            </div>
        </div>
                  
    </div>
</div>
@endsection
