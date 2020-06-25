@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back();">Quản lý nhà cung cấp</a> /
        Thêm nhà cung cấp</h5>
@stop

@section('content')
    <div class="callout-top callout-top-danger col-md-12">
        <form action="/admin/ncc" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Tên nhà cung cấp:</label>
                <input type="text"
                       class="form-control" name="ten_ncc" aria-describedby="helpId" required>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="title">Mã số thuế:</label>
                    <input type="text"
                           class="form-control" name="ms_thue" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">Số tài khoản:</label>
                    <input type="text"
                           class="form-control" name="stk" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="title">Điện thoại:</label>
                    <input type="text"
                           class="form-control" name="sdt" aria-describedby="helpId" placeholder="" required>
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
