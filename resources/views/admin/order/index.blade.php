@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Danh sách hóa đơn</h5>
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
                <th>
                    <button class="btn btn-sm btn-success" onclick="location.href = 'order/create'">+Thêm</button>
                </th>
                <th>Mã hóa đơn</th>
                <th>Tên khách hàng</th>
                <th>Thông tin</th>
                <th>Đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key=>$val)
                <tr>
                    <td style="min-width: 150px">
                        <button class="btn btn-sm btn-warning"
                                onclick="location.href = 'order/{{$val->id}}'">Cập nhật
                        </button>
                        <button class="btn btn-sm btn-outline-danger"
                                onclick="confirm('Đồng ý xóa?') ? document.getElementById('{{"delete".$val->id}}').submit():''">
                            Xóa
                        </button>
                        <form id="delete{{$val->id}}" action="order/{{$val->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                    <td style="min-width: 100px">HĐ00{{$val->id}}</td>
                    <td style="min-width: 150px">
                        {{$val->khach_hang->ten_kh}}
                    </td>
                    <td style="min-width: 300px" class="text-left">
                        <p>Email: {{$val->khach_hang->email}}</p>
                        <p>SĐT: {{$val->khach_hang->dien_thoai}}</p>
                        <p>Địa chỉ: {{$val->khach_hang->dia_chi}}</p>
                    </td>
                    <td style="min-width: 200px" class="text-left">
                        <p>Sản phẩm: {{$val->san_pham->ten_sp}}</p>
                        <p>Số lượng: {{$val->sl_mua}} chiếc</p>
                        <p>Đơn giá: {{_manny($val->san_pham->gia)}} VNĐ</p>
                    </td>
                    <td style="min-width: 150px">
                        {{date_format(date_create($val['created_at']), "H:i d/m/yy")}}<br>
                        <span style="color: silver">{{$val->user ? $val->user->name: ''}}</span>
                    </td>
                    <td style="min-width: 100px">{{_manny($val->sl_mua * $val->san_pham->gia)}}đ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@stop
