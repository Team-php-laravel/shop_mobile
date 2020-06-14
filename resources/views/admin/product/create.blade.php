@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Thư mục: <a href="#" onclick="window.history.back()">{{$_GET['cat']}}</a> / Thêm sản phẩm</h5>
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
        <form action="/admin/product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" name="ten_sp" class="form-control" placeholder="" aria-describedby="helpId" required>
                <input type="text" name="loai_id" value="{{$_GET['id']}}" class="form-control d-none" placeholder=""
                       aria-describedby="helpId"
                       required>
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện:</label>
                <input type="file" name="hinh_anh" class="form-control" placeholder="" aria-describedby="helpId"
                       required>
            </div>
            <div class="form-group">
                <label for="">Mô tả:</label>
                <textarea name="mo_ta" type="text" class="form-control ckeditor" rows="10" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Tiêu chuẩn(sao):</label>
                    <input value="0" type="number" name="sao" class="form-control" placeholder=""
                           aria-describedby="helpId" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Sale:</label>
                    <input value="0" type="number" name="sale" class="form-control" placeholder=""
                           aria-describedby="helpId" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Đơn giá(VNĐ):</label>
                    <input value="0" type="number" name="gia" class="form-control" placeholder=""
                           aria-describedby="helpId" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <label>THÔNG SỐ KỸ THUẬT</label>
                </div>
                <div class="col-md-12">
                    <table class="w-100">
                        <tr>
                            <td>Màn hình:</td>
                            <td><input type="text" name="man_hinh" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Hệ điều hành:</td>
                            <td><input type="text" name="hdh" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Camera sau:</td>
                            <td><input type="text" name="c_sau" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Camera trước:</td>
                            <td><input type="text" name="c_truoc" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>CPU:</td>
                            <td><input type="text" name="cpu" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>RAM:</td>
                            <td><input type="text" name="ram" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Bộ nhớ trong:</td>
                            <td><input type="text" name="store" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Thẻ nhớ:</td>
                            <td><input type="text" name="the_nho" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Thẻ SIM:</td>
                            <td><input type="text" name="sim" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Dung lượng pin:</td>
                            <td><input type="text" name="pin" class="form-control" required></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-sm btn-outline-primary" type="submit">
                    +Thêm ngay
                </button>
            </div>
        </form>
    </div>
@stop
@stop
