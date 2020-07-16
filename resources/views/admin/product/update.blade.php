@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Thư mục: <a href="#" onclick="window.history.back()">{{$_GET['cat']}}</a> / Cập nhật sản phẩm</h5>
@stop

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo</h4>
            {{ session('message') }}
        </div>
    @endif
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/product/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="ten_sp" value="{{$sanpham->ten_sp}}" class="form-control" placeholder=""
                       aria-describedby="helpId" required>
                <input type="text" name="loai_id" value="{{$sanpham->loai_id}}" class="form-control d-none"
                       placeholder=""
                       aria-describedby="helpId"
                       required>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện:</label>
                <input type="file" name="hinh_anh" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Mô tả:</label>
                <textarea name="mo_ta" type="text" class="form-control ckeditor" rows="10"
                          required>{{$sanpham->mo_ta}}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Thuộc tính:</label>
                    <input type="text" name="mau_sac" value="{{$sanpham->mau_sac}}" class="form-control" placeholder=""
                           aria-describedby="helpId">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Sale:</label>
                    <input type="number" name="giam_gia" value="{{$sanpham->giam_gia}}" class="form-control" placeholder=""
                           aria-describedby="helpId" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Đơn giá(VNĐ):</label>
                    <input type="number" name="gia" value="{{$sanpham->gia}}" class="form-control" placeholder=""
                           aria-describedby="helpId" required>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-sm btn-outline-warning" type="submit">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
@stop
@stop
