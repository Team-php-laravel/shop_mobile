@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Nhập kho </h5>
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
    <div class="callout-top callout-top-danger col-md-12 table-responsive">
        <table id="data-table" align="center" width="100%"
               class="table table-hover table-striped table-bordered border text-center">
            <thead>
            <tr class="bg-primary">
                <th>STT</th>
                <th>Tên nhà cung cấp</th>
                <th>Tên sản phẩm</th>
                <th>Ngày nhập</th>
                <th>Số lượng nhập</th>
                <th>Tổng tiền</th>
                <th style="width: 150px">
                    <button class="btn btn-sm btn-success" onclick="location.href = 'store/create'">+Thêm</button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($store as $key=>$val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        {{$val->ncc->ten_ncc}}
                    </td>
                    <td>{{$val->san_pham->ten_sp}}</td>
                    <td>{{date_format(date_create($val['created_at']), "H:i d/m/yy")}}</td>
                    <td>{{$val->so_luong}}</td>
                    <td>{{_manny($val->so_luong * $val->san_pham->gia)}} VNĐ</td>
                    <td>
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = 'store/{{$val->id}}'">Cập nhật
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="store/{{$val->id}}" method="POST">
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
