@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý nhân viên</a> / Cập nhật nhân viên</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Tên tài khoản:</label>
                <input type="text"
                       class="form-control" value="{{$user->ten}}" name="ten" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
                <label for="title">Avatar</label>
                <input type="file" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                       class="form-control" name="avatar" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                <input type="text"
                       class="form-control" value="{{$user->email}}" name="email" aria-describedby="helpId"
                       placeholder="" required>
            </div>
            <div class="row">
                <div class="form-group col-3">
                    <label for="title">Ngày sinh:</label>
                    <input type="date"
                           class="form-control" value="{{$user->ngay_sinh}}" name="ngay_sinh" aria-describedby="helpId"
                           placeholder="" required>
                </div>
                <div class="form-group col-3">
                    <label for="title">Điện thoại:</label>
                    <input type="text"
                           class="form-control" value="{{$user->dien_thoai}}" name="dien_thoai"
                           aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group col-3">
                    <label for="title">Địa chỉ:</label>
                    <input type="text"
                           class="form-control" value="{{$user->dia_chi}}" name="dia_chi" aria-describedby="helpId"
                           placeholder="" required>
                </div>
                <div class="form-group col-3">
                    <label for="title">Chức vụ:</label>
                    <select name="chuc_vu" class="form-control" id="" required>
                        <option @if($user->chuc_vu == 2) selected @endif value="2">Nhận viên</option>
                        <option @if($user->chuc_vu == 1) selected @endif value="1">Quản lý</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-primary" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
@stop
@stop
