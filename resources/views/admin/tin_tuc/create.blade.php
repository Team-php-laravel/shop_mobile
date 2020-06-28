@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý tin tức</a> / Thêm tin tức</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/news" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" name="tieu_de" required>
            </div>
            <div class="form-group">
                <label for="title">Mô tả:</label>
                <textarea type="text" class="form-control" name="mo_ta" required></textarea>
            </div>
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <textarea type="text" class="form-control ckeditor" name="noi_dung" required></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-success" type="submit">+Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop
