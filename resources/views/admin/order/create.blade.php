@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5><a href="#" onclick="window.history.back()">Danh sách hóa đơn</a> / Thêm hóa đơn</h5>
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
        <form action="/admin/order" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Khách hàng:</label>
                <select class="form-control" name="khach_hang_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($kh as $item)
                        <option value="{{$item->id}}">{{$item->ten_kh}} - {{$item->dien_thoai}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm:</label>
                <select class="form-control" name="san_pham_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($sp as $item)
                        <option value="{{$item->id}}">{{$item->ten_sp}} - {{$item->sale}}% - {{_manny($item->gia)}}
                            VNĐ
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng mua:</label>
                <input value="1" name="sl_mua" type="number" class="form-control" required>
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
