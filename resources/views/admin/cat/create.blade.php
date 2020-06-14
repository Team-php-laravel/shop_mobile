@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Thư mục loại sản phẩm</a> / Thêm thư mục</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/cat" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Tên thư mục</label>
                <input type="text"
                       class="form-control" name="ten_loai" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện:</label>
                <input type="file" name="hinh_anh" class="form-control" placeholder="" aria-describedby="helpId"
                       required>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-success" type="submit">+Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop
