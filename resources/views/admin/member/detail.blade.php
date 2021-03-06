@extends('admin.layout.admin')

@section('app')
@section('title', 'Dashboard')

@section('content_header')
    <h5>Lịch sử mua hàng:</h5>
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
                <th>Mã hóa đơn</th>
                <th>Tên khách hàng</th>
                <th>Thông tin</th>
                <th>Sản phẩm</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $key=>$val)
                <tr>
                    <td style="min-width: 100px">HĐ00{{$val->id}}</td>
                    <td style="min-width: 150px">
                        {{$val->khach_hang->ten_kh}}
                    </td>
                    <td style="min-width: 300px" class="text-left">
                        <p>Email: {{$val->khach_hang->email}}</p>
                        <p>SĐT: {{$val->khach_hang->sdt}}</p>
                        <p>Địa chỉ: {{$val->khach_hang->dia_chi}}</p>
                    </td>
                    <td style="min-width: 300px" class="text-left">
                        @foreach($val->cthd as $item)
                            <p>Sản phẩm: {{\App\san_pham::find($item->sp_id)->ten_sp}}</p>
                            <p>Số lượng: {{$item->so_luong}}</p>
                            <p>Đơn giá: {{_manny($item->don_gia)}} VNĐ</p>
                            <br>
                        @endforeach

                    </td>
                    <td style="min-width: 150px">
                        @if(!is_null($val->ngay_tao))
                            {{date_format(date_create($val->ngay_tao), "H:i d/m/yy")}}<br>
                        @endif
                        <span style="color: silver">{{$val->user ? $val->user->name: ''}}</span>
                    </td>
                    <td style="min-width: 100px">{{_manny($val->tong_gia)}} VNĐ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@stop
