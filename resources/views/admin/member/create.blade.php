@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý {{$_GET['id'] == 1 ? 'khách hàng':'nhà cung cấp'}}</a> /
        Thêm {{$_GET['id'] == 1 ? 'khách hàng':'nhà cung cấp'}}</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/member" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tên {{$_GET['id'] == 1 ? 'khách hàng':'nhà cung cấp'}}:</label>
                <input type="text"
                       class="form-control" name="ten_kh" aria-describedby="helpId" required>
                <input type="text"
                       class="form-control d-none" name="loai_kh" value="{{$_GET['id']}}" aria-describedby="helpId"
                       required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Email:</label>
                    <input type="text"
                           class="form-control" name="email" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">Điện thoại:</label>
                    <input type="text"
                           class="form-control" name="dien_thoai" aria-describedby="helpId" placeholder="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Địa chỉ:</label>
                <input type="text"
                       class="form-control" name="dia_chi" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-success" type="submit">+Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop
