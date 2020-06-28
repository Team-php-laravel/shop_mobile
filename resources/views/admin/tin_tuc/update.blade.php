@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý tin tức</a> / Cập nhật tin tức</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/news/{{$news->id}}" method="POST"
              enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" value="{{$news->tieu_de}}" name="tieu_de" required>
            </div>
            <div class="form-group">
                <label for="title">Mô tả:</label>
                <textarea type="text" class="form-control" name="mo_ta" required>{{$news->mo_ta}}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <textarea type="text" class="form-control ckeditor" name="noi_dung"
                          required>{{$news->noi_dung}}</textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-warning" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@stop
@stop
