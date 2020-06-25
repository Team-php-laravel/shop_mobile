{{-- resources/views/admin/dashboard.blade.php --}}

@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Thư mục: <a href="#" onclick="window.history.back();" class="text-info">{{$cat->ten_loai}}</a></h1>
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
        <table id="data-table" align="center" width="100%"
               class="table table-hover table-striped table-bordered border text-center">
            <thead>
            <tr class="bg-primary">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th style="width: 100px">Hình ảnh</th>
                <th>Thông tin</th>
                <th>Thành tiền</th>
                <th>
                    <button class="btn btn-sm btn-success"
                            onclick="location.href = 'create?id={{$cat->id}}&cat={{$cat->ten_loai}}'">+Thêm
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cat['san_pham'] as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->ten_sp}}</td>
                    <td>
                        <img class="w-100" src="/uploads/product/{{$val->hinh_anh}}" alt="Ảnh">
                    </td>
                    <td class="text-left">
                        <p>Màu sắc: {{$val->mau_sac}}</p>
                        <p>Số lương: {{$val->so_luong}}</p>
                        <p>Đơn giá: {{_manny($val->gia)}} VNĐ <span class="text-danger">-{{$val->giam_gia}}%</span></p>
                    </td>
                    <td>
                        {{_manny(($val->gia - $val->gia*$val->giam_gia/100)."")}} VNĐ
                    </td>
                    <td>
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = '{{$val->id}}/edit?cat={{$cat->ten_loai}}'">Cập nhật
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa ?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="{{$val->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@stop
