@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Thư mục loại sản phẩm</a> / Cập nhật thông tin thư mục</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/cat/{{$cat->id}}" method="POST"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Tên thư mục</label>
                <input type="text"
                       class="form-control" name="ten_loai" value="{{$cat->ten_loai}}" aria-describedby="helpId"
                       placeholder="" required>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện:</label>
                <input type="file" name="hinh_anh" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-warning" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@stop
@stop
