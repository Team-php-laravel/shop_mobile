@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back()">Nhập kho</a></h5>
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
        <form action="/admin/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nhà cung cấp:</label>
                <select class="form-control" name="ncc_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($kh as $item)
                        <option value="{{$item->id}}">{{$item->ten_ncc}} - {{$item->ms_thue}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm:</label>
                <select class="form-control" name="sp_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($sp as $item)
                        <option value="{{$item->id}}">{{$item->ten_sp}} - {{$item->giam_gia}}% - {{_manny($item->gia)}}
                            VNĐ
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Đơn giá:</label>
                <input value="0" name="gia" type="number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Số lượng nhập:</label>
                <input value="1" name="so_luong" type="number" class="form-control" required>
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
