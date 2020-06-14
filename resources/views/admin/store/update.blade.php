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
        <form action="/admin/store/{{$store->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Khách hàng:</label>
                <select class="form-control" name="khach_hang_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($kh as $item)
                        <option {{$store->khach_hang_id == $item->id ? 'selected': ''}} value="{{$item->id}}">{{$item->ten_kh}}
                            - {{$item->dien_thoai}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Sản phẩm:</label>
                <select class="form-control" name="san_pham_id" required>
                    <option value="">-------------chọn--------------</option>
                    @foreach($sp as $item)
                        <option {{$store->san_pham_id == $item->id ? 'selected': ''}} value="{{$item->id}}">{{$item->ten_sp}}
                            - {{$item->sale}}% - {{_manny($item->gia)}}
                            VNĐ
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng mua:</label>
                <input value="{{$store->sl_nhap}}" name="sl_nhap" type="number" class="form-control" required>
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
